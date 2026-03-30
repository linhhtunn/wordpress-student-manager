# 🚀 Student Manager Plugin

Một **Plugin WordPress chuyên nghiệp** hỗ trợ quản lý thông tin sinh viên, được xây dựng với **cấu trúc chuẩn (Modular Architecture)** nhằm tối ưu khả năng quản trị và hiển thị dữ liệu linh hoạt qua Shortcode.

---

## 🧰 Tech Stack

![WordPress](https://img.shields.io/badge/WordPress-21759B?style=for-the-badge&logo=wordpress&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)

**Framework:** WordPress Plugin API  
**Language:** PHP (Server-side)  
**Database:** MySQL (Custom Post Type & Meta Data)  
**UI Styling:** Custom CSS3  
**Security:** Nonce Verification & Data Sanitization  
**Architecture:** Modular-based architecture (Phân tách logic file)

---

## 🌐 Project Overview

Dự án được thiết kế nhằm cung cấp **hệ thống quản lý sinh viên nội bộ** đơn giản, bảo mật và dễ dàng tích hợp vào bất kỳ giao diện WordPress nào.

### 🎯 Mục tiêu

* Tạo khu vực **quản trị sinh viên (Custom Post Type)** chuyên biệt
* Hỗ trợ **nhập liệu tùy biến** (MSSV, Chuyên ngành, Ngày sinh) qua Meta Box
* Hiển thị danh sách sinh viên dạng **bảng HTML hiện đại và trực quan**
* Đảm bảo **bảo mật dữ liệu** tuyệt đối với cơ chế Sanitize và Nonce của WordPress

Ngoài ra, hệ thống còn được thiết kế để **mở rộng thêm các tính năng lọc và tìm kiếm sinh viên** trong tương lai.

---

## 📸 Demo Interface

### ⚙️ Quản trị hệ thống (Backend)
![Admin Preview](./assets/admin-preview.png)
> **Giao diện quản lý:** Hỗ trợ nhập liệu đầy đủ các trường thông tin sinh viên ngay trong Dashboard.

### 🖥️ Hiển thị dữ liệu (Frontend)
![Frontend Preview](./assets/frontend-preview.png)
> **Bảng danh sách:** Dữ liệu được render tự động qua Shortcode `[danh_sach_sinh_vien]` với giao diện Responsive.

---

## 🛠️ Hướng dẫn cài đặt

1. Tải về file **student-manager.zip**.
2. Giải nén và copy thư mục vào đường dẫn `wp-content/plugins/`.
3. Truy cập vào **Admin Dashboard -> Plugins** và nhấn **Kích hoạt (Activate)**.
4. Tạo trang mới và dán đoạn mã `[danh_sach_sinh_vien]` để hiển thị kết quả.
