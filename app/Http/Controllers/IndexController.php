<?php

namespace App\Http\Controllers;

use App\Models\AnhChapter;
use App\Models\Truyen;
use App\Models\Chapter;
use App\Models\Theloai;
use App\Models\TruyentheoTheloai;
use App\Models\TheoDoi;
use App\Models\User;

class IndexController extends Controller
{
    public function home()
    {
        $truyen = Truyen::with('chapter_index')->where('kichhoat', 0)->orderBy('chapter_sort', 'desc')->paginate(24);
        $slider = Truyen::with('chapter_index')->where('kichhoat', 0)->orderBy('views', 'desc')->take(20)->get();
        // $this->clear_all_session();
        return view('pages.home')->with(compact('truyen', 'slider'));
    }

    public function doctruyen($slug)
    {
        $truyen = Truyen::where('slug_truyen', $slug)->where('kichhoat', 0)->first();
        $chapter = Chapter::with('truyen')->where('truyen_id', $truyen->id)->where('kichhoat', 0)->orderBy('slug_chapter', 'desc')->get();
        $chapter_dau = Chapter::with('truyen')->where('truyen_id', $truyen->id)->orderBy('slug_chapter', 'asc')->first();
        $chapter_cuoi = Chapter::with('truyen')->where('truyen_id', $truyen->id)->orderBy('slug_chapter', 'desc')->first();
        $nguoi_dang = User::where('id', $truyen->users_id)->first();
        $theloai_truyen = TruyentheoTheloai::with('theloai')->where('truyen_id', $truyen->id)->get();
        if (auth()->check()) {
            $theo_doi = TheoDoi::where('truyen_id', $truyen->id)->where('users_id', auth()->user()->id)->first();
        } else {
            $theo_doi = null;
        }
        return view('pages.truyentranh')->with(compact('truyen', 'chapter', 'chapter_dau', 'chapter_cuoi', 'nguoi_dang', 'theloai_truyen', 'theo_doi'));
    }

    public function xemchapter($slug1, $slug2)
    {
        $this->lich_su_doc_truyen_session($slug1, $slug2);
        $truyen = Truyen::where('slug_truyen', $slug1)->where('kichhoat', 0)->first();
        $chapter = Chapter::with('truyen')->where('kichhoat', 0)->where('slug_chapter', $slug2)->where('truyen_id', $truyen->id)->first();
        $tat_ca_chapter = Chapter::with('truyen')->where('truyen_id', $truyen->id)->orderBy('slug_chapter', 'desc')->get();
        Truyen::where('slug_truyen', $slug1)->update(['views' => $truyen->views + 1]);
        Chapter::where('slug_chapter', $slug2)->where('truyen_id', $truyen->id)->update(['views' => $chapter->views + 1]);
        $anhchapter = AnhChapter::with('chapter')->where('chapter_id', $chapter->id)->orderBy('anhchapter', 'asc')->get();
        $chapter_truoc = Chapter::with('truyen')->where('truyen_id', $truyen->id)->where('slug_chapter', '<', $chapter->slug_chapter)
            ->orderBy('slug_chapter', 'desc')->first();
        $chapter_sau = Chapter::with('truyen')->where('truyen_id', $truyen->id)->where('slug_chapter', '>', $chapter->slug_chapter)
            ->orderBy('slug_chapter', 'asc')->first();
        if ($chapter_truoc == null) {
            $chapter_truoc = 'null';
        }
        if ($chapter_sau == null) {
            $chapter_sau = 'null';
        }
        if (auth()->check()) {
            $theo_doi = TheoDoi::where('truyen_id', $truyen->id)->where('users_id', auth()->user()->id)->first();
        } else {
            $theo_doi = null;
        }
        return view('pages.chapter')->with(compact('truyen', 'chapter', 'anhchapter', 'theo_doi', 'chapter_truoc', 'chapter_sau', 'tat_ca_chapter'));
    }

    public function theloai($slug)
    {
        $theloai_id = Theloai::where('slug_theloai', $slug)->first();
        $truyen = Truyen::with('chapter_index')->where('kichhoat', 0)->whereHas('truyen_theloai', function ($query) use ($theloai_id) {
            $query->where('theloai_id', $theloai_id->id);
        })->orderBy('chapter_sort', 'desc')->paginate(36);
        return view('pages.theloai')->with(compact('theloai_id', 'truyen'));
    }

