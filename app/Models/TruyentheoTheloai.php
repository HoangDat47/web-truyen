<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TruyentheoTheloai extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'truyentheotheloai';
    protected $fillable = ['truyen_id','theloai_id'];
    protected $primaryKey = 'id';

    public function truyen(){
        return $this->belongsTo('App\Models\Truyen', 'truyen_id', 'id');
    }

    public function theloai(){
        return $this->belongsTo('App\Models\Theloai', 'theloai_id', 'id');
    }

    public function truyen_theloai() {
        return $this->belongsToMany('App\Models\Truyen', 'truyentheotheloai', 'theloai_id', 'truyen_id');
    }
}
