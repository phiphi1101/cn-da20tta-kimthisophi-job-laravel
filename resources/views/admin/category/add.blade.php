@extends('admin.master')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm ngành nghề</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="/admin/category">Ngành nghề</a></li>
                    <li class="breadcrumb-item active">Thêm ngành nghề</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <form action="/admin/category/add" method="POST" class="card-body">
                <div class="form-group">
                    <label>Tên thể loại</label>
                    <input type="text" class="form-control" name="category_name">
                </div>
                <button class="btn btn-primary"><i class="far fa-save"></i> Lưu</button>
                <a href="/admin/category" class="btn btn-danger"><i class="fas fa-ban"></i> Huỷ bỏ</a>
                @csrf
            </form>
        </div>
    </div>
</section>
@endsection