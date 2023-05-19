<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Theloai;
use Illuminate\Http\Request;
use App\Models\Truyen;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TimTruyenController extends Controller
{
    public function tim_truyen(Request $request)
    {
        $can_tim = $request->txtSearch;
        $truyen = Truyen::query()->with('chapter_index')->where('kichhoat', 0)
            ->where('tentruyen', 'like', "%{$can_tim}%")
            ->orWhere('tacgia', 'like', "%{$can_tim}%")
            ->orWhereHas('user', function ($query) use ($can_tim) {
                $query->where('name', 'like', "%{$can_tim}%");
            })->paginate(20);
        return view('pages.tim_truyen')->with(compact('truyen'));
    }

    public function timkiem_admin(Request $request)
    {
        $can_tim = $request->txtSearch;
        $truyen = Truyen::query()->where('users_id', Auth::user()->id)
            ->where('tentruyen', 'like', "%{$can_tim}%")->paginate(20);
        return view('layouts.timkiem')->with(compact('truyen'));
    }

    public function tim_truyen_admin(Request $request)
    {
        $can_tim = $request->txtSearch;
        $data = Truyen::query()
            ->where('tentruyen', 'like', "%{$can_tim}%")
            ->orWhere('tacgia', 'like', "%{$can_tim}%")->paginate(20);
        return view('adminbag.truyen.index')->with(compact('data'));
    }

    public function tim_truyen_cua_toi(Request $request)
    {
        $can_tim = $request->txtSearch;
        $data = Truyen::query()->where('users_id', Auth::user()->id)
            ->where('tentruyen', 'like', "%{$can_tim}%")->paginate(20);
        return view('adminbag.truyen.truyen_cua_toi')->with(compact('data'));
    }

    public function tim_the_loai(Request $request)
    {
        $can_tim = $request->txtSearch;
        $data = Theloai::query()->where('tentheloai', 'like', "%{$can_tim}%")->paginate(20);
        return view('adminbag.theloai.index')->with(compact('data'));
    }

    public function tim_nguoi_dung(Request $request)
    {
        $can_tim = $request->txtSearch;
        $users = User::query()->where('name', 'like', "%{$can_tim}%")->paginate(20);
        return view('adminbag.user.index')->with(compact('users'));
    }

    public function tim_chapter(Request $request, $id)
    {
        $can_tim = $request->txtSearch;
        $truyen = Truyen::query()->with('chapter_index')->where('id', $id)->first();
        $chapter = Chapter::with('truyen')->where('truyen_id', $id)
            ->where('tenchapter', 'like', "%{$can_tim}%")->paginate(20);
        return view('adminbag.chapter.index')->with(compact('chapter', 'truyen'));
    }
}
