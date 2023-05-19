@extends('layouts.app')
@section('title')
    {{ $truyen->tentruyen }} Tất cả chapter
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <ol class="breadcrumb breadcrumb-bg-cyan">
                    <li><a href="{{ route('adminhome') }}">Trang chủ</a></li>
                    <li><a href="{{ route('admintruyen.index') }}">Truyện</a></li>
                    <li class="active">{{ $truyen->tentruyen }}</li>
                </ol>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <a href="{{ route('adminchapter1.create', [$truyen->id]) }}"
                                class="btn btn-success btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">library_add</i>
                            </a>
                            <form action="{{ route('admintim_chapter', [$truyen->id]) }}" method="post">
                                @csrf
                                <div class="header-dropdown m-r---100">
                                    <div class="pull-right">
                                        <div class="dataTables_filter"><label>Tìm chapter:<input type="search"
                                                    class="form-control input-sm" name="txtSearch"></label></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="body">
                            @include('error.error')
                            <div class="table-responsive">
                                <table class="table  table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Tên chapter</th>
                                            <th scope="col">Slug chapter</th>
                                            <th scope="col">Kích hoạt</th>
                                            <th scope="col">Quản lý</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($chapter as $key => $value)
                                            <tr>
                                                <th scope="row">{{ $key }}</th>
                                                <td>{{ $value->tenchapter }}</td>
                                                <td>{{ $value->slug_chapter }}</td>
                                                {{-- <td>{{ $value->truyen->tentruyen }}</td> --}}
                                                <td>
                                                    @if ($value->kichhoat == 0)
                                                        <span class="badge bg-green">Đã kích hoạt</span>
                                                    @else
                                                        <span class="badge bg-red">Chưa kích hoạt</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="flex-boy">
                                                        <button type="button" class="btn btn-info waves-effect">
                                                            <a href="{{ route('adminchapter.edit', [$value->id]) }}"><i
                                                                    class="material-icons">create</i></a>
                                                        </button>
                                                        <form action="{{ route('adminchapter.destroy', [$value->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" onclick="return confirm('Xóa?')"
                                                                class="btn bg-pink waves-effect">
                                                                <i class="material-icons">delete_sweep</i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                    {{-- <a href="{{ route('adminanhchapter1.create', [$value->id]) }}"
                                                        class="btn btn-success">Thêm
                                                        ảnh</a>
                                                    <a href="{{ route('adminanhchapter.show', [$value->id]) }}"
                                                        class="btn btn-warning">Show ảnh</a> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-center">
                                {{ $chapter->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>
@endsection
