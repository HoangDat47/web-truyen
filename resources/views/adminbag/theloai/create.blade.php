@extends('layouts.app')
@section('title', 'Thêm thể loại')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <ol class="breadcrumb breadcrumb-bg-cyan">
                    <li><a href="{{ route('adminhome') }}">Trang chủ</a></li>
                    <li><a href="{{ route('admintheloai.index') }}">Thể loại</a></li>
                    <li class="active">Thêm thể loại</li>
                </ol>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                INPUT
                                <small>Different sizes and widths</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            @include('error.error')
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <form method="POST" action="{{ route('admintheloai.store') }}">
                                        @csrf
                                        <h2 class="card-inside-title">Tên thể loại</h2>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="tentheloai" class="form-control" placeholder="Nhập tên thể loại..."
                                                    id="slug" onkeyup="ChangeToSlug();">
                                            </div>
                                        </div>
                                        <h2 class="card-inside-title">Slug thể loại</h2>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="slug_theloai" class="form-control" id="convert_slug" readonly>
                                            </div>
                                        </div>
                                        <h2 class="card-inside-title">Mô tả thể loại</h2>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea type="text" name="motatheloai" class="form-control summernote"></textarea>
                                            </div>
                                        </div>
                                        <h2 class="card-inside-title">Kích hoạt</h2>
                                        <div class="col-sm-6">
                                            <select class="form-control show-tick" name="kichhoat">
                                                <option value="0">Kích hoạt</option>
                                                <option value="1">Không kích hoạt</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-primary">Thêm</button>
                                            <a href="{{route('admintheloai.index')}}" class="btn btn-danger">Hủy</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input -->
            <script>
                $('.summernote').summernote({
                    placeholder: 'Nội dung',
                    height: 240,
                    minHeight: null,
                    maxHeight: null,
                    focus: false
                });
            </script>
        </div>
    </section>
@endsection
