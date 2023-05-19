@extends('layouts.app')
@section('title', 'Trang chủ')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <div class="icon bg-red">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">Truyện</div>
                            <div class="number count-to" data-from="0" data-to="{{$tong_truyen}}" data-speed="15"
                                data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <div class="icon bg-cyan">
                            <i class="material-icons">face</i>
                        </div>
                        <div class="content">
                            <div class="text">Người dùng</div>
                            <div class="number count-to" data-from="0" data-to="{{$tong_nguoi_dung}}" data-speed="1000"
                                data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <div class="icon bg-purple">
                            <i class="material-icons">bookmark</i>
                        </div>
                        <div class="content">
                            <div class="text">Lượt theo dõi</div>
                            <div class="number count-to" data-from="0" data-to="{{$tong_luot_theo_doi}}" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <div class="icon bg-pink">
                            <i class="material-icons">email</i>
                        </div>
                        <div class="content">
                            <div class="text">Comment</div>
                            <div class="number count-to" data-from="0" data-to="111" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="info-box">
                        <div class="icon bg-orange">
                            <i class="material-icons">class</i>
                        </div>
                        <div class="content">
                            <div class="text">Thể loại</div>
                            <div class="number count-to" data-from="0" data-to="{{$tong_the_loai}}" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body bg-teal">
                            <div class="font-bold m-b--35">Người dùng: {{ Auth::user()->name }}</div>
                            <ul class="dashboard-stat-list">
                                @foreach ($data as $thongke)
                                    <li>
                                        Truyện đã đăng
                                        <span class="pull-right"><b>{{ $thongke->truyen_da_dang }}</b>
                                            <small>Truyện</small></span>
                                    </li>
                                    <li>
                                        Tổng lượt xem
                                        <span class="pull-right"><b>{{ $thongke->tong_views }}</b> <small>Lượt
                                                xem</small></span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="header">
                            <h2>Nhân viên của tháng</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Avatar</th>
                                            <th>Tên</th>
                                            <th>Truyện đã đăng</th>
                                            <th>Lượt xem</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bxh_nhanvien as $key => $bxh_nv)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                    @if ($bxh_nv->avatar == null)
                                                        <img src="https://s.congtys.com/avatar/22G521D956-default.jpg"
                                                            width="30" height="30" alt="User" />
                                                    @else
                                                        <img src="{{ asset('public/uploads/Avatar/' . $bxh_nv->avatar) }}"
                                                            width="30" height="30" alt="User">
                                                    @endif
                                                </td>
                                                <td>{{ $bxh_nv->name }}</td>
                                                <td>{{ $bxh_nv->truyen_da_dang }}</td>
                                                <td>{{ $bxh_nv->tong_views }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
