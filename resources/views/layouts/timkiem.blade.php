@extends('layouts.app')
@section('title', 'Tìm kiếm')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <ol class="breadcrumb breadcrumb-bg-cyan">
                    <li><a href="{{ route('adminhome') }}">Trang chủ</a></li>
                    <li class="active">Tìm kiếm</li>
                </ol>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <a href="{{route('admintruyen.create')}}" class="btn btn-success btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">library_add</i>
                            </a>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        {{-- <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li> --}}
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            @include('error.error')
                            <div class="table-responsive">
                                <table class="table  table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Tên truyện</th>
                                            <th scope="col">Hình ảnh</th>
                                            <th scope="col">Chapter</th>
                                            <th scope="col">Tác giả</th>
                                            <th scope="col">Thể loại</th>
                                            <th scope="col">Tình trạng</th>
                                            <th scope="col">Kích hoạt</th>
                                            <th scope="col">Quản lý</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($truyen as $key => $truyen)
                                            <tr>
                                                <th scope="row">{{ $key }}</th>
                                                <td>{{ $truyen->tentruyen }}</td>
                                                <td><img src="{{ asset('public/uploads/Anh_truyen/' . $truyen->anhtruyen) }}"
                                                        height="40" width="30"></td>
                                                <td>{{$truyen->chapter->count()}} - 
                                                    <button type="button" class="btn bg-teal waves-effect">
                                                        <a href="{{ route('adminchapter.show', [$truyen->id])}}">
                                                            <i class="material-icons">view_list</i></a>
                                                    </button>
                                                </td>
                                                <td>{{ $truyen->tacgia }}</td>
                                                <td>
                                                    @foreach ($truyen->theloai as $theloai)
                                                        <span class="badge bg-primary text-white">{{ $theloai->tentheloai }}</span>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @if ($truyen->tinhtrang == 0)
                                                        <span class="badge bg-green">Đang tiến hành</span>
                                                    @else
                                                        <span class="badge bg-red">Đã hoàn thành</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($truyen->kichhoat == 0)
                                                        <span class="badge bg-green">Đã kích hoạt</span>
                                                    @else
                                                        <span class="badge bg-red">Chưa kích hoạt</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="flex-boy">
                                                        <button type="button" class="btn btn-info waves-effect">
                                                            <a href="{{ route('admintruyen.edit', [$truyen->id]) }}"><i
                                                                    class="material-icons">create</i></a>
                                                        </button>
                                                        <form action="{{ route('admintruyen.destroy', [$truyen->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" onclick="return confirm('Xóa?')"
                                                                class="btn bg-pink waves-effect">
                                                                <i class="material-icons">delete_sweep</i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-center">
                                {{-- {{ $truyen->links() }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- @include('adminbag.truyen.create') --}}
            <!-- #END# Basic Examples -->
        </div>
    </section>
@endsection
