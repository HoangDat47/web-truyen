@extends('layouts.app')
@section('title')
    {{ $truyen->tentruyen }} Sửa {{ $chapter->tenchapter }}
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <ol class="breadcrumb breadcrumb-bg-cyan">
                    <li><a href="{{ route('adminhome') }}">Trang chủ</a></li>
                    <li><a href="{{ route('admintruyen.index') }}">Truyện</a></li>
                    <li><a href="{{ route('adminchapter.show', [$truyen->id]) }}">{{ $truyen->tentruyen }}</a></li>
                    <li class="active">{{ $chapter->tenchapter }}</li>
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
                                    <form method="POST" action="{{ route('adminchapter.update', [$chapter->id]) }}">
                                        @method('PUT')
                                        @csrf
                                        <h2 class="card-inside-title">Tên chapter</h2>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="tenchapter" class="form-control"
                                                    placeholder="Nhập tên truyện..." id="slug"
                                                    onkeyup="ChangeToSlug();" value="{{ $chapter->tenchapter }}">
                                            </div>
                                        </div>
                                        <h2 class="card-inside-title">Slug chapter</h2>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="slug_chapter" class="form-control"
                                                    id="convert_slug" value="{{ $chapter->slug_chapter }}" readonly>
                                            </div>
                                        </div>
                                        <h2 class="card-inside-title">Tên truyện</h2>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input autocomplete="off" type="text" name="truyen_id" class="typeahead form-control"
                                                 value="{{ $truyen->tentruyen }}" readonly>
                                            </div>
                                        </div>
                                        <h2 class="card-inside-title">Kích hoạt</h2>
                                        <div class="col-sm-6">
                                            <select class="form-control show-tick" name="kichhoat">
                                                @if ($chapter->kichhoat == 0)
                                                    <option selected value="0">Kích hoạt</option>
                                                    <option value="1">Không kích hoạt</option>
                                                @else
                                                    <option value="0">Kích hoạt</option>
                                                    <option selected value="1">Không kích hoạt</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                                            <a href="{{ route('adminchapter.show', [$truyen->id])}}" class="btn btn-danger">Hủy</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('adminbag.anhchapter.show')
                </div>
            </div>
            <!-- #END# Input -->
        </div>
    </section>
@endsection
