<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ChapterController;
use App\Http\Controllers\Admin\TruyenController;
use App\Http\Controllers\Admin\AnhChapterController;
use App\Http\Controllers\Admin\TheloaiController;
use App\Http\Controllers\Admin\TruyentheoTheloaiController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\TimTruyenController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

Route::get('/', [IndexController::class, 'home'])->name('index.home');
Route::get('truyen-tranh/{slug}', [IndexController::class, 'doctruyen'])->name('index.doctruyen');
Route::get('truyen-tranh/{slug1}/{slug2}', [IndexController::class, 'xemchapter'])->name('index.xemchapter');
Route::get('the-loai/{slug}', [IndexController::class, 'theloai'])->name('index.theloai');
Route::get('theo-doi-truyen/{id}', [IndexController::class, 'theo_doi_truyen'])->name('index.theo_doi_truyen');
Route::get('huy-theo-doi-truyen/{id}', [IndexController::class, 'huy_theo_doi_truyen'])->name('index.huy_theo_doi_truyen');
Route::post('tim-kiem', [TimTruyenController::class, 'tim_truyen'])->name('index.tim_truyen');
Route::resource('user', UserProfileController::class);
Route::get('user/theo-doi/{id}', [UserProfileController::class, 'theo_doi'])->name('user.theo_doi');
Route::get('user/doi-mat-khau/{id}', [UserProfileController::class, 'doi_mat_khau'])->name('user.doi_mat_khau');
Route::post('user/doi-mat-khau', [UserProfileController::class, 'post_doi_mat_khau'])->name('user.post_doi_mat_khau');
Route::get('lich-su-doc-truyen', [IndexController::class, 'lich_su_doc_truyen'])->name('index.lich_su_doc_truyen');
Route::get('lich-su-doc-truyen/{id}/{id2}', [IndexController::class, 'xoa_lich_su_doc_truyen'])->name('index.xoa_lich_su_doc_truyen');

Auth::routes();
// Auth::routes(['register'=>false]);
Route::group(['middleware' => ['auth']], function () {
    Route::name('admin')->group(function () {
        Route::group(['middleware' => ['checkrole:admin|nguoi_dang_truyen']], function () {
            Route::prefix('admin')->group(function () {
                //Route::resource('/',DashController::class);
                Route::get('/', [HomeController::class, 'index'])->name('home');
                Route::resources([
                    'truyen' => TruyenController::class,
                    'chapter' => ChapterController::class,
                    'anhchapter' => AnhChapterController::class,
                    'theloai' => TheloaiController::class,
                    'tttl' => TruyentheoTheloaiController::class, //truyen theo the loai
                    'user' => UserController::class,
                ]);
                Route::get('/truyen/truyen_cua_toi/{id}', [TruyenController::class, 'truyen_cua_toi'])->name('truyen.truyen_cua_toi');
                Route::get('/chapter/create/{id}', [ChapterController::class, 'create'])->name('chapter1.create');
                Route::get('/anhchapter/create/{id}', [AnhChapterController::class, 'create'])->name('anhchapter1.create');
                Route::get('autocomplete', [TruyentheoTheloaiController::class, 'autocomplete'])->name('autocomplete');
                Route::get('/tttl/{truyen_id}', [TruyentheoTheloaiController::class, 'destroy'])->name('tttl1.destroy');
                Route::get('/user/phan-quyen/{id}', [UserController::class, 'phanquyen'])->name('user.phanquyen');
                Route::get('/user/phan-vai-tro/{id}', [UserController::class, 'phanvaitro'])->name('user.phanvaitro');
                Route::post('/user/them-roles-nguoi-dung/{id}', [UserController::class, 'phanvaitropost'])->name('user.phanvaitropost');
                Route::post('/user/them-permissions-nguoi-dung/{id}', [UserController::class, 'phanquyenpost'])->name('user.phanquyenpost');
                Route::post('/user/them-quyen', [UserController::class, 'themquyen'])->name('user.themquyen');
                Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
                Route::post('/tim-kiem', [TimTruyenController::class, 'timkiem_admin'])->name('timkiem_admin');
                Route::post('/tim-truyen', [TimTruyenController::class, 'tim_truyen_admin'])->name('tim_truyen_admin');
                Route::post('/tim-truyen-cua-toi', [TimTruyenController::class, 'tim_truyen_cua_toi'])->name('tim_truyen_cua_toi');
                Route::post('/tim-the-loai', [TimTruyenController::class, 'tim_the_loai'])->name('tim_the_loai');
                Route::post('/tim-nguoi-dung', [TimTruyenController::class, 'tim_nguoi_dung'])->name('tim_nguoi_dung');
                Route::post('tim-chapter/{id}', [TimTruyenController::class, 'tim_chapter'])->name('tim_chapter');
                Route::post('doi-mat-khau', [UserController::class, 'doimatkhau_post'])->name('user.doimatkhau_post');
            });
        });
    });
});
