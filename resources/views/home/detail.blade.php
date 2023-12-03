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
                    <span>Công việc</span>
                </p>
                <h1 class="mb-3 bread">{{ $job->job_name }}</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section contact-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 bg-white">
                <img width="100%" src="https://dxwd4tssreb4w.cloudfront.net/web/images/default_banner_0.svg" alt="" class="mt-4">
                <div class="d-flex align-items-center my-4">
                    <img class="shadow rounded" width="140" src="{{ $company->logo }}" alt="{{ $company->company_id }}">
                    <div class="ml-3">
                        <h2>{{ $job->job_name }}</h2>
                        <h6>{{ $company->company_name }}</h6>
                    </div>
                </div>
                <hr>
                <div class="text-dark">
                    <p><i class="fas fa-fw mr-2 fa-map-marker-alt"></i> {{ $job->job_location }}</p>
                    <p><i class="fas fa-fw mr-2 fa-coins"></i> {{ $job->salary }}</p>
                    <p><i class="fas fa-fw mr-2 fa-briefcase"></i> {{ $job->years_of_experience }}</p>
                    <p><i class="fas fa-fw mr-2 fa-calendar-plus"></i> {{ App\Helpers\Helper::DateTime($job->created_at, 'date') }}
                        <i class="fas fa-fw mx-2 fa-calendar-times"></i> {{ App\Helpers\Helper::DateTime($job->expiration_date, 'date') }}
                    </p>
                </div>
                <hr>
                <a href="/recruitment/{{ $job->job_id }}" class="btn btn-outline-success btn-lg py-2">Ứng tuyển</a>
                <hr>
                <h4 class="text-primary"><b>Mô tả công việc</b></h4>
                <p>{!! $job->job_description !!}</p>
                <h4 class="text-primary"><b>Kinh nghiệm / Kỹ năng chi tiết</b></h4>
                <div class="row text-dark">
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body" style="background-color: #EFF6FF">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-fw fa-lg fa-box-open"></i>
                                    <div class="ml-3">
                                        <div>Loại công việc</div>
                                        <div><b>{{ $job->type_of_job }}</b></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body" style="background-color: #EFF6FF">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-fw fa-lg fa-layer-group"></i>
                                    <div class="ml-3">
                                        <div>Chức danh</div>
                                        <div><b>{{ $job->job_title }}</b></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body" style="background-color: #EFF6FF">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-fw fa-lg fa-hat-cowboy-side"></i>
                                    <div class="ml-3">
                                        <div>Học vấn</div>
                                        <div><b>{{ $job->academic_level }}</b></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body" style="background-color: #EFF6FF">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-fw fa-lg fa-venus-mars"></i>
                                    <div class="ml-3">
                                        <div>Giới tính</div>
                                        <div>
                                            @if($job->is_male)
                                            <b>Nam, </b>
                                            @endif
                                            @if($job->is_female)
                                            <b>Nữ, </b>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body" style="background-color: #EFF6FF">
                                <div class="d-flex align-items-center">
                                    <i class="fab fa-fw fa-lg fa-pagelines"></i>
                                    <div class="ml-3">
                                        <div>Độ tuổi</div>
                                        <div><b>{{ $job->age }}</b></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body" style="background-color: #EFF6FF">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-fw fa-lg fa-th"></i>
                                    <div class="ml-3">
                                        <div>Ngành nghề</div>
                                        <div>
                                            @foreach($job->categories as $c)
                                            <b>{{ $c->category_name }}, </b>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <h4 class="text-primary"><b>Thông tin liên hệ</b></h4>
                <p class="text-dark">{!! $job->contact !!}</p>
                <hr>
                <h4 class="text-primary"><b>Về công ty</b></h4>
                <p class="text-dark">{!! $company->company_information !!}</p>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</section>
@endsection