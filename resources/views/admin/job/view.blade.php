@extends('admin.master')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chi tiết công việc</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="/admin/job">Công việc</a></li>
                    <li class="breadcrumb-item active">Chi tiết công việc</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <td><b>Mã công việc</b></td>
                            <td>{{ $job->job_id }}</td>
                        </tr>
                        <tr>
                            <td><b>Tên công việc</b></td>
                            <td>{{ $job->job_name }}</td>
                        </tr>
                        <tr>
                            <td><b>Địa điểm làm việc</b></td>
                            <td>{{ $job->job_location }}</td>
                        </tr>
                        <tr>
                            <td><b>Mô tả làm việc</b></td>
                            <td>{!! $job->job_description !!}</td>
                        </tr>
                        <tr>
                            <td><b>Mức lương</b></td>
                            <td>{{ $job->salary }}</td>
                        </tr>
                        <tr>
                            <td><b>Số năm kinh nghiệm</b></td>
                            <td>{{ $job->years_of_experience }}</td>
                        </tr>
                        <tr>
                            <td><b>Hạn chót nộp hồ sơ</b></td>
                            <td>{{ App\Helpers\Helper::DateTime($job->expiration_date, 'date') }}</td>
                        </tr>
                        <tr>
                            <td><b>Loại công việc</b></td>
                            <td>{{ $job->type_of_job }}</td>
                        </tr>
                        <tr>
                            <td><b>Chức danh</b></td>
                            <td>{{ $job->job_title }}</td>
                        </tr>
                        <tr>
                            <td><b>Học vấn</b></td>
                            <td>{{ $job->academic_level }}</td>
                        </tr>
                        <tr>
                            <td><b>Giới tính</b></td>
                            <td>
                                @if($job->is_male)
                                <span class="badge badge-primary">Nam</span>
                                @endif
                                @if($job->is_female)
                                <span class="badge badge-danger">Nữ</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><b>Độ tuổi</b></td>
                            <td>{{ $job->age }}</td>
                        </tr>
                        <tr>
                            <td><b>Ngành nghề</b></td>
                            <td>
                                @foreach($job->categories as $c)
                                <span class="badge badge-info">{{ $c->category_name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td><b>Thông tin liên hệ</b></td>
                            <td>{!! $job->contact !!}</td>
                        </tr>
                        <tr>
                            <td><b>Duyệt</b></td>
                            <td>
                                @if($job->active)
                                <span class="badge badge-success">Đã duyệt</span>
                                @else
                                <span class="badge badge-danger">Đang chờ xét duyệt</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection

@section('footer')
<script>
$(function() {
    $('#job_description').summernote();
    $('#contact').summernote();
});
</script>
@endsection