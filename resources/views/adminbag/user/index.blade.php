@extends('layouts.app')
@section('title', 'Tất cả người dùng')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <ol class="breadcrumb breadcrumb-bg-cyan">
                    <li><a href="{{ route('adminhome') }}">Trang chủ</a></li>
                    <li class="active">Người dùng</li>
                </ol>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <a href="{{ route('adminuser.create') }}"
                                class="btn btn-success btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">person_add</i>
                            </a>
                            <form action="{{ route('admintim_nguoi_dung') }}" method="post">
                                @csrf
                                <div class="header-dropdown m-r---100">
                                    <div class="pull-right">
                                        <div class="dataTables_filter"><label>Tìm người dùng:<input type="search"
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
                                            <th scope="col">Tên người dùng</th>
                                            <th class="col">Giới tính</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Vai trò</th>
                                            <th scope="col">Quyền</th>
                                            <th scope="col">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $key => $user)
                                            <tr>
                                                <th scope="row">{{ $key }}</th>
                                                <td>{{ $user->name }}</td>
                                                <td>
                                                    @if ($user->gioitinh == 0)
                                                        <span class="badge bg-orange">Nam</span>
                                                    @else
                                                        <span class="badge bg-pink">Nữ</span>
                                                    @endif
                                                </td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @foreach ($user->roles as $role)
                                                        {{ $role->name }}
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($role->permissions as $permission)
                                                        <span class="badge bg-warning text-dark">{{ $permission->name }}
                                                        </span>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <div class="flex-boy">
                                                        <a href="{{ route('adminuser.phanvaitro', [$user->id]) }}"
                                                            class="btn btn-info"><i
                                                                class="material-icons">perm_contact_calendar</i></a>
                                                        <a href="{{ route('adminuser.phanquyen', [$user->id]) }}"
                                                            class="btn btn-success"><i
                                                                class="material-icons">assignment_late</i></a>
                                                        <form action="{{ route('adminuser.destroy', [$user->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" onclick="return confirm('Xóa?')"
                                                                class="btn bg-pink waves-effect">
                                                                <i class="material-icons">delete_forever</i>
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
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>
@endsection
