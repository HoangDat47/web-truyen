<div class="col-md-3 col-sm-4">
    <section class="user-sidebar clearfix">
        <div class="userinfo clearfix">
            <figure>
                @if (Auth::user()->avatar == null)
                    <img alt="" src="https://s.congtys.com/avatar/22G521D956-default.jpg" class="avatar user-img">
                @else
                    <img alt="" src="{{ asset('public/uploads/Avatar/' . Auth::user()->avatar) }}"
                        class="avatar user-img">
                @endif
                <figcaption>
                    <div class="title">Tài khoản của</div>
                    <div class="user-name">
                        {{ Auth::user()->name }}
                    </div>
                </figcaption>
            </figure>
        </div>
    </section>
    <nav class="user-sidelink clearfix">
        <ul>
            <li class="hvr-sweep-to-right"><a href="{{ route('user.show', [Auth::user()->id]) }}"><i
                        class="fa fa-info-circle"></i> Thông tin tài khoản</a></li>
            <li class="hvr-sweep-to-right"><a href="{{ route('user.theo_doi', [Auth::user()->id]) }}"><i
                        class="fa fa-book"></i> Truyện theo dõi</a></li>
            <li class="hvr-sweep-to-right"><a href="{{ route('user.doi_mat_khau', [Auth::user()->id]) }}"><i class="fa fa-lock"></i> Đổi mật khẩu</a></li>
            <li class="hvr-sweep-to-right">
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i> Đăng xuất
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
</div>
