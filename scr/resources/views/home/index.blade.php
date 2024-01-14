@extends('home.master')

@section('content')
<div class="hero-wrap img" style="background-image: url(/template/home/images/bg_1.jpg);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row d-md-flex no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-10 d-flex align-items-center ftco-animate">
                <div class="text text-center pt-5 mt-md-5">
                    <p class="mb-4">Tìm việc làm, việc làm và cơ hội nghề nghiệp</p>
                    <h1 class="mb-5">Cách dễ nhất để có được công việc mới của bạn</h1>
                    <div class="ftco-search my-md-5">
                        <div class="row">
                            <div class="col-md-12 nav-link-wrap">
                                <div class="nav nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active mr-md-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Tìm việc</a>
                                </div>
                            </div>
                            <div class="col-md-12 tab-wrap">
                                <div class="tab-content p-4" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
                                        <form action="/find-job" class="search-job">
                                            <div class="row no-gutters">
                                                <div class="col-md-9 mr-md-2">
                                                    <div class="form-group">
                                                        <div class="form-field">
                                                            <div class="icon"><span class="icon-briefcase"></span></div>
                                                            <input type="text" class="form-control" name="name" placeholder="Lập trình viên, Nhân viên văn phòng">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <div class="form-field">
                                                            <button type="submit" class="form-control btn btn-primary">Tìm kiếm</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2 class="mb-0">Ngành nghề</h2>
            </div>
        </div>
        <div class="row">
            @foreach($categories as $c)
            <div class="col-md-3 ftco-animate">
                <ul class="category text-center">
                    <li>
                        <a href="find-job?cat={{ $c->category_id }}">{{ $c->category_name }}<br>
                            <i class="ion-ios-arrow-forward"></i>
                        </a>
                    </li>
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="ftco-section services-section">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-block">
                    <div class="icon"><span class="flaticon-resume"></span></div>
                    <div class="media-body">
                        <h3 class="heading mb-3">Tìm kiếm hàng triệu việc làm</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-block">
                    <div class="icon"><span class="flaticon-team"></span></div>
                    <div class="media-body">
                        <h3 class="heading mb-3">Dễ dàng quản lý công việc</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-block">
                    <div class="icon"><span class="flaticon-career"></span></div>
                    <div class="media-body">
                        <h3 class="heading mb-3">Nghề nghiệp hàng đầu</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-block">
                    <div class="icon"><span class="flaticon-employees"></span></div>
                    <div class="media-body">
                        <h3 class="heading mb-3">Tìm kiếm ứng viên chuyên gia</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 pr-lg-5">
                <div class="row justify-content-center pb-3">
                    <div class="col-md-12 heading-section ftco-animate">
                        <span class="subheading">Công việc mới</span>
                        <h2 class="mb-4">Bài đăng việc làm nổi bật trong tuần này</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach($jobs as $j)
                    <div class="col-md-6 ftco-animate">
                        <div class="job-post-item p-4 d-block d-lg-flex align-items-center">
                            <div class="mb-4 mb-md-0">
                                <div class="job-post-item-header align-items-center">
                                    <span class="subadge">{{ $j->type_of_job }}</span>
                                    <h3 class="mr-3 text-black">
                                        <a href="/detail/{{ $j->job_id }}">{{ $j->job_name }}</a>
                                    </h3>
                                </div>
                                <div class="job-post-item-body d-block d-md-flex">
                                    <div class="mr-3">
                                        <i class="far fa-money-bill-alt"></i>
                                        <a href="#">{{ $j->salary }}</a>
                                    </div>
                                    <div class="mr-3">
                                        <i class="fas fa-universal-access"></i>
                                        <span>{{ $j->years_of_experience }}</span>
                                    </div>
                                </div>
                                <div class="job-post-item-header align-items-center">
                                    @foreach($j->categories as $c)
                                    <span class="subadge">{{ $c->category_name }}, </span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section-parallax">
    <div class="parallax-img d-flex align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                    {{-- <h2>Đăng ký nhận bản tin của chúng tôi</h2>
                    <p></p>
                    <div class="row d-flex justify-content-center mt-4 mb-4">
                        <div class="col-md-12">
                            <form action="#" class="subscribe-form">
                                <div class="form-group d-flex">
                                    <input type="text" class="form-control" placeholder="Enter email address">
                                    <input type="submit" value="Subscribe" class="submit px-3">
                                </div>
                            </form>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
