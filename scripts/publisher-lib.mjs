import fs from 'node:fs/promises';
import path from 'node:path';

export class PublisherError extends Error {
  constructor(message, details = {}) {
    super(message);
    this.name = 'PublisherError';
    Object.assign(this, details);
  }
}

export function normalizeBaseUrl(value, name, requireHttps = false) {
  if (!value) throw new PublisherError(`${name} chưa được cấu hình.`);
  let url;
  try {
    url = new URL(value);
  } catch {
    throw new PublisherError(`${name} không phải URL hợp lệ.`);
  }
  if (!['http:', 'https:'].includes(url.protocol)) {
    throw new PublisherError(`${name} phải dùng HTTP hoặc HTTPS.`);
  }
  if (requireHttps && url.protocol !== 'https:') {
    throw new PublisherError(`${name} phải dùng HTTPS để kết nối production.`);
  }
  return url.toString().replace(/\/$/, '');
}

export function buildBasicAuth(username, applicationPassword) {
  if (!username || !applicationPassword) {
    throw new PublisherError('Thiếu tài khoản hoặc Application Password của production.');
  }
  return `Basic ${Buffer.from(`${username}:${applicationPassword}`).toString('base64')}`;
}

export class WordPressApi {
  constructor(baseUrl, { auth, fetchImpl = fetch, timeoutMs = 20000 } = {}) {
    this.baseUrl = baseUrl.replace(/\/$/, '');
    this.auth = auth;
    this.fetchImpl = fetchImpl;
    this.timeoutMs = timeoutMs;
  }

  async request(endpoint, { method = 'GET', query, body, headers = {}, formData = false } = {}) {
    const url = new URL(`${this.baseUrl}/wp-json/wp/v2/${endpoint.replace(/^\//, '')}`);
    for (const [key, value] of Object.entries(query || {})) {
      if (value !== undefined && value !== null) url.searchParams.set(key, value);
    }
    const requestHeaders = { Accept: 'application/json', ...headers };
    let requestBody = body;
    if (this.auth) requestHeaders.Authorization = this.auth;
    if (body && !formData) {
      requestHeaders['Content-Type'] = 'application/json';
      requestBody = JSON.stringify(body);
    }
    const controller = new AbortController();
    const timer = setTimeout(() => controller.abort(), this.timeoutMs);
    let response;
    try {
      response = await this.fetchImpl(url, { method, headers: requestHeaders, body: requestBody, signal: controller.signal });
    } catch (error) {
      if (error.name === 'AbortError') throw new PublisherError(`API timeout: ${method} ${endpoint}`);
      throw new PublisherError(`Không thể kết nối API: ${error.message}`);
    } finally {
      clearTimeout(timer);
    }
    const text = await response.text();
    let payload;
    try { payload = text ? JSON.parse(text) : null; } catch { payload = text; }
    if (!response.ok) {
      const apiMessage = payload?.message || payload?.code || `HTTP ${response.status}`;
      throw new PublisherError(`API ${method} ${endpoint} thất bại: ${apiMessage}`, { status: response.status, payload });
    }
    return payload;
  }

  get(endpoint, query) { return this.request(endpoint, { query }); }
  post(endpoint, body, options = {}) { return this.request(endpoint, { method: 'POST', body, ...options }); }
  put(endpoint, body, options = {}) { return this.request(endpoint, { method: 'POST', body, ...options }); }
}

export async function loadState(file) {
  try {
    return JSON.parse(await fs.readFile(file, 'utf8'));
  } catch (error) {
    if (error.code === 'ENOENT') return { version: 1, posts: {}, media: {} };
    throw new PublisherError(`Không đọc được state file ${file}: ${error.message}`);
  }
}

export async function saveState(file, state) {
  await fs.mkdir(path.dirname(file), { recursive: true });
  const temporary = `${file}.tmp`;
  await fs.writeFile(temporary, `${JSON.stringify(state, null, 2)}\n`, { mode: 0o600 });
  await fs.rename(temporary, file);
}

export function parseSlugs(argv) {
  const slugs = [];
  let dryRun = false;
  let includeDrafts = false;
  let allowCreateTaxonomies = process.env.PUBLISH_ALLOW_CREATE_TAXONOMIES === 'true';
  for (let index = 0; index < argv.length; index += 1) {
    const value = argv[index];
    if (value === '--dry-run') dryRun = true;
    else if (value === '--include-drafts') includeDrafts = true;
    else if (value === '--allow-create-taxonomies') allowCreateTaxonomies = true;
    else if (value.startsWith('--slug=')) slugs.push(...value.slice(7).split(',').map((slug) => slug.trim()).filter(Boolean));
    else if (value === '--slug') slugs.push(...(argv[++index] || '').split(',').map((slug) => slug.trim()).filter(Boolean));
    else if (value === '--help' || value === '-h') return { help: true };
    else throw new PublisherError(`Tham số không được hỗ trợ: ${value}`);
  }
  if (!slugs.length && !argv.includes('--help') && !argv.includes('-h')) {
    throw new PublisherError('Phải chọn ít nhất một bài bằng --slug. Công cụ không tự đồng bộ toàn bộ bài viết.');
  }
  return { slugs: [...new Set(slugs)], dryRun, includeDrafts, allowCreateTaxonomies };
}

function getEmbeddedTerms(post) {
  const terms = post._embedded?.['wp:term']?.flat() || [];
  return terms.filter((term) => term.taxonomy === 'category' || term.taxonomy === 'post_tag');
}

