@extends('admin.master')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Ứng viên công việc</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="/admin/job">Công việc</a></li>
                    <li class="breadcrumb-item active">Ứng viên công việc</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                         <tr class="bg-orange">
                            <th>Mã tài khoản</th>
                            <th>Họ tên</th>
                            <th>Giới tính</th>
                            <th>Ngày sinh</th>
                            <th>Ảnh đại diện</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Trình độ</th>
                            <th>Trình độ ngoại ngữ</th>
                            <th>Trình độ tin học</th>
                            <th>Bằng cấp</th>
                            <th>Công việc hiện tại</th>
                            <th>Kỹ năng</th>
                            <th>Mức lương mong muốn</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($job->recruitments as $u)
                            <tr>
                                <td>{{ $u->user_id }}</td>
                                <td>{{ $u->fullname }}</td>
                                <td>{{ $u->gender }}</td>
                                <td>{{ $u->birthdate }}</td>
                                <td>
                                    <a href="{{ $u->avatar }}" target="_blank">
                                        <img width="50" src="{{ $u->avatar }}" alt="{{ $u->fullname }}">
                                    </a>
                                </td>
                                <td>{{ $u->email }}</td>
                                <td>{{ $u->phone }}</td>
                                <td>{{ $u->education_level }}</td>
                                <td>{{ $u->language_level }}</td>
                                <td>{{ $u->computer_skills }}</td>
                                <td>{{ $u->degree }}</td>
                                <td>{{ $u->current_job }}</td>
                                <td>{{ $u->skills }}</td>
                                <td>{{ $u->desired_salary }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
