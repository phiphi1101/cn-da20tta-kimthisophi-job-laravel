@extends('home.master')

@section('content')
<div class="hero-wrap hero-wrap-2" style="background-image: url('/template/home/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
            <div class="col-md-12 ftco-animate text-center mb-5">
                <p class="breadcrumbs mb-0">
                    <span class="mr-3">
                        <a href="/">Trang chủ
                            <i class="ion-ios-arrow-forward"></i>
                        </a>
                    </span>
                    <span>Nhà tuyển dụng</span>
                </p>
                <h1 class="mb-3 bread">Đăng ký tài khoản</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section contact-section bg-light">
    <div class="container">
        <div class="row">
            <form action="/auth/registry-employer" class="bg-white p-5 contact-form" method="POST" enctype="multipart/form-data">
                <h3 class="text-primary">1. Thông tin tài khoản</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="fullname" class="form-control" required placeholder="Họ tên">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="file" name="avatar" class="form-control" required placeholder="Avatar">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" required placeholder="Địa chỉ email">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="phone" class="form-control" required placeholder="Số điện thoại">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" required placeholder="Mật khẩu">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="password" name="re-password" class="form-control" required placeholder="Nhập lại mật khẩu">
                        </div>
                    </div>
                </div>
                <h3 class="text-primary">2. Thông tin công ty</h3>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" name="company_name" class="form-control" required placeholder="Tên công ty">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="tax_code" class="form-control" required placeholder="Mã số thuế">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="file" name="logo" class="form-control" required placeholder="Logo">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea name="company_information" class="form-control" required placeholder="Giới thiệu công ty"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-primary">Đăng ký</button>
                    </div>
                </div>
                @csrf
            </form>
        </div>
    </div>
</section>
@endsection
