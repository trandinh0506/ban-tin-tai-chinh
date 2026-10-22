import test from 'node:test';
import assert from 'node:assert/strict';
import { buildBasicAuth, normalizeLocalPost, parseSlugs, PublisherError, synchronizePost, WordPressApi } from '../scripts/publisher-lib.mjs';

function samplePost(overrides = {}) {
  return normalizeLocalPost({
    id: 42,
    slug: 'vi-sao-lai-suat',
    status: 'publish',
    date: '2026-01-02T03:04:05',
    title: { rendered: 'Vì sao lãi suất?' },
    content: { rendered: '<p>Nội dung bài viết</p>' },
    excerpt: { rendered: '<p>Tóm tắt</p>' },
    _embedded: {
      'wp:term': [[{ id: 4, name: 'Vĩ mô', slug: 'vi-mo', taxonomy: 'category' }], []],
      'wp:featuredmedia': [{ id: 8, source_url: 'http://local.test/uploads/chart.png', slug: 'chart', mime_type: 'image/png', alt_text: 'Biểu đồ' }],
    },
    ...overrides,
  }, 'http://local.test');
}

test('parseSlugs requires explicit selection and accepts multiple slugs', () => {
  assert.deepEqual(parseSlugs(['--slug=mot,hai', '--slug', 'ba', '--dry-run']), {
    slugs: ['mot', 'hai', 'ba'], dryRun: true, includeDrafts: false, allowCreateTaxonomies: false,
  });
  assert.throws(() => parseSlugs([]), PublisherError);
});

test('REST client sends authenticated Unicode JSON to the mocked API', async () => {
  let request;
  const api = new WordPressApi('https://production.test', {
    auth: buildBasicAuth('publisher-bot', 'app password'),
    fetchImpl: async (url, options) => {
      request = { url: url.toString(), options };
      return new Response(JSON.stringify({ id: 101 }), { status: 201, headers: { 'content-type': 'application/json' } });
    },
  });
  const result = await api.post('posts', { title: 'Bài viết mẫu' });
  assert.equal(result.id, 101);
  assert.match(request.url, /production\.test\/wp-json\/wp\/v2\/posts$/);
  assert.equal(request.options.headers.Authorization, buildBasicAuth('publisher-bot', 'app password'));
  assert.equal(JSON.parse(request.options.body).title, 'Bài viết mẫu');
});

test('dry-run never creates, updates, or uploads', async () => {
  const calls = [];
  const api = {
    async get(endpoint) { calls.push(['get', endpoint]); if (endpoint === 'categories') return [{ id: 9 }]; if (endpoint === 'tags') return []; if (endpoint.startsWith('posts?')) return []; return []; },
    async post() { calls.push(['post']); throw new Error('dry-run write'); },
    async put() { calls.push(['put']); throw new Error('dry-run write'); },
  };
  const result = await synchronizePost(samplePost({ _embedded: { 'wp:term': [[{ id: 4, name: 'Vĩ mô', slug: 'vi-mo', taxonomy: 'category' }], []] } }), api, { posts: {}, media: {} }, { dryRun: true, includeDrafts: false, allowCreateTaxonomies: false });
  assert.equal(result.action, 'would-created');
  assert.equal(calls.some(([method]) => method !== 'get'), false);
});

test('mapped article updates production and stores stable source identity', async () => {
  const calls = [];
  const api = {
    async get(endpoint) { calls.push(['get', endpoint]); if (endpoint === 'posts/77') return { id: 77 }; if (endpoint === 'categories') return [{ id: 9 }]; if (endpoint === 'tags') return []; return []; },
    async post() { calls.push(['post']); return { id: 99 }; },
    async put(endpoint, payload) { calls.push(['put', endpoint, payload]); return { id: 77 }; },
  };
  const state = { posts: { '42': { productionId: 77 } }, media: {} };
  const result = await synchronizePost(samplePost({ _embedded: { 'wp:term': [[{ id: 4, name: 'Vĩ mô', slug: 'vi-mo', taxonomy: 'category' }], []] } }), api, state, { dryRun: false, includeDrafts: false, allowCreateTaxonomies: false });
  assert.equal(result.action, 'updated');
  assert.equal(calls.some(([method]) => method === 'post'), false);
  assert.equal(calls.find(([method]) => method === 'put')[1], 'posts/77');
  assert.equal(state.posts['42'].productionId, 77);
});