export function normalizeLocalPost(post, localBaseUrl) {
  const terms = getEmbeddedTerms(post);
  const categories = terms.filter((term) => term.taxonomy === 'category').map((term) => ({ id: term.id, name: term.name, slug: term.slug }));
  const tags = terms.filter((term) => term.taxonomy === 'post_tag').map((term) => ({ id: term.id, name: term.name, slug: term.slug }));
  const media = post._embedded?.['wp:featuredmedia']?.[0];
  return {
    sourceKey: `${localBaseUrl}/post/${post.id}`,
    localId: post.id,
    slug: post.slug,
    title: post.title?.rendered || '',
    content: post.content?.rendered || '',
    excerpt: post.excerpt?.rendered || '',
    status: post.status,
    date: post.date,
    categories,
    tags,
    featuredMedia: media ? {
      sourceId: media.id,
      sourceUrl: media.source_url,
      mimeType: media.mime_type,
      filename: media.slug || `media-${media.id}`,
      altText: media.alt_text || '',
      caption: media.caption?.rendered || '',
    } : null,
  };
}

export async function fetchLocalPost(api, slug, { includeDrafts = false } = {}) {
  const posts = await api.get('posts', { slug, _embed: '1', per_page: '1', status: includeDrafts ? 'publish,draft,private,pending' : 'publish' });
  if (!posts.length) throw new PublisherError(`Không tìm thấy bài local đã xuất bản với slug: ${slug}`);
  const post = posts[0];
  if (!includeDrafts && post.status !== 'publish') throw new PublisherError(`Bài ${slug} không ở trạng thái publish.`);
  return post;
}

export async function resolveTaxonomy(api, taxonomy, terms, { dryRun, allowCreate }) {
  const ids = [];
  for (const term of terms) {
    const found = await api.get(taxonomy, { slug: term.slug, per_page: '1' });
    if (found[0]) {
      ids.push(found[0].id);
      continue;
    }
    if (dryRun && allowCreate) {
      ids.push(null);
      continue;
    }
    if (!allowCreate) throw new PublisherError(`Production thiếu ${taxonomy} "${term.slug}" và policy không cho phép tạo mới.`);
    const created = await api.post(taxonomy, { name: term.name, slug: term.slug });
    ids.push(created.id);
  }
  return ids;
}

export async function resolveMedia(api, media, state, { dryRun }) {
  if (!media) return null;
  const mapped = state.media[`${media.sourceId}`];
  if (mapped) return mapped.productionId;
  if (dryRun) return null;
  if (!media.sourceUrl) throw new PublisherError(`Không có URL media local cho attachment ${media.sourceId}.`);
  let response;
  try { response = await fetch(media.sourceUrl); } catch (error) { throw new PublisherError(`Không tải được media local ${media.sourceId}: ${error.message}`); }
  if (!response.ok) throw new PublisherError(`Media local ${media.sourceId} trả về HTTP ${response.status}.`);
  const buffer = Buffer.from(await response.arrayBuffer());
  const filename = `${media.filename}.${media.mimeType?.split('/')[1] || 'bin'}`.replace(/[^a-zA-Z0-9._-]/g, '-');
  const form = new FormData();
  form.append('file', new Blob([buffer], { type: media.mimeType || 'application/octet-stream' }), filename);
  if (media.altText) form.append('alt_text', media.altText);
  const uploaded = await api.post('media', form, { formData: true });
  state.media[`${media.sourceId}`] = { productionId: uploaded.id, sourceUrl: media.sourceUrl };
  return uploaded.id;
}

export async function synchronizePost(localPost, productionApi, state, options) {
  const mapping = state.posts[`${localPost.localId}`];
  let productionPost = mapping ? await productionApi.get(`posts/${mapping.productionId}`).catch((error) => {
    if (error.status === 404) return null;
    throw error;
  }) : null;
  if (mapping && !productionPost) {
    throw new PublisherError(`Mapping của bài local #${localPost.localId} trỏ tới production #${mapping.productionId} nhưng bài đó không còn tồn tại; không tự tạo bản sao.`);
  }
  if (!productionPost && !mapping) {
    const sameSlug = await productionApi.get('posts', { slug: localPost.slug, per_page: '2', status: 'publish,draft,pending,private' });
    if (sameSlug.length) throw new PublisherError(`Conflict: production đã có bài slug "${localPost.slug}" nhưng chưa có mapping; không tự nhận diện để tránh ghi đè.`);
  }
  if (!options.includeDrafts && localPost.status !== 'publish') throw new PublisherError(`Bài ${localPost.slug} chưa publish; dùng --include-drafts nếu policy cho phép.`);
  const categoryIds = await resolveTaxonomy(productionApi, 'categories', localPost.categories, { dryRun: options.dryRun, allowCreate: options.allowCreateTaxonomies });
  const tagIds = await resolveTaxonomy(productionApi, 'tags', localPost.tags, { dryRun: options.dryRun, allowCreate: options.allowCreateTaxonomies });
  const featuredMediaId = await resolveMedia(productionApi, localPost.featuredMedia, state, options);
  const payload = {
    title: localPost.title,
    content: localPost.content,
    excerpt: localPost.excerpt,
    slug: localPost.slug,
    status: localPost.status === 'publish' ? 'publish' : 'draft',
    date: localPost.date,
    categories: categoryIds.filter(Boolean),
    tags: tagIds.filter(Boolean),
  };
  if (featuredMediaId) payload.featured_media = featuredMediaId;
  const action = productionPost ? 'updated' : 'created';
  if (!options.dryRun) {
    const saved = productionPost ? await productionApi.put(`posts/${productionPost.id}`, payload) : await productionApi.post('posts', payload);
    state.posts[`${localPost.localId}`] = { productionId: saved.id, sourceKey: localPost.sourceKey, sourceSlug: localPost.slug, syncedAt: new Date().toISOString() };
  }
  return { action: options.dryRun ? `would-${action}` : action, localId: localPost.localId, slug: localPost.slug, productionId: productionPost?.id || null, payload };
}
