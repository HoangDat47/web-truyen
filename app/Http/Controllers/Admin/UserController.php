<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PassWordChangeRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:them nguoi dung|xem nguoi dung|phan vai tro| phan quyen| them quyen| sua profile', ['only' => ['index', 'show']]);
        $this->middleware('permission:them nguoi dung', ['only' => ['create', 'store']]);
        $this->middleware('permission:phan vai tro', ['only' => ['phanvaitro', 'phanvaitropost']]);
        $this->middleware('permission:phan quyen', ['only' => ['phanquyen', 'phanquyenpost']]);
        $this->middleware('permission:them quyen', ['only' => ['themquyen']]);
        $this->middleware('permission:sua profile', ['only' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::with('roles', 'permissions')->paginate(10);
        $role = Role::with('permissions')->get();
        return view('adminbag.user.index')->with(compact('users', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminbag.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User();
        $user->name = $request->tennguoidung;
        $user->gioitinh = $request->gioitinh;
        $user->email = $request->email;
        $user->password = Hash::make($request->matkhau);
        $user->save();
        return redirect()->back()->with('status', 'Thêm người dùng thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_role = User::find($id)->roles->first();
        $data = DB::select('call truyentranh_count(?)', [Auth::user()->id]);
        return view('adminbag.user.profile')->with(compact('user_role', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $data = User::find($id);
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = current(explode('.', $file->getClientOriginalName())) . '.' . $extension;
            $file->move('public/uploads/Avatar', $filename);
            $data->avatar = $filename;
        }
        $data->name = $request->name;
        $data->gioitinh = $request->gioitinh;
        $data->email = $request->email;
        if($request->gioithieutoi != null) {
            $data->gioithieutoi = $request->gioithieutoi;
        }
        $data->save();
        return redirect()->back()->with('status', 'Cập nhật thông tin thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $role_name = $user->roles->first()->name;
        $user->removeRole($role_name);
        $user->delete();
        return redirect()->back()->with('status', 'Xóa người dùng thành công');
    }

    public function phanvaitro($id)
    {
        $user = User::find($id);
        $role = Role::orderBy('id', 'DESC')->get();
        $all_column_roles = $user->roles->first();
        return view('adminbag.user.phanvaitro')->with(compact('user', 'role', 'all_column_roles'));
    }

    public function phanquyen($id)
    {
        $user = User::find($id);
        $permission = Permission::orderBy('id', 'DESC')->get();
        $name_roles = $user->roles->first()->name;
        return view('adminbag.user.phanquyen')->with(compact('user', 'name_roles', 'permission'));
    }

    public function phanvaitropost(Request $request, $id)
    {
        $user = User::find($id);
        $user->syncRoles($request->role);
        // $role_id = $user->roles->first()->id;
        return redirect()->route('adminuser.index')->with('status', 'Thêm vai trò cho người dùng thành công');
    }

    public function phanquyenpost(Request $request, $id)
    {
        $user = User::find($id);
        $role_id = $user->roles->first()->id;
        $role = Role::find($role_id); //tim quyen = role_id bang rhp
        $role->syncPermissions($request->permission);
        return redirect()->route('adminuser.index')->with('status', 'Thêm quyền cho người dùng thành công');
    }

    public function themquyen(Request $request)
    {
        $permission = new Permission();
        $permission->name = $request->tenquyen;
        $permission->save();
        return redirect()->back()->with('status1', 'Thêm quyền mới thành công');
    }

    public function doimatkhau_post(PassWordChangeRequest $request) {
        User::find(Auth::user()->id)->update(['password'=> Hash::make($request->NewPassword)]);
        return redirect()->back()->with('status', 'Đổi mật khẩu thành công');
    }
}