    public function theo_doi_truyen($id)
    {
        if (auth()->check()) {
            $theo_doi = TheoDoi::where('truyen_id', $id)->where('users_id', auth()->user()->id)->first();
            if ($theo_doi) {
                TheoDoi::where('truyen_id', $id)->where('users_id', auth()->user()->id)->delete();
                return redirect()->back();
            } else {
                $theo_doi = new TheoDoi();
                $theo_doi->truyen_id = $id;
                $theo_doi->users_id = auth()->user()->id;
                $theo_doi->save();
                return redirect()->back();
            }
        } else {
            return redirect()->back()->with('status', 'Bạn cần đăng nhập để theo dõi truyện');
        }
    }

    public function huy_theo_doi_truyen($id)
    {
        $data = TheoDoi::where('users_id', auth()->user()->id)->where('truyen_id', $id)->first();
        $data->delete();
        return redirect()->back();
    }

    public function lich_su_doc_truyen_session($slug1, $slug2)
    {
        $truyen = Truyen::where('slug_truyen', $slug1)->where('kichhoat', 0)->first();
        $chapter = Chapter::with('truyen')->where('kichhoat', 0)->where('slug_chapter', $slug2)->where('truyen_id', $truyen->id)->first();
        $data = session()->get('lich_su_doc_truyen');
        if ($data == null) {
            $data = [
                [
                    'truyen_id' => $truyen->id,
                    'slug_truyen' => $truyen->slug_truyen,
                    'tentruyen' => $truyen->tentruyen,
                    'anhtruyen' => $truyen->anhtruyen,
                    'chapter_id' => $chapter->id,
                    'slug_chapter' => $chapter->slug_chapter,
                    'tenchapter' => $chapter->tenchapter,
                ]
            ];
            session()->put('lich_su_doc_truyen', $data);
        } else {
            $check = false;
            foreach ($data as $key => $value) {
                if($value['truyen_id'] == $truyen->id && $value['chapter_id'] == $chapter->id){
                    $check = true;
                }
            }
            if ($check == false) {
                $data[] = [
                    'truyen_id' => $truyen->id,
                    'slug_truyen' => $truyen->slug_truyen,
                    'tentruyen' => $truyen->tentruyen,
                    'anhtruyen' => $truyen->anhtruyen,
                    'chapter_id' => $chapter->id,
                    'slug_chapter' => $chapter->slug_chapter,
                    'tenchapter' => $chapter->tenchapter,
                ];
                session()->put('lich_su_doc_truyen', $data);
            }
        }
        return redirect()->back();
    }

    public function lich_su_doc_truyen()
    {
        $lsdt = session()->get('lich_su_doc_truyen');
        if($lsdt == null){
            $lsdt = [];
        }
        $lsdt = array_reverse($lsdt);
        return view('pages.lich_su_doc_truyen')->with(compact('lsdt'));
    }

    public function xoa_lich_su_doc_truyen($id, $id2)
    {
        $data = session()->get('lich_su_doc_truyen');
        foreach ($data as $key => $value) {
            if ($value['truyen_id'] == $id && $value['chapter_id'] == $id2) {
                unset($data[$key]);
            }
        }
        session()->put('lich_su_doc_truyen', $data);
        return redirect()->back();
    }

    // public function lich_su_doc_truyen()
    // {
    //     $lsdt = session()->get('lich_su_doc_truyen');
    //     return redirect()->back()->with(compact('lsdt'));
    // }

    // public function update_manga_session_same_id($truyen_id, $chapter_id)
    // {
    //     $data = session()->get('lich_su_doc_truyen');
    //     foreach ($data as $key => $value) {
    //         if ($value['truyen_id'] == $truyen_id) {
    //             $data[$key]['chapter_id'] = $chapter_id;
    //         }
    //     }
    //     session()->put('lich_su_doc_truyen', $data);
    //     return redirect()->back();
    // }

    public function clear_all_session()
    {
        session()->forget('lich_su_doc_truyen');
        return redirect()->back();
    }
}
