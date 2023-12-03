@extends('admin.master')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm công ty</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="/admin/company">Công ty</a></li>
                    <li class="breadcrumb-item active">Thêm công ty</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <form action="/admin/company/add" method="POST" class="card-body" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Tên công ty</label>
                            <input type="text" class="form-control" name="company_name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Logo công ty</label>
                            <input type="file" class="form-control" name="logo">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label>Về công ty</label>
                            <textarea id="company_information" name="company_information"></textarea>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary"><i class="far fa-save"></i> Lưu</button>
                <a href="/admin/company" class="btn btn-danger"><i class="fas fa-ban"></i> Huỷ bỏ</a>
                @csrf
            </form>
        </div>
    </div>
</section>
@endsection

@section('footer')
<script>
$(function() {
    $('#company_information').summernote();
});
</script>
@endsection
