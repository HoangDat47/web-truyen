@extends('layouts.app')
@section('title', 'Thông tin người dùng')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <ol class="breadcrumb breadcrumb-bg-cyan">
                    <li><a href="{{ route('adminhome') }}">Trang chủ</a></li>
                    <li class="active">Trang cá nhân</li>
                </ol>
            </div>
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-3">
                    @include('adminbag.user.profile.profile_card')
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#profile_settings" aria-controls="settings"
                                            role="tab" data-toggle="tab">Thông tin người dùng</a></li>
                                    <li role="presentation"><a href="#change_password_settings" aria-controls="settings"
                                            role="tab" data-toggle="tab">Đổi mật khẩu</a></li>
                                </ul>
                                <div class="tab-content">
                                    @include('adminbag.user.profile.tab2')
                                    @include('adminbag.user.profile.tab3')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
