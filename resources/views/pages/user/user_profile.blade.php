@extends('pages.profile')
@section('content1')
    <div class="user-page clearfix"
        onkeypress="javascript:return WebForm_FireDefaultButton(event, 'ctl00_mainContent_btnUpdate')">
        <h1 class="postname">
            Thông tin tài khoản
        </h1>
        <div class="account-info clearfix">
            @include('error.error2')
            <div class="account-form clearfix">
                <form class="form-horizontal" method="POST" action="{{ route('user.update', [Auth::user()->id]) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label class="control-label">Tên người dùng</label>
                                <input type="text" name="name" value="{{ Auth::user()->name }}" maxlength="100"
                                    tabindex="10" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Địa chỉ email</label>
                                <input type="text" name="email" value="{{ Auth::user()->email }}" tabindex="10"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="gioitinh" class="control-label">Giới tính</label>
                                <select name="gioitinh" class="form-control">
                                    @if (Auth::user()->gioitinh == 0)
                                        <option selected value="0">Nam</option>
                                        <option value="1">Nữ</option>
                                    @else
                                        <option value="0">Nam</option>
                                        <option selected value="1">Nữ</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Giới thiệu tôi</label>
                                <textarea class="form-control summernote" name="gioithieutoi">{{ Auth::user()->gioithieutoi }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div id="ctl00_mainContent_divAvatar" class="form-group avatar-control">
                                <label class="control-label">Avatar</label>
                                <div class="forminput">
                                    <img alt=""
                                        src="{{ asset('public/uploads/Avatar/' . Auth::user()->avatar) }}"
                                        class="avatar user-img" width="90px" height="90px">
                                    <label for="ctl00_mainContent_fileUploader" class="btn btn-danger">Upload ảnh</label>
                                    <input type="file" name="avatar" id="ctl00_mainContent_fileUploader" class="hidden"
                                        accept=".jpg,.jpeg,.gif,.png" onchange="showImage(event)">
                                    <script>
                                        var showImage = function(event) {
                                            var img = document.getElementsByClassName("avatar user-img");
                                            if (img.length > 1) {
                                                img[1].src = URL.createObjectURL(event.target.files[0]);
                                                img[1].onload = function() {
                                                    URL.revokeObjectURL(img[1].src)
                                                }
                                            }
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="button-wrap">
                        <input type="submit" name="ctl00$mainContent$btnUpdate" value="Cập nhật"
                            onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$mainContent$btnUpdate&quot;, &quot;&quot;, true, &quot;profile&quot;, &quot;&quot;, false, false))"
                            id="ctl00_mainContent_btnUpdate" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
