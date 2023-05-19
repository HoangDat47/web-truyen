@extends('layouts.app')
@section('title')
    Sửa truyện {{ $data->tentruyen }}
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <ol class="breadcrumb breadcrumb-bg-cyan">
                    <li><a href="{{ route('adminhome') }}">Trang chủ</a></li>
                    <li><a href="{{ route('admintruyen.index') }}">Truyện</a></li>
                    <li class="active">Sửa truyện | {{ $data->tentruyen }}</li>
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
                                    <form method="POST" action="{{ route('admintruyen.update', [$data->id]) }}"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <h2 class="card-inside-title">Tên truyện</h2>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="tentruyen" class="form-control"
                                                    placeholder="Nhập tên truyện..." id="slug"
                                                    onkeyup="ChangeToSlug();" value="{{ $data->tentruyen }}">
                                            </div>
                                        </div>
                                        <h2 class="card-inside-title">Slug truyện</h2>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="slug_truyen" class="form-control"
                                                    id="convert_slug" value="{{ $data->slug_truyen }}" readonly>
                                            </div>
                                        </div>
                                        <h2 class="card-inside-title">Hình ảnh truyện</h2>
                                        <div class="form-group">
                                            <div class="col-sm-4">
                                                <img class="img-responsive thumbnail" src="{{ asset('public/uploads/Anh_truyen/' . $data->anhtruyen) }}"
                                                width="152px" height="214px">
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="file" accept="image/gif, image/jpg, image/jpeg, image/png" style="color:transparent;" name="hinhanh" onchange="readURL(this);" class="form-control-file">
                                            </div>
                                            <div class="col-sm-6">
                                                <img id="blah" class="img-responsive thumbnail" src="http://placehold.it/180" alt="Ảnh truyện" width="152px" height="214px">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <h2 class="card-inside-title">Tác giả</h2>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="tacgia" class="form-control"
                                                        placeholder="Nhập tên tác giả..." value="{{ $data->tacgia }}">
                                                </div>
                                            </div>
                                        </div>
                                        <h2 class="card-inside-title">Nội dung truyện</h2>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea type="text" name="noidungtruyen" class="form-control summernote">
                                                    {{ $data->noidungtruyen }}
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <h2 class="card-inside-title">Tình trạng</h2>
                                            <select class="form-control show-tick" name="tinhtrang">
                                                @if ($data->tinhtrang == 0)
                                                    <option selected value="0">Đang tiến hành</option>
                                                    <option value="1">Hoàn thành</option>
                                                @else
                                                    <option value="0">Đang tiến hành</option>
                                                    <option selected value="1">Hoàn thành</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <h2 class="card-inside-title">Kích hoạt</h2>
                                            <select class="form-control show-tick" name="kichhoat">
                                                @if ($data->kichhoat == 0)
                                                    <option selected value="0">Kích hoạt</option>
                                                    <option value="1">Không kích hoạt</option>
                                                @else
                                                    <option value="0">Kích hoạt</option>
                                                    <option selected value="1">Không kích hoạt</option>
                                                @endif
                                            </select>
                                        </div>
                                        <h2 class="card-inside-title">Thể loại</h2>
                                        <div class="row clearfix">
                                            @foreach ($theloai as $tl)
                                                <div class="col-sm-2 col-xs-3">
                                                    <div class="form-check form-check-inline">
                                                        @if ($data->theloai->contains($tl->id))
                                                            <input class="form-check-input" type="checkbox" name="theloai[]"
                                                                value="{{ $tl->id }}" checked>
                                                        @else
                                                            <input class="form-check-input" type="checkbox" name="theloai[]"
                                                                value="{{ $tl->id }}">
                                                        @endif
                                                        <label for="{{ $tl->id }}"
                                                            class="form-check-label">{{ $tl->tentheloai }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                                            <a href="{{ route('admintruyen.index') }}" class="btn btn-danger">Hủy</a>
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
