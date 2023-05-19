@extends('layouts.app')
@section('title', 'Tất cả thể loại')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="block-header">
                    <ol class="breadcrumb breadcrumb-bg-cyan">
                        <li><a href="{{ route('adminhome') }}">Trang chủ</a></li>
                        <li class="active">Thể loại</li>
                    </ol>
                </div>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <a href="{{route('admintheloai.create')}}" class="btn btn-success btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">library_add</i>
                            </a>
                            <form action="{{ route('admintim_the_loai') }}" method="post">
                                @csrf
                                <div class="header-dropdown m-r---100">
                                    <div class="pull-right">
                                        <div class="dataTables_filter"><label>Tìm thể loại:<input type="search"
                                                    class="form-control input-sm" name="txtSearch"></label></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table  table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Tên thể loại</th>
                                            <th scope="col">Kích hoạt</th>
                                            <th scope="col">Truyện</th>
                                            <th scope="col">Quản lý</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $theloai)
                                            <tr>
                                                <th scope="row">{{ $key }}</th>
                                                <td>{{ $theloai->tentheloai }}</td>
                                                <td>
                                                    @if ($theloai->kichhoat == 0)
                                                        <span class="badge bg-green">Kích hoạt</span>
                                                    @else
                                                        <span class="badge bg-red">Không kích hoạt</span>
                                                    @endif
                                                </td>
                                                <td><span class="badge bg-green">{{$theloai->theloai_co_truyen->count()}}</span></td>
                                                <td>
                                                    <div class="flex-boy">
                                                        <button type="button" class="btn btn-info waves-effect">
                                                            <a href="{{ route('admintheloai.edit', [$theloai->id]) }}"><i
                                                                    class="material-icons">create</i></a>
                                                        </button>
                                                        <form action="{{ route('admintheloai.destroy', [$theloai->id]) }}"
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
                                {{$data->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>
@endsection
