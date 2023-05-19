<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TruyenRequest;
use App\Models\Chapter;
use App\Models\Truyen;
use App\Models\Theloai;
use App\Models\TruyentheoTheloai;
use Illuminate\Support\Facades\Auth;

class TruyenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:them truyen|sua truyen|xoa truyen', ['only' => ['index', 'show']]);
        $this->middleware('permission:them truyen', ['only' => ['create', 'store']]);
        $this->middleware('permission:sua truyen', ['only' => ['edit', 'update']]);
        $this->middleware('permission:xoa truyen', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Truyen::with('theloai')->orderBy('chapter_sort', 'DESC')->paginate(10);
        return view('adminbag.truyen.index')->with(compact('data'));
    }

    public function truyen_cua_toi($id) {
        $data = Truyen::with('theloai')->where('users_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(10);
        return view('adminbag.truyen.truyen_cua_toi')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $theloai = Theloai::all()->sortBy('tentheloai');
        return view('adminbag.truyen.create', compact('theloai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TruyenRequest $request)
    {
        $data = new Truyen();
        $data->tentruyen = $request->tentruyen;
        $data->slug_truyen = $request->slug_truyen;
        $data->noidungtruyen = $request->noidungtruyen;
        $data->tacgia = $request->tacgia;
        $data->kichhoat = $request->tinhtrang;
        $data->kichhoat = $request->kichhoat;
        $data->users_id = Auth::user()->id;
        if ($request->hasFile('hinhanh')) {
            $file = $request->file('hinhanh');
            $extension = $file->getClientOriginalExtension();
            $filename = current(explode('.', $file->getClientOriginalName())) . '.' . $extension;
            $file->move('public/uploads/Anh_truyen', $filename);
            $data->anhtruyen = $filename;
        }
        $data->save();

        $tentruyen = Truyen::select('id')->where('tentruyen', $request->tentruyen)->first();
        if (!empty($request->input('theloai'))) {
            foreach ($request->input('theloai') as $theloai) {
                $truyentheotheloai = new TruyentheoTheloai();
                $truyentheotheloai->truyen_id = $tentruyen->id;
                $truyentheotheloai->theloai_id = $theloai;
                $truyentheotheloai->save();
            }
        }
        return redirect()->route('admintruyen.index')->with('status', 'Thêm truyện thành công');
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
        $data = Truyen::with('theloai')->find($id);
        $tttl = TruyentheoTheloai::where('truyen_id', $id)->get();
        $array_tttl = $tttl->pluck('theloai_id');
        $theloai = Theloai::all()->sortBy('tentheloai');
        return view('adminbag.truyen.edit')->with(compact('data', 'theloai', 'array_tttl'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TruyenRequest $request, $id)
    {
        $data = Truyen::find($id);
        $data->tentruyen = $request->tentruyen;
        $data->slug_truyen = $request->slug_truyen;
        $data->tacgia = $request->tacgia;
        $data->noidungtruyen = $request->noidungtruyen;
        $data->tinhtrang = $request->tinhtrang;
        $data->kichhoat = $request->kichhoat;
        $data->users_id = Auth::user()->id;
        if ($request->hasFile('hinhanh')) {
            $file = $request->file('hinhanh');
            $extension = $file->getClientOriginalExtension();
            $filename = current(explode('.', $file->getClientOriginalName())) . '.' . $extension;
            $file->move('public/uploads/Anh_truyen', $filename);
            $data->anhtruyen = $filename;
        }
        $data->save();

        $truyentheotheloai = TruyentheoTheloai::where('truyen_id', $id)->get();
        foreach ($truyentheotheloai as $tttl) {
            $tttl->delete();
        }
        if (!empty($request->input('theloai'))) {
            foreach ($request->input('theloai') as $theloai) {
                $truyentheotheloai = new TruyentheoTheloai();
                $truyentheotheloai->truyen_id = $id;
                $truyentheotheloai->theloai_id = $theloai;
                $truyentheotheloai->save();
            }
        }
        return redirect()->route('admintruyen.index')->with('status', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Chapter::where('truyen_id', $id)->count() > 0) {
            return redirect()->back()->with('status', 'Truyện này có chapter nên không thể xóa');
        } else {
            TruyentheoTheloai::where('truyen_id', $id)->delete();
            $data = Truyen::find($id);
            if ($data->hinhanh) {
                unlink('public/uploads/Anh_truyen/' . $data->hinhanh);
            }
            $data->delete();
            return redirect()->back()->with('status', 'Xóa thành công');
        }
    }
}
