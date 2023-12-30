<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    <link rel="icon" href="/favicon.png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/template/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Summer note -->
    <link rel="stylesheet" href="/template/admin/plugins/summernote/summernote-bs4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/template/admin/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/template/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/template/admin/dist/css/adminlte.min.css">
    <style>
    .two-line {
        max-height: 59px;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
    }

    .three-line {
        max-height: 88px;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
    }
    </style>
    @yield('header')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button" title="Toàn màn hình">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/auth/logout" title="Đăng xuất">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="/" class="brand-link">
                <img src="/favicon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Giới thiệu việc làm</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ Auth::user()->avatar }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->fullname }}</a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        @if(Auth::user()->role == 'admin')
                        <li class="nav-item">
                            <a href="/admin/category" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Ngành nghề</p>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a href="/admin/job" class="nav-link">
                                <i class="nav-icon fas fa-list"></i>
                                <p>Công việc</p>
                            </a>
                        </li>
                        @if(Auth::user()->role == 'admin')
                        <li class="nav-item">
                            <a href="/admin/company" class="nav-link">
                                <i class="nav-icon fas fa-building"></i>
                                <p>Công ty</p>
                            </a>
                        </li>
                        @endif
                        @if(Auth::user()->role == 'admin')
                        <li class="nav-item">
                            <a href="/admin/account/employer" class="nav-link">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p>Nhà tuyển dụng</p>
                            </a>
                        </li>
                        @endif
                        @if(Auth::user()->role == 'admin')
                        <li class="nav-item">
                            <a href="/admin/account/user" class="nav-link">
                                <i class="nav-icon fas fa-users-cog"></i>
                                <p>Người tìm việc</p>
                            </a>
                        </li>
                        @endif
                        @if(Auth::user()->role == 'employer')
                        <li class="nav-item">
                            <a href="/admin/profile" class="nav-link">
                                <i class="nav-icon fas fa-building"></i>
                                <p>Thông tin công ty</p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>

    @include('sweetalert::alert')
    <!-- jQuery -->
    <script src="/template/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/template/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Summer Note -->
    <script src="/template/admin/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- Select2 -->
    <script src="/template/admin/plugins/select2/js/select2.full.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/template/admin/dist/js/adminlte.min.js"></script>
    <!-- Delete JS -->
    <script src="/delete.js"></script>
    <script>
    $(function() {
        $('.select2').select2({
            theme: 'bootstrap4'
        });
    });
    </script>
    @yield('footer')
</body>

</html>
