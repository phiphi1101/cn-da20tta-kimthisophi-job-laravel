@extends('admin.master')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thông tin công ty</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="/admin/profile">{{ Auth::user()->company->company_name }}</a></li>
                    <li class="breadcrumb-item active">Thông tin công ty</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <form method="POST" enctype="multipart/form-data">
            <h3 class="text-success"><b>1. Thông tin tài khoản</b></h3>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <input type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->user_id }}">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Họ tên</label>
                                <input type="text" class="form-control" name="fullname" value="{{ Auth::user()->fullname }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Avatar</label>
                                <input type="file" class="form-control" name="avatar" value="{{ Auth::user()->avatar }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Số điện thoại</label>
                                <input type="text" class="form-control" name="phone" value="{{ Auth::user()->phone }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Mật khẩu mới</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Nhập lại mật khẩu mới</label>
                                <input type="password" class="form-control" name="re-password">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h3 class="text-success"><b>2. Thông tin công ty</b></h3>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <input type="hidden" class="form-control" name="company_id" value="{{ Auth::user()->company->company_id }}">
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label>Tên công ty</label>
                                <input type="text" class="form-control" name="company_name" value="{{ Auth::user()->company->company_name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Mã số thuế</label>
                                <input type="text" class="form-control" name="tax_code" value="{{ Auth::user()->company->tax_code }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Avatar</label>
                                <input type="file" class="form-control" name="logo" value="{{ Auth::user()->company->logo }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label>Giới thiệu</label>
                                <textarea name="company_information" class="form-control">{{ Auth::user()->company->company_information }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary">Lưu</button>
            @csrf
        </form>
    </div>
</section>
@endsection
