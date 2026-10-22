# Khởi tạo nội dung tài chính

Plugin `vn-finance-initial-content` tạo ba chuyên mục và mười hai bài viết xuất bản ban đầu bằng WordPress APIs: ba bài gốc và chín bài mở rộng.

## Cách chạy

Kích hoạt plugin trong WordPress Admin hoặc chạy lệnh WP-CLI:

```bash
wp plugin activate vietnamese-initial-content
wp vn-finance seed
```

Hook kích hoạt và lệnh `wp vn-finance seed` đều gọi cùng một hàm seed. Hàm tìm chuyên mục theo slug và bài viết theo slug trước khi tạo. Vì vậy, chạy lại không tạo bản sao; bài viết/chuyên mục đã tồn tại, kể cả đã được quản trị viên chỉnh sửa, không bị cập nhật hoặc xóa.

Plugin chỉ đặt múi giờ `Asia/Ho_Chi_Minh` khi WordPress chưa có cấu hình múi giờ. Khởi động lại container không tự reset cơ sở dữ liệu và không tự tạo lại nội dung; việc seed chỉ xảy ra khi kích hoạt plugin hoặc khi quản trị viên chạy lệnh WP-CLI.

Khi plugin được kích hoạt, plugin cấu hình permalink thành `/%category%/%postname%/`, đặt category base rỗng và flush rewrite rules một lần. Vì vậy URL có dạng `/vi-mo/` và `/vi-mo/vi-sao-lai-suat-anh-huong-thi-truong-chung-khoan/`. Nếu plugin đã được kích hoạt từ trước, mở một lần trang quản trị hoặc chạy `wp vn-finance seed` để áp dụng cấu hình URL mới.

Slug của ba chuyên mục được xem là slug dành riêng ở cấp URL gốc; không tạo page hoặc nội dung khác trùng các slug `vi-mo`, `chung-khoan`, `kien-thuc-tai-chinh`. WordPress vẫn là nơi sinh URL qua `get_category_link()` và `get_permalink()`, không ghép URL trong template.

Theme đọc bài viết, chuyên mục, tác giả và ngày xuất bản từ WordPress Loop. Nội dung không được hardcode trong template PHP. Khi chưa có ảnh đại diện, theme hiển thị visual placeholder cục bộ theo chuyên mục.
