# Thực tập đồ án chuyên ngành 
# KIM THỊ SÔ PHI - 110120060
# job_laravel
<p align="center"><a href= ![gd_chinh](https://github.com/phiphi1101/cn-da20tta-kimthisophi-job-laravel/assets/116547777/d0158c6b-9782-45cd-b5f3-f937a966776d)
></a></p>

[![Open in Visual Studio Code](https://img.shields.io/static/v1?logo=visualstudiocode&label=&message=Open%20in%20Visual%20Studio%20Code&labelColor=2c2c32&color=007acc&logoColor=007acc)](https://open.vscode.dev/microsoft/Web-Dev-For-Beginners)

<p align="center">
  
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Thông tin dự án
#### Cơ sở dữ liệu:
![15-Best-Free-PHP-Framework-2015](https://github.com/phiphi1101/cn-da20tta-kimthisophi-job-laravel/assets/116547777/a0b4f5e6-5d48-4b49-a3be-df2f6cd9d6b5)


#### Biểu đồ Use Case tổng quát:
![Biểu đồ use case tổng quát CN drawio](https://github.com/NgoTanLoi01/cn-da20tta-ngotanloi-ITshop-laravel/assets/112923143/84d6deb8-e636-48f7-ba2d-9769d1afb652)

#### Giao diện người dùng:
  
![Giao diện trang chủ](https://github.com/NgoTanLoi01/cn-da20tta-ngotanloi-ITshop-laravel/assets/112923143/9345588e-7731-4162-8404-4d5225b23fc7)

#### Giao diện quản trị:

![Giao diện quản trị](https://github.com/NgoTanLoi01/cn-da20tta-ngotanloi-ITshop-laravel/assets/112923143/01a1ce32-832b-4895-aa75-fe4e798cd937)



## Cách cài đặt 
  - Cài đặt PHP phiên bản 7.3 trở lên và Composer
  - Tải dự án từ github

          git clone https://github.com/NgoTanLoi01/cn-da20tta-ngotanloi-ITshop-laravel.git
  - Cài đặt phần còn thiếu của dự án

          composer install
          composer update

  - Chạy dự án
    - Chạy lệnh sau để xóa symbolic link cũ trong thư mục public của Laravel 
   
           Remove-Item -Recurse -Force public\storage
    - Chạy lệnh sau để tạo ra một symbolic link mới trong thư mục public của Laravel
   
           php artisan storage:link
    - Chạy lệnh sau để tạo các bảng cơ sở dữ liệu
   
          php artisan migrate:fresh --seed
    - Chạy dự án laravel

          php artisan serve
    - Truy cập vào địa chỉ localhost vừa xuất hiện
   
          http://127.0.0.1:8000/

## Thông tin liên hệ tác giả
  - Họ tên: Ngô Tấn Lợi
  - SĐT: 0337120073
  - Email: ngotanloi2424@gmail.com
