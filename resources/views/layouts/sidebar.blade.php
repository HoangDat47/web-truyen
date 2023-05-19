<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                @if( Auth::user()->avatar == null)
                    <img src="https://s.congtys.com/avatar/22G521D956-default.jpg" width="48"
                    height="48" alt="User">
                @else
                    <img src="{{ asset('public/uploads/Avatar/' . Auth::user()->avatar) }}" width="48"
                    height="48" alt="User">
                @endif
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}</div>
                <div class="email">{{ Auth::user()->email }}</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a class="dropdown-item" href="{{route('adminuser.show', [Auth::user()->id])}}">
                            <i class="material-icons">person</i>Trang cá nhân</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{route('index.home')}}"><i class="material-icons">chrome_reader_mode</i>Manhua.vn</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                <i class="material-icons">input</i>Đăng xuất</a>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">Trang chủ</li>
                <li class="active">
                    <a href="{{ route('adminhome') }}">
                        <i class="material-icons">home</i>
                        <span>Trang chủ</span>
                    </a>
                </li>
                @role('admin')
                <li class="header">Quản lý người dùng</li>
                <li>
                    <a href="{{ route('adminuser.index') }}">
                        <i class="material-icons">account_box</i>
                        <span>Người dùng</span>
                    </a>
                </li>
                @endrole
                <li class="header">Quản lý truyện tranh</li>
                @role('admin')
                <li>
                    <a href="{{ route('admintruyen.index') }}">
                        <i class="material-icons">collections_bookmark</i>
                        <span>Tất cả truyện tranh</span>
                    </a>
                </li>
                @endrole
                <li>
                    <a href="{{ route('admintruyen.truyen_cua_toi', [Auth::user()->id]) }}">
                        <i class="material-icons">streetview</i>
                        <span>Truyện của tôi</span>
                    </a>
                </li>
                @role('admin')
                <li>
                    <a href="{{ route('admintheloai.index') }}">
                        <i class="material-icons">invert_colors</i>
                        <span>Thể loại</span>
                    </a>
                </li>
                @endrole
            </ul>
        </div>
        <!-- #Menu -->
    </aside>
    <!-- #END# Left Sidebar -->
</section>
