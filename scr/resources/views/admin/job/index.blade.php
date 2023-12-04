@extends('admin.master')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Danh sách công việc</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="/admin/job">Công việc</a></li>
                    <li class="breadcrumb-item active">Danh sách công việc</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <a href="/admin/job/add" class="btn btn-success"><i class="fas fa-plus"></i> Thêm mới</a>
            <form style="width: 260px" class="input-group">
                <input type="text" class="form-control" name="q" placeholder="Tìm kiếm ..." value="{{ $keyword }}">
                <div class="input-group-append">
                    <button class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr class="bg-orange">
                            <th class="text-white">Tên công việc</th>
                            <th class="text-white">Số năm KN</th>
                            <th class="text-white">Chức danh</th>
                            <th class="text-white">Học vấn</th>
                            <th class="text-white">Giới tính</th>
                            <th class="text-white">Độ tuổi</th>
                            <th class="text-white">Ngành nghề</th>
                            <th class="text-white">Duyệt</th>
                            <th width="252" class="text-white">Công cụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jobs as $j)
                        <tr>
                            <td>{{ $j->job_name }}</td>
                            <td>{{ $j->years_of_experience }}</td>
                            <td>{{ $j->job_title }}</td>
                            <td>{{ $j->academic_level }}</td>
                            <td>
                                @if($j->is_male)
                                <span class="badge badge-primary">Nam</span>
                                @endif
                                @if($j->is_female)
                                <span class="badge badge-danger">Nữ</span>
                                @endif
                            </td>
                            <td>{{ $j->age }}</td>
                            <td>
                                @foreach($j->categories as $c)
                                <span class="badge badge-info">{{ $c->category_name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @if($j->active)
                                <span class="badge badge-success">Đã duyệt</span>
                                @else
                                <span class="badge badge-danger">Đang chờ</span>
                                @endif
                            </td>
                            <td>
                                @if(Auth::user()->role == 'admin' && $j->active == false)
                                <a title="Duyệt bài đăng" href="/admin/job/accept/{{ $j->job_id }}" class="btn btn-success rounded-circle"><i class="fas fa-check"></i></a>
                                @endif
                                <a title="Xem danh sách ứng viên" href="/admin/job/recruitment/{{ $j->job_id }}" class="btn btn-dark rounded-circle"><i class="fas fa-users"></i></a>
                                <a title="Xem thông tin chi tiết" href="/admin/job/view/{{ $j->job_id }}" class="btn btn-info rounded-circle"><i class="far fa-eye"></i></a>
                                <a title="Sửa công việc" href="/admin/job/edit/{{ $j->job_id }}" class="btn btn-warning rounded-circle"><i class="far fa-edit"></i></a>
                                <div title="Xoá công việc" onclick="removeRow('/admin/job/destroy', '{{ $j->job_id }}')" class="btn btn-danger rounded-circle"><i class="fas fa-trash-alt"></i></div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection