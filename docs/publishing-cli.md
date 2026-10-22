# CLI đồng bộ bài viết

## Nguyên tắc

Local WordPress là nguồn nội dung cho các trường editorial mà CLI sở hữu. Production chỉ được truy cập qua REST API HTTPS bằng Application Password. Mỗi lần chạy phải có `--slug`; không có lệnh đồng bộ toàn bộ.

Mapping `.publish-state/sync-map.json` dùng local WordPress post ID làm source identity và lưu production post ID. Slug chỉ dùng để tìm bài local ở lần chạy hiện tại. Vì vậy đổi slug sau khi đã map sẽ cập nhật đúng bài production, không tạo bài mới. Nếu mapping mất, bài production cùng slug được coi là conflict để tránh nhận nhầm.

## Thiết lập

```bash
cp .env.example .env
npm test
```

Điền URL local, URL production HTTPS, username và Application Password production. Local public posts không cần credentials; draft/private cần thêm cặp local riêng và dùng `--include-drafts`.

## Quy trình

1. Chạy `npm run publish -- --slug="..." --dry-run`.
2. Kiểm tra output và xử lý conflict/taxonomy thiếu.
3. Backup production database và media.
4. Chạy lại không có `--dry-run`.
5. Kiểm tra bài production, featured image, category và URL.

Dry-run vẫn được phép đọc production để kiểm tra mapping/taxonomy nhưng tuyệt đối không gọi POST/PUT hoặc upload media. Policy tạo taxonomy mặc định tắt; bật rõ bằng `--allow-create-taxonomies` hoặc `PUBLISH_ALLOW_CREATE_TAXONOMIES=true`.

## Retry và ownership

CLI chỉ tạo/cập nhật bài đã chọn. Lỗi timeout, HTTP hoặc media được báo theo từng slug; các bài trước đó đã thành công vẫn giữ mapping. Chạy lại sẽ update bài đã map. Không tự xóa bài production. Title, content, excerpt, slug, trạng thái, ngày, taxonomy và featured media là local-owned; author, comments, users, site options và metadata không thuộc payload đồng bộ.

## Bảo mật

Không ghi secret vào source, state file hoặc log. Không tắt kiểm tra TLS. Dùng user production riêng, Application Password riêng, quyền thấp nhất cần thiết và thu hồi credential khi kết thúc.
