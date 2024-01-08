<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link rel="icon" href="/favicon.png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/template/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="/template/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/template/admin/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box" style="width: 800px;">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="/" class="h1"><b>Đăng ký NTV</b></a>
            </div>
            <div class="card-body">
                <form action="/auth/registry" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <h5><b class="text-success">1. Thông tin cá nhân</b></h5>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input type="text" name="fullname" class="form-control" placeholder="Họ tên">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Giới tính</label>
                                <select name="gender" class="form-control" placeholder="Giới tính">
                                    <option value="male">Nam</option>
                                    <option value="female">Nữ</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Ngày sinh</label>
                                <input type="date" name="birthday" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Ảnh đại diện</label>
                                <input type="file" name="avatar" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="text" name="phone" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input type="password" name="re-password" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h5><b class="text-success">2. Trình độ</b></h5>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Trình độ</label>
                                @php
                                $academicList = ['Không yêu cầu', 'Đại học', 'Cao đẳng', 'Trung cấp', '12/12', '9/12'];
                                @endphp
                                <select class="form-control select2" name="academic_level">
                                    @foreach($academicList as $t)
                                    <option value="{{ $t }}">{{ $t }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Trình độ ngoại ngữ</label>
                                <input type="text" name="english_level" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Trình độ tin học</label>
                                <input type="text" name="it_level" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Bằng cấp</label>
                                <input type="file" name="degree_path" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h5><b class="text-success">3. Công việc hiện tại</b></h5>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mô tả công việc hiện tại</label>
                                <input type="text" name="current_job_description" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kỹ năng công việc hiện tại</label>
                                <input type="text" name="current_job_skills" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Vị trí công việc hiện tại</label>
                                <input type="text" name="current_job_potision" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mức lương mong muốn</label>
                                <input type="number" name="salary" class="form-control">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block">Đăng ký</button>
                    @csrf
                </form>
            </div>
        </div>
    </div>

    @include('sweetalert::alert')
    <!-- jQuery -->
    <script src="/template/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/template/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/template/admin/dist/js/adminlte.min.js"></script>
</body>

</html>
