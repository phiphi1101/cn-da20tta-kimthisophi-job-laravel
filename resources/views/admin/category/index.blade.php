@extends('admin.master')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Danh sách ngành nghề</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="/admin/category">Ngành nghề</a></li>
                    <li class="breadcrumb-item active">Danh sách ngành nghề</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <a href="/admin/category/add" class="btn btn-success"><i class="fas fa-plus"></i> Thêm mới</a>
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
                            <th class="text-white">Ngành nghề</th>
                            <th width="114" class="text-white">Công cụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $c)
                        <tr>
                            <td>{{ $c->category_name }}</td>
                            <td>
                                <a href="/admin/category/edit/{{ $c->category_id }}" class="btn btn-warning rounded-circle"><i class="far fa-edit"></i></a>
                                <div onclick="removeRow('/admin/category/destroy', '{{ $c->category_id }}')" class="btn btn-danger rounded-circle"><i class="fas fa-trash-alt"></i></div>
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