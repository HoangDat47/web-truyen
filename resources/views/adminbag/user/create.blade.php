@extends('layouts.app')
@section('title', 'Thêm người dùng')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Thêm người dùng</h2>
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
                                    <form method="POST" action="{{ route('adminuser.store') }}">
                                        @csrf
                                        <h2 class="card-inside-title">Tên người dùng</h2>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="tennguoidung" class="form-control"
                                                    placeholder="Nhập tên người dùng...">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <h2 class="card-inside-title">Giới tính</h2>
                                            <select class="form-control show-tick" name="gioitinh">
                                                <option value="0">Nam</option>
                                                <option value="1">Nữ</option>
                                            </select>
                                        </div>
                                        <h2 class="card-inside-title">Email</h2>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="email" name="email" class="form-control">
                                            </div>
                                        </div>
                                        <h2 class="card-inside-title">Mật khẩu</h2>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="mật khẩu" class="form-control" placeholder="Nhập mật khẩu...">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-primary">Thêm</button>
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
