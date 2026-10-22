#!/usr/bin/env node
import path from 'node:path';
import {
  PublisherError, WordPressApi, buildBasicAuth, fetchLocalPost, loadState, normalizeBaseUrl,
  normalizeLocalPost, parseSlugs, saveState, synchronizePost,
} from './publisher-lib.mjs';

const help = `Sử dụng:
  npm run publish -- --slug="slug-bai-viet" [--dry-run]
  npm run publish -- --slug="slug-thu-nhat,slug-thu-hai"

Tùy chọn:
  --slug SLUG[,SLUG]             Chọn rõ một hoặc nhiều bài viết.
  --dry-run                      Chỉ đọc và lập kế hoạch, không ghi production.
  --allow-create-taxonomies      Cho phép tạo category/tag còn thiếu ở production.
  --include-drafts               Cho phép gửi bài local không publish dưới dạng draft.
`;

async function main() {
  const options = parseSlugs(process.argv.slice(2));
  if (options.help) { console.log(help); return; }
  const localUrl = normalizeBaseUrl(process.env.LOCAL_WP_URL, 'LOCAL_WP_URL');
  const productionUrl = normalizeBaseUrl(process.env.PRODUCTION_WP_URL, 'PRODUCTION_WP_URL', true);
  const auth = buildBasicAuth(process.env.PRODUCTION_WP_USERNAME, process.env.PRODUCTION_WP_APPLICATION_PASSWORD);
  const localAuth = process.env.LOCAL_WP_USERNAME && process.env.LOCAL_WP_APPLICATION_PASSWORD
    ? buildBasicAuth(process.env.LOCAL_WP_USERNAME, process.env.LOCAL_WP_APPLICATION_PASSWORD)
    : undefined;
  const stateFile = path.resolve(process.env.PUBLISH_STATE_FILE || '.publish-state/sync-map.json');
  const state = await loadState(stateFile);
  const localApi = new WordPressApi(localUrl, { auth: localAuth });
  const productionApi = new WordPressApi(productionUrl, { auth });
  const results = [];
  for (const slug of options.slugs) {
    try {
      const remotePost = await fetchLocalPost(localApi, slug, options);
      const localPost = normalizeLocalPost(remotePost, localUrl);
      const result = await synchronizePost(localPost, productionApi, state, options);
      results.push({ ...result, ok: true });
      if (!options.dryRun) await saveState(stateFile, state);
      console.log(`[${result.action}] ${slug}${result.productionId ? ` → production #${result.productionId}` : ''}`);
    } catch (error) {
      const message = error instanceof PublisherError ? error.message : error.message;
      results.push({ slug, ok: false, error: message });
      console.error(`[failed] ${slug}: ${message}`);
    }
  }
  if (!options.dryRun) await saveState(stateFile, state);
  const summary = { created: 0, updated: 0, skipped: 0, failed: results.filter((item) => !item.ok).length };
  for (const result of results) {
    if (result.action === 'created' || result.action === 'would-created') summary.created += 1;
    if (result.action === 'updated' || result.action === 'would-updated') summary.updated += 1;
  }
  console.log(`Tổng kết: tạo ${summary.created}, cập nhật ${summary.updated}, bỏ qua ${summary.skipped}, lỗi ${summary.failed}.`);
  if (summary.failed) process.exitCode = 1;
}

main().catch((error) => { console.error(`[failed] ${error.message}`); process.exitCode = 1; });
