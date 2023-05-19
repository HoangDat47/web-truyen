<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\AnhChapterRequest;
use App\Models\AnhChapter;
use App\Models\Chapter;

class AnhChapterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:them anh chapter|sua anh chapter|xoa anh chapter', ['only' => ['index', 'show']]);
        // $this->middleware('permission:them anh chapter', ['only' => ['create', 'store']]);
        // $this->middleware('permission:sua anh chapter', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:xoa anh chapter', ['only' => ['destroy']]);
    }
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
    public function create($id)
    {
        $chapter = Chapter::find($id);
        return view('adminbag.anhchapter.create')->with(compact('chapter'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnhChapterRequest $request)
    {
        if ($request->hasFile('hinhanh')) {
            foreach ($request->file('hinhanh') as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = $request->tentruyen.'-'.$request->chapter_id.'-'.current(explode('.', $file->getClientOriginalName())).'.'.$extension;
                $file->move('public/uploads/Anh_chapter', $filename);
                $data = new AnhChapter();
                $data->anhchapter = $filename;
                $data->chapter_id = $request->chapter_id;
                $data->save();
            }
        }
        return redirect()->route('adminchapter.edit', [$request->chapter_id])->with('status', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $anhchapter = AnhChapter::where('chapter_id', $id)->orderBy('anhchapter', 'ASC')->get();
        // return view('adminbag.anhchapter.show')->with(compact('anhchapter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $chapter = AnhChapter::with('truyen')->get()->where('id', $id);
        $chapter = AnhChapter::find($id);
        $tenchapter = Chapter::find($chapter->chapter_id);
        // $tentruyen = Truyen::with('chapter')->get()->where('id', $tenchapter->truyen_id);
        return view('adminbag.anhchapter.edit')->with(compact('chapter', 'tenchapter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnhChapterRequest $request, $id)
    {
        $data = AnhChapter::find($id);
        if($request->hasFile('hinhanh')){
            $file = $request->file('hinhanh');
            $extension = $file->getClientOriginalExtension();
            $filename = $request->tentruyen.'-'.$request->chapter_id.'-'.current(explode('.', $file->getClientOriginalName())).'.'.$extension;
            $file->move('public/uploads/Anh_chapter',$filename);
            $data->anhchapter = $filename;
        }
        $data->save();
        return redirect()->back()->with('status', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = AnhChapter::find($id);
        if ($data->anhchapter) {
            unlink('public/uploads/Anh_chapter/' . $data->anhchapter);
        }
        $data->delete();
        return redirect()->back()->with('status', 'Xóa thành công');
    }
}
