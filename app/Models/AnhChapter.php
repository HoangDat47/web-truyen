<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chapter;
use App\Models\Truyen;

class AnhChapter extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'anhchapter';
    protected $fillable = ['tenanh', 'kichhoat', 'chapter_id'];
    protected $primaryKey = 'id';

    public function chapter(){
        return $this->belongsTo('App\Models\chapter', 'chapter_id', 'id');
    }

    // public function truyen(){
    //     return $this->belongsToThrough(Truyen::class, Chapter::class);
    // }
    public function truyen() {
        return $this->hasOneThrough(
            Truyen::class,
            Chapter::class,
            'id', // Foreign key on the "users" table...
            'id', // Foreign key on the "posts" table...
            'chapter_id', // Local key on the "countries" table...
            'truyen_id' // Local key on the "users" table...
        );
    }
}
