<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Truyen;
use App\Models\Theloai;
use App\Models\TruyentheoTheloai;

class TruyentheoTheloaiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:them truyen theo the loai|sua truyen theo the loai|xoa truyen theo the loai', ['only' => ['index', 'show']]);
        // $this->middleware('permission:them truyen theo the loai', ['only' => ['create', 'store']]);
        // $this->middleware('permission:sua truyen theo the loai', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:xoa truyen theo the loai', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = Truyen::with('theloai')->orderBy('id', 'asc')->paginate(10);
        // return view('adminbag.theloai.index_theloai_truyen')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $theloai = Theloai::all()->sortBy('tentheloai');
        // return view('adminbag.theloai.create_theloai_truyen')->with(compact('theloai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $tentruyen = Truyen::select('id')->where('tentruyen', $request->tentruyen)->first();
        // if(!empty($request->input('theloai'))){
        //     foreach($request->input('theloai') as $theloai){
        //         $truyentheotheloai = new TruyentheoTheloai();
        //         $truyentheotheloai->truyen_id = $tentruyen->id;
        //         $truyentheotheloai->theloai_id = $theloai;
        //         $truyentheotheloai->save();
        //     }
        // }
        // return redirect()->back()->with('status', 'Thêm thành công');
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
        // $data = Truyen::with('theloai')->find($id);
        // $tttl = TruyentheoTheloai::where('truyen_id', $id)->get();
        // $array_tttl = $tttl->pluck('theloai_id');
        // $theloai = Theloai::all()->sortBy('tentheloai');
        // return view('adminbag.theloai.edit_theloai_truyen')->with(compact('data', 'theloai', 'tttl', 'array_tttl'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $truyentheotheloai = TruyentheoTheloai::where('truyen_id', $id)->get();
        // foreach($truyentheotheloai as $tttl){
        //     $tttl->delete();
        // }
        // if(!empty($request->input('theloai'))){
        //     foreach($request->input('theloai') as $theloai){
        //         $truyentheotheloai = new TruyentheoTheloai();
        //         $truyentheotheloai->truyen_id = $id;
        //         $truyentheotheloai->theloai_id = $theloai;
        //         $truyentheotheloai->save();
        //     }
        // }
        // return redirect()->back()->with('status', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($truyen_id)
    {
        // TruyentheoTheloai::where('truyen_id', $truyen_id)->delete();
        // return redirect()->back()->with('status', 'Xóa thành công');
    }

    public function autocomplete(Request $request)
    {        
        $data = Truyen::select("tentruyen as name")->where("tentruyen","LIKE","%{$request->input('query')}%")->get();
        return response()->json($data);
    }
}
