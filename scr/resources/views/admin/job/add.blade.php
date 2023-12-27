@extends('admin.master')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm công việc</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="/admin/job">Công việc</a></li>
                    <li class="breadcrumb-item active">Thêm công việc</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <form action="/admin/job/add" method="POST" class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Tên công việc</label>
                            <input type="text" class="form-control" name="job_name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Ngành nghề</label>
                            <select class="form-control select2" name="categories[]" multiple="multiple">
                                @foreach($categories as $c)
                                <option value="{{ $c->category_id }}">{{ $c->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label>Địa điểm làm việc</label>
                            <input type="text" class="form-control" name="job_location">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label>Mức lương dự kiến</label>
                            @php
                            $salaryList = ['Thoả thuận', '4 - 6 triệu đồng', '5 - 7 triệu đồng', '7 - 10 triệu đồng', '10 - 15 triệu đồng'];
                            @endphp
                            <select class="form-control select2" name="salary">
                                @foreach($salaryList as $s)
                                <option value="{{ $s }}">{{ $s }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label>Năm kinh nghiệm</label>
                            @php
                            $experList = ['Không yêu cầu', 'Dưới 1 năm kinh nghiệm', '1 năm kinh nghiệm', '1 - 3 năm kinh nghiệm', '3 - 5 năm kinh nghiệm', 'Trên 5 năm kinh nghiệm'];
                            @endphp
                            <select class="form-control select2" name="years_of_experience">
                                @foreach($experList as $e)
                                <option value="{{ $e }}">{{ $e }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label>Loại công việc</label>
                            @php
                            $typeJobList = ['Toàn thời gian', 'Bán thời gian'];
                            @endphp
                            <select class="form-control select2" name="type_of_job">
                                @foreach($typeJobList as $t)
                                <option value="{{ $t }}">{{ $t }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label>Chức danh</label>
                            @php
                            $jobTitleList = ['Nhân viên', 'Giám đốc', 'Bảo vệ'];
                            @endphp
                            <select class="form-control select2" name="job_title">
                                @foreach($jobTitleList as $t)
                                <option value="{{ $t }}">{{ $t }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label>Trình độ học vấn</label>
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
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label>Độ tuổi</label>
                            <input type="text" class="form-control" name="age" placeholder="25 - 40 tuổi">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Giới tính</label>
                            <select class="form-control select2" name="gender[]" multiple="multiple">
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Hạn chót nộp hồ sơ</label>
                            <input type="date" class="form-control" name="expiration_date">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label>Mô tả công việc</label>
                            <textarea id="job_description" name="job_description"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label>Thông tin liên hệ</label>
                            <textarea id="contact" name="contact"></textarea>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary"><i class="far fa-save"></i> Gửi quản trị viên xét duyệt</button>
                <a href="/admin/job" class="btn btn-danger"><i class="fas fa-ban"></i> Huỷ bỏ</a>
                @csrf
            </form>
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
