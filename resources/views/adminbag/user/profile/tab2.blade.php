<div role="tabpanel" class="tab-pane fade in active" id="profile_settings">
    <form class="form-horizontal" method="POST" action="{{ route('adminuser.update', [Auth::user()->id]) }}"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            @if (Auth::user()->avatar == null)
                <label for="avatar" class="col-sm-2 control-label">Ảnh đại diện</label>
                <div class="col-sm-2">
                    <input type="file" style="color:transparent;" name="avatar" onchange="readURL(this);"
                        class="form-control-file">
                </div>
                <div class="col-sm-8">
                    <img id="blah" class="img-responsive thumbnail" src="http://placehold.it/180" alt="avatar"
                        width="100px" height="100px">
                </div>
            @else
                <label for="avatar" class="col-sm-2 control-label">Ảnh đại diện</label>
                <div class="col-sm-5">
                    <img class="img-responsive thumbnail"
                        src="{{ asset('public/uploads/Avatar/' . Auth::user()->avatar) }}" width="100px"
                        height="100px">
                </div>
                <div class="col-sm-2">
                    <input type="file" style="color:transparent;" name="avatar" onchange="readURL(this);"
                        class="form-control-file">
                </div>
                <div class="col-sm-3">
                    <img id="blah" class="img-responsive thumbnail" src="http://placehold.it/180" alt="avatar"
                        width="100px" height="100px">
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="NameSurname" class="col-sm-2 control-label">Tên người dùng</label>
            <div class="col-sm-10">
                <div class="form-line focused">
                    <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="gioitinh" class="col-sm-2 control-label">Giới tính</label>
            <div class="col-sm-4">
                <select class="form-control show-tick" name="gioitinh">
                    @if (Auth::user()->gioitinh == 0)
                        <option selected value="0">Nam</option>
                        <option value="1">Nữ</option>
                    @else
                        <option value="0">Nam</option>
                        <option selected value="1">Nữ</option>
                    @endif
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="Email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
                <div class="form-line focused">
                    <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="InputExperience" class="col-sm-2 control-label">Giới thiệu bản thân</label>
            <div class="col-sm-10">
                <div class="form-line">
                    <textarea class="form-control summernote" name="gioithieutoi">{{ Auth::user()->gioithieutoi }}</textarea>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-danger">Lưu</button>
            </div>
        </div>
    </form>
</div>
