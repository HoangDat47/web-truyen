@extends('layouts.app')
@section('title')
    {{ $truyen->tentruyen }} Thêm chapter
@endsection
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <ol class="breadcrumb breadcrumb-bg-cyan">
                    <li><a href="{{ route('adminhome') }}">Trang chủ</a></li>
                    <li><a href="{{ route('admintruyen.index') }}">Truyện</a></li>
                    <li><a href="{{ route('adminchapter.show', [$truyen->id]) }}">{{ $truyen->tentruyen }}</a></li>
                    <li class="active">Thêm chapter</li>
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
                                    <form method="POST" action="{{ route('adminchapter.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <h2 class="card-inside-title">Tên truyện</h2>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="tentruyen" class="form-control" value="{{$truyen->tentruyen}}" readonly>
                                            </div>
                                        </div>
                                        <h2 class="card-inside-title">Tên chapter</h2>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="tenchapter" class="form-control" placeholder="Nhập tên chapter..."
                                                    id="slug" onkeyup="ChangeToSlug();">
                                            </div>
                                        </div>
                                        <h2 class="card-inside-title">Slug Chapter</h2>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="slug_chapter" class="form-control" id="convert_slug" readonly>
                                            </div>
                                        </div>
                                        <h2 class="card-inside-title">Nội dung chapter</h2>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="file" accept="image/gif, image/jpg, image/jpeg, image/png" multiple class="form-control-file" name="hinhanh[]">
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
                                            <a href="{{ route('adminchapter.show', [$truyen->id])}}" class="btn btn-danger">Hủy</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input -->
        </div>
    </section>
    <script type="text/javascript">
        var path = "{{ route('adminautocomplete') }}";
        $('input.typeahead').typeahead({
            source: function(query, process) {
                return $.get(path, {
                    query: query
                }, function(data) {
                    return process(data);
                });
            }
        });
    </script>
@endsection
