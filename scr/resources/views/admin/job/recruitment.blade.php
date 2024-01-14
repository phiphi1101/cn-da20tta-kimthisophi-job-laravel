@extends('admin.master')

@section('content')
<section class="content-header">
    <!-- Your content header code remains the same -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                {{-- @if($cv) --}}
                    <table class="table table-striped">
                        <thead>
                            <tr class="bg-orange">
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
                            @foreach ($cvs as $cv)
                            <tr>
                                <td>{{ $cv->fullname }}</td>
                                <td>{{ $cv->gender }}</td>
                                <td>{{ $cv->birthday }}</td>
                                <td>
                                    <a href="{{ $cv->avatar }}" target="_blank">
                                        <img width="70" src="{{ $cv->avatar }}" alt="{{ $cv->fullname }}">
                                    </a>
                                </td>
                                <td>{{ $cv->email }}</td>
                                <td>{{ $cv->phone }}</td>
                                <td>{{ $cv->academic_level }}</td>
                                <td>{{ $cv->english_level }}</td>
                                <td>{{ $cv->it_level }}</td>
                                <td>
                                    <a href="{{ $cv->degree_path }}" target="_blank">
                                        <img width="70" src="{{ $cv->degree_path }}" alt="{{ $cv->fullname }}">
                                    </a>
                                </td>
                                <td>{{ $cv->current_job_description }}</td>
                                <td>{{ $cv->current_job_skills }}</td>
                                <td>{{ number_format($cv->salary, 0, ',', '.') }} VND</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                {{-- @else
                    <p>No CV found for the given user.</p>
                @endif --}}
            </div>
        </div>
    </div>
</section>
@endsection
