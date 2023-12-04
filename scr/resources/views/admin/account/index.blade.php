@extends('admin.master')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tài khoản thành viên</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="/admin/account">Tài khoản</a></li>
                    <li class="breadcrumb-item active">Tài khoản thành viên</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form action="/admin/account/add" class="input-group" method="POST">
                    <input type="email" class="form-control" name="email" placeholder="yourmail@gmail.com">
                    <input type="hidden" class="form-control" name="company_id" value="{{ $company->company_id }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Thêm thành viên</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr class="bg-orange">
                            <th class="text-white">Mã tài khoản</th>
                            <th class="text-white">Họ tên</th>
                            <th class="text-white">Avatar</th>
                            <th class="text-white">Email</th>
                            <th class="text-white">Số điện thoại</th>
                            <th width="114" class="text-white">Xoá</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($company->users as $u)
                        <tr>
                            <td>{{ $u->user_id }}</td>
                            <td>{{ $u->fullname }}</td>
                            <td>
                                <a href="{{ $u->avatar }}" target="_blank">
                                    <img width="50" src="{{ $u->avatar }}" alt="{{ $u->fullname }}">
                                </a>
                            </td>
                            <td>{{ $u->email }}</td>
                            <td>{{ $u->phone }}</td>
                            <td>
                                <div onclick="removeRow('/admin/account/destroy', '{{$company->company_id}}-{{ $u->user_id }}')" class="btn btn-danger rounded-circle"><i class="fas fa-trash-alt"></i></div>
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