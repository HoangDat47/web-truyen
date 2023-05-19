@extends('layouts.app')
@section('title')
    {{$tenchapter->truyen->tentruyen}}
    {{$tenchapter->tenchapter}}
    Sửa ảnh
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Sửa ảnh cho {{$tenchapter->tenchapter}}
                    của truyện {{$tenchapter->truyen->tentruyen}}</h2>
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
                                    <form method="POST" action="{{ route('adminanhchapter.update',[$chapter->id])}}" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <h2 class="card-inside-title">Tên truyện</h2>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="tentruyen" class="form-control"
                                                value="{{$tenchapter->truyen->tentruyen}}" readonly>
                                            </div>
                                        </div>
                                        <h2 class="card-inside-title">Chapter</h2>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="chapter" class="form-control"
                                                value="{{$tenchapter->tenchapter}}" readonly>
                                            </div>
                                        </div>
                                        <h2 class="card-inside-title">ID Chapter</h2>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="chapter_id" class="form-control"
                                                value="{{$chapter->id}}" readonly>
                                            </div>
                                        </div>
                                        <h2 class="card-inside-title">Hình ảnh truyện</h2>
                                        <div class="form-group">
                                            <div class="form">
                                                <input accept="image/gif, image/jpg, image/jpeg, image/png" type="file" name="hinhanh" class="form-control-file"
                                                    id="convert_slug" value="">
                                                    <img src="{{asset('public/uploads/Anh_chapter/'.$chapter->anhchapter)}}"
                                                     height="100" width="100">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                                            {{-- <a href="{{ route('adminchapter.edit', [$chapter->id]) }}" class="btn btn-danger">Hủy</a> --}}
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
@endsection
