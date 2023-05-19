<div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
    <form class="form-horizontal" action="{{route('adminuser.doimatkhau_post')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="OldPassword" class="col-sm-3 control-label">Mật khẩu cũ</label>
            <div class="col-sm-9">
                <div class="form-line">
                    <input type="password" class="form-control" id="OldPassword"
                        name="OldPassword" placeholder="Mật khẩu cũ" required="">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="NewPassword" class="col-sm-3 control-label">Mật khẩu mới</label>
            <div class="col-sm-9">
                <div class="form-line">
                    <input type="password" class="form-control" id="NewPassword"
                        name="NewPassword" placeholder="Mật khẩu mới" required="">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="NewPasswordConfirm" class="col-sm-3 control-label">Mật khẩu mới (xác nhận)</label>
            <div class="col-sm-9">
                <div class="form-line">
                    <input type="password" class="form-control"
                        id="NewPasswordConfirm" name="NewPasswordConfirm"
                        placeholder="Mật khẩu mới (xác nhận)" required="">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" onclick="return confirm('Lưu?')" class="btn btn-danger">Lưu</button>
            </div>
        </div>
    </form>
</div>