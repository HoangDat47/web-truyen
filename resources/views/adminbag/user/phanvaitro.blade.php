@extends('layouts.app')
@section('title', 'Phân vai trò người dùng')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <ol class="breadcrumb breadcrumb-bg-cyan">
                    <li><a href="{{ route('adminhome') }}">Trang chủ</a></li>
                    <li><a href="{{ route('adminuser.index') }}">Người dùng</a></li>
                    <li class="active">Vai trò</li>
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
                                    <form method="POST" action="{{ route('adminuser.phanvaitropost', $user->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <h2 class="card-inside-title">Tên người dùng</h2>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="tennguoidung" class="form-control" readonly
                                                    value="{{ $user->name }}">
                                            </div>
                                        </div>
                                        @if (isset($name_roles))
                                            <h2 class="card-inside-title">Vai trò</h2>
                                        @endif
                                        <div class="row clearfix">
                                            @foreach ($role as $key => $tl)
                                                @if (isset($all_column_roles))
                                                    <div class="col-sm-3">
                                                        <input class="form-check-input" type="radio" name="role"
                                                            {{ $tl->id == $all_column_roles->id ? 'checked' : '' }}
                                                            id="{{ $tl->id }}" value="{{ $tl->name }}">
                                                        <label for="{{ $tl->id }}"
                                                            class="form-check-label">{{ $tl->name }}</label>
                                                    </div>
                                                @else
                                                    <div class="col-sm-2">
                                                        <input class="form-check-input" type="radio" name="role"
                                                            id="{{ $tl->id }}" value="{{ $tl->name }}">
                                                        <label for="{{ $tl->id }}"
                                                            class="form-check-label">{{ $tl->name }}</label>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-primary">Phân vai trò</button>
                                            <a href="{{ route('adminuser.index') }}" class="btn btn-danger">Hủy</a>
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
