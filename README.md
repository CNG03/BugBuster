### Thiết kế web nâng cao N03
### Thành viên nhóm
- **[Giảng viên hướng dẫn: Nguyễn Lệ Thu](https://github.com/nglthu)**
- **[Bùi Văn Công](https://github.com/CNG03)**
- **[Trần Ngọc Lâm](https://github.com/tranngoclamm)**
- **[Nông Ngọc Huân](https://github.com/Kiren855)**
## Website Quản Lý Lỗi - Bug Buster

![Bug Tracking](./public/assets/img/logo.png)

## Giới thiệu

Dự án này là một hệ thống quản lý lỗi giúp các nhóm phát triển phần mềm theo dõi và quản lý các lỗi (bug) trong quá trình phát triển và kiểm thử. Hệ thống cho phép quản trị viên quản lý người dùng và cập nhật các thông tin đầu vào, kiểm thử viên và lập trình viên có thể tạo và cập nhật trạng thái của lỗi.

## Tính năng

### Quản trị viên

- **Quản lý người dùng**: Quản trị viên có thể thêm, sửa, xóa người dùng.
- **Quản lý thông tin đầu vào**:
  - Loại kiểm thử: Kiểm thử đơn vị, Kiểm thử tích hợp, Kiểm thử hệ thống, Kiểm thử chấp nhận.
  - Loại lỗi: Lỗi giao diện, Lỗi chức năng nghiệp vụ, Lỗi truy cập dữ liệu, Lỗi khi review tài liệu, Lỗi khi review code, v.v.
  - Danh sách các dự án: Bao gồm quản trị dự án, lập trình viên, kiểm thử viên tham gia dự án.

### Kiểm thử viên / Lập trình viên

- **Tạo mới lỗi**: Bao gồm các thông tin:
  - Tên lỗi
  - Mô tả lỗi
  - Thời gian dự tính
  - Lập trình viên chịu trách nhiệm
  - Mô tả các bước để tái tạo lỗi
  - Kết quả mong đợi
  - Kết quả thực tế
  - Loại kiểm thử
  - Loại lỗi
  - Ảnh minh họa
  - Mức độ ưu tiên (Cao, Trung bình, Thấp)
- **Trạng thái lỗi**: Khi lỗi mới tạo, trạng thái là "Error" (Có lỗi).
- **Cập nhật trạng thái lỗi**:
  - Kiểm thử viên có thể chuyển lỗi sang trạng thái "Cancel" (Hủy).
  - Lập trình viên có thể chuyển lỗi sang trạng thái "Pending" (Chờ kiểm thử lại) sau khi chỉnh sửa.
  - Kiểm thử viên kiểm tra lại và chuyển lỗi sang trạng thái "Tested" (Đã kiểm tra) hoặc chuyển về "Error".
  - Quản trị viên dự án đóng các lỗi đã kiểm tra (Tested) và chuyển trạng thái sang "Closed" (Đã đóng).

### Thông báo qua Email

- Hệ thống gửi email cho các bên liên quan mỗi khi có sự kiện xảy ra (lỗi mới tạo hoặc cập nhật trạng thái của lỗi).

## Công nghệ sử dụng

- Ngôn ngữ lập trình: [PHP](https://www.php.net/)
- Framework: [Laravel](https://laravel.com/)
- Cơ sở dữ liệu: [MySQL](https://www.mysql.com/)
- Frontend: [HTML](https://developer.mozilla.org/en-US/docs/Web/HTML), [CSS](https://developer.mozilla.org/en-US/docs/Web/CSS), [JavaScript](https://developer.mozilla.org/en-US/docs/Web/JavaScript)

## Cài đặt

1. **Clone repo**:
    ```sh
    git clone https://github.com/CNG03/BugBuster.git
    cd BugBuster
    ```
2. **Cài đặt các gói phụ thuộc:**:
    ```sh
    composer install
    npm install
    ```
3. **Cấu hình môi trường:**:
- Tạo file .env dựa trên file .env.example.
- Cập nhật thông tin cơ sở dữ liệu và các thông số cấu hình khác trong file .env.
- Vì ứng dụng này gửi Mail và Login with Google bạn nên cấu hình 2 dịch vụ này ở trong file .env.
4. **Chạy các lệnh migrate và seed:**:
    ```sh
    php artisan migrate --seed
    ```
5. **Chạy các lệnh tạo app key and jwt key:**:
    ```sh
    php artisan jwt:secret
    php artisan key:generate
    ```
6. **Khởi động server and api:**:
    ```sh
    php artisan serve
    php artisan serve --port=7000
    ```
7. **Truy cập vào ứng dụng:**:
Mở trình duyệt và truy cập http://localhost:8000.