<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'chapter';
    protected $fillable = ['tenchapter', 'slug_chapter', 'kichhoat', 'truyen_id', 'views'];
    protected $primaryKey = 'id';

    public function truyen(){
        return $this->belongsTo('App\Models\truyen', 'truyen_id', 'id');
    }

    public function anhchapter(){
        return $this->hasManyThrough('App\Models\anhchapter', 'App\Models\truyen');
    }

    public function truyen_theloai() {
        return $this->belongsToMany('App\Models\Truyen', 'truyentheotheloai', 'theloai_id', 'truyen_id');
    }
}
