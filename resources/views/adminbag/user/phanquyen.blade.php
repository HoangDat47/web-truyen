@extends('layouts.app')
@section('title', 'Phân quyền người dùng')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <ol class="breadcrumb breadcrumb-bg-cyan">
                    <li><a href="{{ route('adminhome') }}">Trang chủ</a></li>
                    <li><a href="{{ route('adminuser.index') }}">Người dùng</a></li>
                    <li class="active">Quyền</li>
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
                                    <form method="POST" action="{{ route('adminuser.phanquyenpost', $user->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <h2 class="card-inside-title">Tên người dùng</h2>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="tennguoidung" class="form-control" readonly
                                                    value="{{ $user->name }}">
                                            </div>
                                        </div>
                                        <h2 class="card-inside-title">Vai trò hiện tại : {{$name_roles}}</h2>
                                        <h2 class="card-inside-title">Quyền</h2>
                                        <div class="row clearfix">
                                            @foreach ($permission as $key => $tl)
                                                <div class="col-sm-3 col-xs-12">
                                                    <input class="form-check-input" type="checkbox" id="{{$tl->id}}" name="permission[]"
                                                        value="{{ $tl->id }}" class="chk-col-red"
                                                        {{ $user->hasPermissionTo($tl->name) ? 'checked' : '' }}>
                                                    <label for="{{$tl->id}}" class="form-check-label">{{$tl->name}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="col-sm-6">
                                            <button type="submit" name="capquyen" class="btn btn-primary">Cấp quyền cho người dùng</button>
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
                            @if (session('status'))
                                <div class="alert bg-green alert-dismissible" role="alert">
                                    {{ session('status1') }}
                                </div>
                            @endif
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <form method="POST" action="{{ route('adminuser.themquyen') }}">
                                        @csrf
                                        <h2 class="card-inside-title">Tên quyền</h2>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="tenquyen" class="form-control" 
                                                placeholder="Nhập tên quyền...">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <button type="submit" name="themquyen" class="btn btn-primary">Thêm quyền</button>
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
