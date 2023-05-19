<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TheloaiRequest;
use App\Models\Theloai;

class TheloaiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:them the loai|sua the loai|xoa the loai', ['only' => ['index', 'show']]);
        $this->middleware('permission:them the loai', ['only' => ['create', 'store']]);
        $this->middleware('permission:sua the loai', ['only' => ['edit', 'update']]);
        $this->middleware('permission:xoa the loai', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Theloai::orderBy('tentheloai', 'asc')->paginate(10);
        return view('adminbag.theloai.index')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminbag.theloai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TheloaiRequest $request)
    {
        $data = new Theloai();
        $data->tentheloai = $request->tentheloai;
        $data->slug_theloai = $request->slug_theloai;
        $data->motatheloai = $request->motatheloai;
        $data->kichhoat = $request->kichhoat;
        $data->save();
        return redirect()->route('admintheloai.index')->with('status', 'Thêm thể loại thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Theloai::find($id);
        return view('adminbag.theloai.edit')->with(compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TheloaiRequest $request, $id)
    {
        $data = Theloai::find($id);
        $data->tentheloai = $request->tentheloai;
        $data->slug_theloai = $request->slug_theloai;
        $data->motatheloai = $request->motatheloai;
        $data->kichhoat = $request->kichhoat;
        $data->save();
        return redirect()->route('admintheloai.index')->with('status', 'Cập nhật thể loại thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Theloai::find($id);
        $data->delete();
        return redirect()->back()->with('status', 'Xóa thể loại thành công');
    }
}
