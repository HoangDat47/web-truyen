<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Theloai;
use App\Models\TheoDoi;
use App\Models\Truyen;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $data = DB::select('call truyentranh_count(?)', [Auth::user()->id]);
        $data = DB::table('truyentranh')->select(DB::raw('SUM(views) as tong_views, COUNT(tentruyen) as truyen_da_dang'))->where('users_id', Auth::user()->id)->get();
        // $sql = "select * from v_bxh_nhanvien";
        $sql = "SELECT
        users.avatar, 
        users.`name`, 
        roles.`name` AS vai_tro, 
        (SELECT COUNT(truyentranh.users_id) from truyentranh WHERE
        users.id = truyentranh.users_id) AS truyen_da_dang, 
        (SELECT SUM(truyentranh.views) from truyentranh WHERE
        users.id = truyentranh.users_id) AS tong_views
    FROM
        users
        INNER JOIN
        truyentranh
        ON 
            users.id = truyentranh.users_id,
        model_has_roles
        INNER JOIN
        roles
        ON 
            model_has_roles.role_id = roles.id
    WHERE
        model_has_roles.role_id = 4
    GROUP BY
        users.id
    ORDER BY
        truyen_da_dang DESC";
        $bxh_nhanvien = DB::select($sql);
        $tong_truyen = Truyen::count();
        $tong_nguoi_dung = User::count();
        $tong_luot_theo_doi = TheoDoi::count();
        $tong_the_loai = Theloai::count();
        return view('home')->with(compact('data', 'tong_truyen', 'tong_nguoi_dung', 'bxh_nhanvien', 'tong_luot_theo_doi', 'tong_the_loai'));
    }
}