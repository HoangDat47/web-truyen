<nav class="navbar navbar-expand-lg nav-bg">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ Route('index.home') }}">
            <img src="https://ik.imagekit.io/pk330050/Manga_Holder/img/Logo_rdpiz3bCI.jpg?ik-sdk-version=javascript-1.4.3&updatedAt=1653463318218"
                alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex ms-auto search-bar" action="{{ route('index.tim_truyen') }}" method="post">
                @csrf
                <div class="input-group">
                    <input type="text" name="txtSearch" class="form-control" style="border-radius: 0%" placeholder="Tìm kiếm...">
                    <div class="input-group-btn">
                        <button class="btn btn-default" style="border: none; border-radius: 0%;" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </div>
            </form>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ Route('index.home') }}">Trang chủ</a>
                </li>
                <li class="nav-item navbar-expand-md dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                        Thể loại
                    </a>
                    <div class="dropdown-menu drd-custom dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <div class="row row-cols-2 row-cols-sm-2 row-cols-md-4 row-cols-lg-3 cleafix">
                            @foreach ($theloai as $key => $value)
                                <div>
                                    <a class="dropdown-item"
                                        href="{{ route('index.theloai', [$value->slug_theloai]) }}">{{ $value->tentheloai }}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ Route('index.lich_su_doc_truyen') }}">Lịch sử đọc truyện</a>
                </li>
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link custom-nav-a" href="{{ route('login') }}">{{ __('Đăng nhập') }}</a>
                        </li>
                    @endif
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link custom-nav-a" href="{{ route('register') }}">{{ __('Đăng ký') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.theo_doi', [Auth::user()->id]) }}">Truyện theo dõi</a>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link" style="border-left: 2px solid white; height: 100%;"></span>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1"
                            data-bs-toggle="dropdown" aria-expanded="false"  style="color: white">
                            @if (Auth::user()->avatar == null)
                                <img src="https://s.congtys.com/avatar/22G521D956-default.jpg" alt="mdo" width="32"
                                    height="32" class="rounded-circle">
                            @else
                                <img src="{{ asset('public/uploads/Avatar/' . Auth::user()->avatar) }}" alt="mdo" width="32" height="32"
                                    class="rounded-circle">
                            @endif
                            <span class="username" style="color: white">
                                {{ Auth::user()->name }}
                            </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser1" style="margin-right: 15px">
                            <li><a class="dropdown-item" id="user-dropdown" href="{{route('user.show' , [Auth::user()->id])}}">
                                <i class="fa fa-user"></i> Trang cá nhân</a></li>
                            <li><a class="dropdown-item" id="user-dropdown" href="{{ route('user.theo_doi', [Auth::user()->id]) }}">
                                <i class="fa fa-book"></i> Truyện theo dõi</a></li>
                            @role('admin')
                                <li><a class="dropdown-item" id="user-dropdown" href="{{ route('adminhome') }}">
                                    <i class="fa-solid fa-lock"></i> Trang quản trị</a></li>
                            @endrole
                            @role('nguoi_dang_truyen')
                                <li><a class="dropdown-item" id="user-dropdown" href="{{ route('adminhome') }}">
                                    <i class="fa-solid fa-book-user"></i> Quản lý truyện</a></li>
                            @endrole
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" id="user-dropdown" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i> Đăng xuất
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
