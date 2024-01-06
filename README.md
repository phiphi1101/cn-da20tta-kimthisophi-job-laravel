# Thực tập đồ án chuyên ngành 
# KIM THỊ SÔ PHI - 110120060
# job_laravel
![gd_chinh](https://github.com/phiphi1101/cn-da20tta-kimthisophi-job-laravel/assets/116547777/baba08e0-bf34-4100-b525-7b21f54a9df1)



[![Open in Visual Studio Code](https://img.shields.io/static/v1?logo=visualstudiocode&label=&message=Open%20in%20Visual%20Studio%20Code&labelColor=2c2c32&color=007acc&logoColor=007acc)](https://open.vscode.dev/microsoft/Web-Dev-For-Beginners)

<p align="center">
  
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Thông tin dự án
#### Mô hình dữ liệu mức quan niệm
![erd](https://github.com/phiphi1101/cn-da20tta-kimthisophi-job-laravel/assets/116547777/2c1409e9-0ad2-41db-98ba-e997b1a2227d)

#### Biểu đồ Use Case tổng quát (Admin)
![1 drawio](https://github.com/phiphi1101/cn-da20tta-kimthisophi-job-laravel/assets/116547777/6f9d0c0c-e9f0-493a-a3b3-737f62d10996)


#### Giao diện trang liên hệ
  ![gd_lh](https://github.com/phiphi1101/cn-da20tta-kimthisophi-job-laravel/assets/116547777/5825a73f-db15-4275-a3fc-5b0f1da8e3a3)

#### Giao diện quản trị:
![qtri](https://github.com/phiphi1101/cn-da20tta-kimthisophi-job-laravel/assets/116547777/648f3dbc-fe3a-4efa-9b13-37ea0efa0fe4)


#### Giao diện người tìm việc
![gd_chinh](https://github.com/phiphi1101/cn-da20tta-kimthisophi-job-laravel/assets/116547777/96d6972f-108e-4137-bec7-8b116b16ba93)


#### Giao diện nhà tuyển dụng
![ntd](https://github.com/phiphi1101/cn-da20tta-kimthisophi-job-laravel/assets/116547777/42ece2a8-9370-45a2-9c49-b70ff0df6cf8)



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
