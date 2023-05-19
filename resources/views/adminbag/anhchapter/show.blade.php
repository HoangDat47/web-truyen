<div class="card">
    <div class="header">
        <a href="{{route('adminanhchapter1.create', [$chapter->id])}}" class="btn btn-success btn-circle waves-effect waves-circle waves-float">
            <i class="material-icons">library_add</i>
        </a>
        <ul class="header-dropdown m-r--5">
            <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                    role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">more_vert</i>
                </a>
                <ul class="dropdown-menu pull-right">
                    <li><a href="javascript:void(0);">Another action</a></li>
                    <li><a href="javascript:void(0);">Something else here</a></li>
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
                        <th scope="col">Ảnh</th>
                        <th scope="col">Tên ảnh</th>
                        <th scope="col">ID chapter</th>
                        <th scope="col">Quản lý</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($anhchapter as $key => $value)
                        <tr>
                            <th scope="row">{{ $key }}</th>
                            <td><img src="{{ asset('public/uploads/Anh_chapter/' . $value->anhchapter) }}"
                                    height="100" width="100"></td>
                            <td>{{ $value->anhchapter }}</td>
                            <td>{{ $value->chapter_id }}</td>
                            <td>
                                <div class="flex-boy">
                                    <button type="button" class="btn btn-info waves-effect">
                                        <a href="{{ route('adminanhchapter.edit', [$value->id]) }}"><i
                                                class="material-icons">create</i></a>
                                    </button>
                                    <form action="{{ route('adminanhchapter.destroy', [$value->id]) }}"
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
    </div>
</div>
