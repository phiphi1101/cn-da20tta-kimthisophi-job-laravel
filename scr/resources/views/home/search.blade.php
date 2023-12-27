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
                    <span>Tìm việc</span>
                </p>
                <h1 class="mb-3 bread">Tìm việc</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section bg-light">
    <div class="container mb-5">
        <div class="row">
            <div class="col-lg-12 pr-lg-4">
                <form action="/find-job" class="search-job">
                    <div class="row no-gutters">
                        <div class="col-md mr-md-2">
                            <div class="form-group">
                                <div class="form-field">
                                    <div class="icon"><span class="icon-briefcase"></span></div>
                                    <input type="text" class="form-control" name="name" placeholder="Lập trình viên, Nhân viên văn phòng" value="{{ $key['name'] }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md mr-md-2">
                            <div class="form-group">
                                <div class="form-field">
                                    <div class="select-wrap">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select name="cat" class="form-control">
                                            <option value="">--- Ngành nghề ---</option>
                                            @foreach($categories as $c)
                                            <option value="{{ $c->category_id }}" {{ $key['cat'] == $c->category_id ? "selected" : "" }}>{{ $c->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
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

    <div class="container">
        <div class="row">
            <div class="col-lg-12 pr-lg-4">
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
@endsection