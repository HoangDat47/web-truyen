<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truyen extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'truyentranh';
    protected $fillable = ['tentruyen', 'slug_truyen', 'anhtruyen', 'tacgia', 'kichhoat', 'noidungtruyen', 'tinhtrang', 'views', 'chapter_sort', 'users_id'];
    protected $primaryKey = 'id';

    public function chapter(){
        return $this->hasMany('App\Models\chapter', 'truyen_id', 'id');
    }

    public function chapter_index() {
        return $this->hasMany('App\Models\chapter', 'truyen_id', 'id')->where('kichhoat', 0)->orderBy('slug_chapter', 'desc');
    }

    public function anhchapter(){
        return $this->hasManyThrough('App\Models\AnhChapter', 'App\Models\Chapter');
    }

    public function truyentheotheloai(){
        return $this->hasMany('App\Models\TruyentheoTheloai', 'truyen_id', 'id');
    }

    public function theloai(){
        return $this->belongsToMany('App\Models\Theloai', 'truyentheotheloai', 'truyen_id', 'theloai_id');
    }

    public function truyen_theloai() {
        return $this->belongsToMany('App\Models\Theloai', 'truyentheotheloai', 'truyen_id', 'theloai_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'users_id', 'id');
    }
}
