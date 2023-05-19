<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChapterRequest;
use App\Models\Chapter;
use App\Models\Truyen;
use App\Models\AnhChapter;
use Carbon\Carbon;

class ChapterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:them chapter|sua chapter|xoa chapter', ['only' => ['index', 'show']]);
        $this->middleware('permission:them chapter', ['only' => ['create', 'store']]);
        $this->middleware('permission:sua chapter', ['only' => ['edit', 'update']]);
        $this->middleware('permission:xoa chapter', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $truyen = Truyen::with('chapter')->where('id', $id)->orderBy('id', 'DESC')->first();
        return view('adminbag.chapter.create')->with(compact('truyen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChapterRequest $request)
    {
        $tentruyen = Truyen::select('id')->where('tentruyen', $request->tentruyen)->first();
        $data = new Chapter();
        $data->tenchapter = $request->tenchapter;
        $data->slug_chapter = $request->slug_chapter;
        $data->kichhoat = $request->kichhoat;
        $data->truyen_id = $tentruyen->id;
        $data->save();

        $chapter_id = Chapter::where('truyen_id', $tentruyen->id)->where('tenchapter', $request->tenchapter)->first()->id;
        if ($request->hasFile('hinhanh')) {
            foreach ($request->file('hinhanh') as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = $request->tentruyen.'-'.$request->chapter_id.'-'.current(explode('.', $file->getClientOriginalName())).'.'.$extension;
                $file->move('public/uploads/Anh_chapter', $filename);
                $data = new AnhChapter();
                $data->anhchapter = $filename;
                $data->chapter_id = $chapter_id;
                $data->save();
            }
        }
        $current_time = Carbon::now();
        Truyen::where('id', $tentruyen->id)->update(['chapter_sort' => $current_time]);
        return redirect()->route('adminchapter.show', [$tentruyen->id])->with('status', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chapter = Chapter::with('truyen')->where('truyen_id', $id)->orderBy('slug_chapter', 'DESC')->paginate(10);
        $truyen = Truyen::where('id', $id)->first();
        return view('adminbag.chapter.index')->with(compact('chapter', 'truyen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chapter = Chapter::find($id);
        $truyen = Truyen::with('chapter')->where('id', $chapter->truyen_id)->first();
        $anhchapter = AnhChapter::where('chapter_id', $id)->orderBy('anhchapter', 'ASC')->get();
        return view('adminbag.chapter.edit')->with(compact('truyen', 'chapter', 'anhchapter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ChapterRequest $request, $id)
    {
        // $request->validate(
        //     [
        //         'tenchapter' => 'required|max:255',
        //         'slug_chapter' => 'required|max:255',
        //         // 'noidung' => 'required|max:255',
        //         'kichhoat' => 'required',
        //     ],
        //     [
        //         'tenchapter.required' => 'Tên chapter không được để trống',
        //         'slug_chapter.required' => 'Slug chapter không được để trống',
        //         // 'noidung.required' => 'Nội dung truyện không được để trống',
        //     ],
        // );
        $tentruyen = Truyen::select('id')->where('tentruyen', $request->truyen_id)->first();
        $data = Chapter::find($id);
        $data->tenchapter = $request->tenchapter;
        $data->slug_chapter = $request->slug_chapter;
        $data->kichhoat = $request->kichhoat;
        $data->truyen_id = $tentruyen->id;
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
        if(AnhChapter::where('chapter_id', $id)->count() > 0){
            $anhChapter = AnhChapter::where('chapter_id', $id)->get();
            foreach ($anhChapter as $act) {
                if(file_exists('public/uploads/Anh_chapter/'.$act->anhchapter)){
                    unlink('public/uploads/Anh_chapter/'.$act->anhchapter);
                }
            }
            AnhChapter::where('chapter_id', $id)->delete();
            Chapter::find($id)->delete();
            return redirect()->back()->with('status', 'Xóa thành công');
        } else {
            Chapter::find($id)->delete();
            return redirect()->back()->with('status', 'Xóa thành công');
        }
        
    }

    public function autocomplete(ChapterRequest $request)
    {        
        $data = Truyen::select("tentruyen as name")->where("tentruyen","LIKE","%{$request->input('query')}%")->get();
        return response()->json($data);
    }
}
