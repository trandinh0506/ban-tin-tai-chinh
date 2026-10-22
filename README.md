# Bản tin Tài chính

Website WordPress tiếng Việt cho một ấn phẩm phân tích kinh tế và tài chính. Project dùng theme classic PHP tùy biến, plugin khởi tạo nội dung idempotent và Docker Compose với WordPress/PHP 8.3, Apache và MySQL 8.4.

## Chạy local

Yêu cầu: Docker Engine và Docker Compose v2.

```bash
cp .env.example .env
# Đổi hai mật khẩu trong .env trước khi chạy
docker compose up -d
```

Mở `http://localhost:8080` (hoặc cổng trong `WORDPRESS_PORT`) và hoàn tất màn hình cài đặt WordPress. Trong Admin:

1. Vào **Giao diện → Giao diện**, kích hoạt **Bản tin Tài chính**.
2. Vào **Plugin**, kích hoạt **Nội dung khởi tạo tiếng Việt**. Plugin sẽ tạo đúng ba chuyên mục và ba bài viết nếu chúng chưa tồn tại.
3. Nếu cần chạy lại việc kiểm tra seed, dùng `wp vn-finance seed` trong môi trường có WP-CLI. Quy trình chi tiết nằm ở `docs/initial-content.md`.

Plugin cũng cấu hình permalink native thành `/%category%/%postname%/`, nên bài viết dùng dạng `/vi-mo/vi-sao-lai-suat-anh-huong-thi-truong-chung-khoan/` và chuyên mục dùng `/vi-mo/`. Sau khi nâng cấp từ bản cũ, mở một lần trang quản trị hoặc chạy `wp vn-finance seed` để refresh rewrite rules. Không tạo page trùng slug với ba chuyên mục.

Theme dùng WordPress Loop và template hierarchy; bài viết, chuyên mục, tác giả, ảnh tải lên và cài đặt đều được quản lý trong WordPress Admin. Khi chưa có ảnh đại diện, giao diện dùng placeholder cục bộ theo chuyên mục.

## Vận hành

```bash
docker compose ps
docker compose logs -f wordpress
docker compose stop
docker compose start
docker compose pull
docker compose up -d
```

`db_data` giữ dữ liệu MySQL và `wp_uploads` giữ media tải lên. Không chạy `docker compose down -v` nếu chưa muốn xóa các volume dữ liệu.

### Sao lưu và khôi phục

Sao lưu cơ sở dữ liệu ra máy chủ:

```bash
docker compose exec -T db sh -c 'exec mysqldump -u"$MYSQL_USER" -p"$MYSQL_PASSWORD" "$MYSQL_DATABASE"' > wordpress.sql
```

Khôi phục vào một database đã chạy:

```bash
cat wordpress.sql | docker compose exec -T db sh -c 'exec mysql -u"$MYSQL_USER" -p"$MYSQL_PASSWORD" "$MYSQL_DATABASE"'
```

Để sao lưu media, tạo bản sao của volume `wp_uploads` theo quy trình backup của VPS hoặc tạm dùng container có mount volume. Luôn thử khôi phục trên môi trường riêng trước khi coi backup là hợp lệ.

## Triển khai VPS

Trên Linux VPS, clone repository, tạo `.env` với mật khẩu mạnh riêng cho WordPress và root MySQL, sau đó chạy `docker compose up -d`. Đặt reverse proxy (Nginx hoặc Caddy) phía trước WordPress, bật HTTPS bằng chứng chỉ hợp lệ, chỉ mở cổng SSH và HTTP/HTTPS trên firewall, cập nhật hệ điều hành/Docker thường xuyên và lên lịch backup mã hóa cho database cùng media. MySQL không được expose ra Internet trong Compose mặc định; không triển khai phpMyAdmin công khai.

Không commit `.env`, backup database, hoặc thư mục uploads vào repository. Khi đổi domain, cập nhật URL trong WordPress Admin và kiểm tra permalink sau khi bật HTTPS.

## CLI xuất bản local → production

CLI nằm trong `scripts/` và dùng Node.js 18.18+ cùng WordPress REST API; không kết nối trực tiếp tới database production. Sao chép `.env.example` thành `.env`, điền `LOCAL_WP_URL`, `PRODUCTION_WP_URL`, `PRODUCTION_WP_USERNAME` và `PRODUCTION_WP_APPLICATION_PASSWORD`. Production bắt buộc dùng HTTPS. Chỉ thêm `LOCAL_WP_USERNAME` và `LOCAL_WP_APPLICATION_PASSWORD` khi cần đọc draft/private local.

Xem trước một bài, không tạo category/tag, upload media hay ghi bất kỳ dữ liệu nào ở production:

```bash
npm run publish -- --slug="vi-sao-lai-suat-anh-huong-thi-truong-chung-khoan" --dry-run
```

Xuất bản một bài hoặc một danh sách được chọn rõ ràng:

```bash
npm run publish -- --slug="vi-sao-lai-suat-anh-huong-thi-truong-chung-khoan"
npm run publish -- --slug="vi-mo-bai-1,vi-mo-bai-2"
```

Mặc định CLI chỉ đọc bài local ở trạng thái `publish`; không bao giờ tự đồng bộ toàn bộ bài viết. `--include-drafts` chỉ cho phép gửi draft thành draft và cần credentials local phù hợp. `--allow-create-taxonomies` cho phép tạo category/tag thiếu ở production; mặc định policy từ chối để tránh thay đổi taxonomy ngoài ý muốn.

CLI sở hữu các trường title, content, excerpt, slug, status, date, category, tag và featured media. Author, bình luận, site settings, users và các metadata production khác không bị thay đổi. Mapping trong `.publish-state/sync-map.json` liên kết local post ID ổn định với production post ID; file này bị loại khỏi Git và cần được backup cùng quy trình vận hành. Media cũng được map theo local attachment ID, tránh upload lặp. Nếu mapping trỏ tới bài production đã bị xóa, CLI dừng với lỗi thay vì tạo bản sao.

Nếu production đã có cùng slug nhưng chưa có mapping, CLI báo conflict để người vận hành xác minh thủ công. Lỗi từng bài không làm xóa hoặc rollback dữ liệu đã đồng bộ thành công của bài khác; chạy lại slug lỗi sau khi sửa nguyên nhân. Trước lần đồng bộ đầu tiên, backup database và media production, đồng thời thử `--dry-run`.

### Tài khoản production

Tạo một user WordPress riêng, vai trò tối thiểu phù hợp với quy trình (thường là **Editor** nếu cần quản lý category/media; tránh dùng Administrator). Tại hồ sơ user, tạo Application Password riêng cho CLI, lưu vào `.env` trên máy chạy lệnh và không commit hoặc in ra log. Thu hồi password khi không còn sử dụng. Không expose MySQL hay cài phpMyAdmin công khai.
