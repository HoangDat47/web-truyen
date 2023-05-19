<div class="card profile-card">
    <div class="profile-header">&nbsp;</div>
    <div class="profile-body">
        <div class="image-area">
            @if (Auth::user()->avatar == null)
                <img src="https://s.congtys.com/avatar/22G521D956-default.jpg" width="100" height="100" alt="User">
            @else
                <img src="{{ asset('public/uploads/Avatar/' . Auth::user()->avatar) }}" width="100" height="100"
                    alt="User">
            @endif
        </div>
        <div class="content-area">
            <h3>{{ Auth::user()->name }}</h3>
            <p>{{ $user_role->name }}</p>
        </div>
    </div>
    <div class="profile-footer">
        <ul>
            @foreach ($data as $thongke)
                <li>
                    <span>Truyện đã đăng</span>
                    <span><b>{{ $thongke->truyen_da_dang }}</b></span>
                </li>
                <li>
                    <span>Tổng lượt xem</span>
                    <span><b>{{ $thongke->tong_views }}</b></span>
                </li>
            @endforeach
        </ul>
        {{-- <button class="btn btn-primary btn-lg waves-effect btn-block">FOLLOW</button> --}}
    </div>
</div>

<div class="card card-about-me">
    <div class="header">
        <h2>Về tôi</h2>
    </div>
    <div class="body">
        <ul>
            <li>
                <div class="title">
                    <i class="material-icons">notes</i>
                    Description
                </div>
                <div class="content">
                    {!! html_entity_decode(Auth::user()->gioithieutoi) !!}
                </div>
            </li>
        </ul>
    </div>
</div>
