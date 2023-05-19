<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theloai extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'theloai';
    protected $fillable = ['tentheloai', 'slug_theloai', 'motatheloai', 'kichhoat'];
    protected $primaryKey = 'id';

    public function truyentheotheloai(){
        return $this->hasMany('App\Models\TruyentheoTheloai', 'theloai_id', 'id');
    }

    public function truyen(){
        return $this->belongsToMany('App\Models\Truyen', 'truyentheotheloai', 'theloai_id', 'truyen_id');
    }

    public function truyen_theloai() {
        return $this->belongsToMany('App\Models\Truyen', 'truyentheotheloai', 'theloai_id', 'truyen_id');
    }

    public function theloai_co_truyen() {
        return $this->hasMany('App\Models\TruyentheoTheloai', 'theloai_id', 'id');
    }
}
