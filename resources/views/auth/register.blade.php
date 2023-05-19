@extends('loginlayout')
@section('title', 'Đăng ký')
@section('content')
    <div class="signup-box">
        <div class="login-box">
            <div class="logo">
                <a href="javascript:void(0);">Đăng<b> ký</b></a>
            </div>
            <div class="card">
                <div class="body">
                    <form method="POST" id="sign_up" action="{{ route('register') }}">
                        @csrf
                        <div class="msg">Chào mừng bạn gia nhập Manhua.vn</div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus
                                    placeholder="Tên tài khoản">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">email</i>
                            </span>
                            <div class="form-line">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">lock</i>
                            </span>
                            <div class="form-line">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password" placeholder="Mật khẩu">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">lock</i>
                            </span>
                            <div class="form-line">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="Nhập lại mật khẩu">
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">accessibility</i>
                            </span>
                            <div class="form">
                                <select class="form-control show-tick" name="gioitinh">
                                    <option value="0">Nam</option>
                                    <option value="1">Nữ</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">Đăng ký</button>

                        <div class="m-t-25 m-b--5 align-center">
                            <a href="{{ route('login') }}">Đã có tài khoản?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
