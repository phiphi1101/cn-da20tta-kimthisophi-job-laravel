<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="icon" href="/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/template/home/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="/template/home/css/animate.css">
    <link rel="stylesheet" href="/template/home/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/template/home/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/template/home/css/magnific-popup.css">
    <link rel="stylesheet" href="/template/home/css/aos.css">
    <link rel="stylesheet" href="/template/home/css/ionicons.min.css">
    <link rel="stylesheet" href="/template/home/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/template/home/css/jquery.timepicker.css">
    <link rel="stylesheet" href="/template/home/css/flaticon.css">
    <link rel="stylesheet" href="/template/home/css/icomoon.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/template/home/css/style.css">

    @yield('header')
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container-fluid px-md-4	">
            <a class="navbar-brand" href="/">Job24H</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="/" class="nav-link">Trang chủ</a></li>
                    <li class="nav-item"><a href="/find-job" class="nav-link">Tìm việc</a></li>
                    <li class="nav-item"><a href="/contact" class="nav-link">Liên hệ</a></li>
                    @if(Auth::check())
                    <li class="nav-item cta mr-md-1"><a href="#" class="nav-link">Xin chào, {{ Auth::user()->fullname }}</a></li>
                    <li class="nav-item cta mr-md-1"><a href="/auth/logout" class="nav-link">Đăng xuất</a></li>
                    @else
                    <li class="nav-item cta mr-md-1"><a href="/auth/registry" class="nav-link">Đăng ký hồ sơ tìm việc </a></li>
                    <li class="nav-item cta mr-md-1"><a href="/auth/registry-employer" class="nav-link">Đăng ký Nhà tuyển dụng</a></li>
                    <li class="nav-item cta cta-colored"><a href="/auth" class="nav-link">Đăng nhập</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Job24h</h2>
                        <p>Hãy kết nối các doanh nghiệp đang khao khát nguồn nhân lực chất lượng với các ứng cử viên sáng giá nhất. Đối với nhà tuyển dụng, chúng tôi tiến hành tiếp xúc, tìm hiểu nhu cầu tuyển dụng thực tế, tư vấn cho khách hàng phương pháp
                            tuyển dụng hiệu quả nhất.</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Tuyển dụng </h2>
                        <ul class="list-unstyled">
                            @foreach($categories as $c)
                            <li><a href="#" class="pb-1 d-block">{{ $c->category_name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Bạn có câu hỏi?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">126 Nguyễn Thiện Thành, Khóm 4, Phường 5, Tp.Trà Vinh</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+84 382 533 858</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">kimthisophi1101@gmail.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>Copyright by kimthisophi-110120060-2023</p>
                </div>
            </div>
        </div>
    </footer>

    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg>
    </div>

    @include('sweetalert::alert')
    <script src="/template/home/js/jquery.min.js"></script>
    <script src="/template/home/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="/template/home/js/popper.min.js"></script>
    <script src="/template/home/js/bootstrap.min.js"></script>
    <script src="/template/home/js/jquery.easing.1.3.js"></script>
    <script src="/template/home/js/jquery.waypoints.min.js"></script>
    <script src="/template/home/js/jquery.stellar.min.js"></script>
    <script src="/template/home/js/owl.carousel.min.js"></script>
    <script src="/template/home/js/jquery.magnific-popup.min.js"></script>
    <script src="/template/home/js/aos.js"></script>
    <script src="/template/home/js/jquery.animateNumber.min.js"></script>
    <script src="/template/home/js/scrollax.min.js"></script>
    <script src="/template/home/js/google-map.js"></script>
    <script src="/template/home/js/main.js"></script>
    @yield('footer')
</body>

</html>
