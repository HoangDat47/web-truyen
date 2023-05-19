<?php

namespace App\Http\Controllers;

use App\Http\Requests\PassWordChangeRequest;
use App\Http\Requests\UserRequest;
use App\Models\TheoDoi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.user.user_profile');
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
        $data->email = $request->email;
        if($request->gioithieutoi != null) {
            $data->gioithieutoi = $request->gioithieutoi;
        }
        $data->gioitinh = $request->gioitinh;
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
        //
    }

    public function theo_doi($id) {
        $truyen_theo_doi = TheoDoi::with('truyen')->with('chapter_vua_them')->where('users_id', $id)->paginate(20);
        return view('pages.user.theo_doi')->with(compact('truyen_theo_doi'));
    }

    public function doi_mat_khau ($id) {
        return view('pages.user.doi_mk');
    }

    public function post_doi_mat_khau(PassWordChangeRequest $request) {
        User::find(Auth::user()->id)->update(['password'=> Hash::make($request->NewPassword)]);
        return redirect()->back()->with('status', 'Đổi mật khẩu thành công');
    }
}
