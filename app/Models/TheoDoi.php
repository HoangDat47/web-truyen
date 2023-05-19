<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheoDoi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'theodoi';
    protected $fillable = [
        'users_id',
        'truyen_id',
    ];
    protected $primaryKey = 'id';

    public function truyen()
    {
        return $this->belongsTo(Truyen::class, 'truyen_id', 'id')->orderBy('chapter_sort', 'desc');
    }

    public function chapter(){
        return $this->hasMany(Chapter::class,'truyen_id','truyen_id')->orderBy('id', 'desc');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function chapter_vua_them()
    {
        return $this->hasMany(Chapter::class, 'truyen_id', 'truyen_id')->orderBy('id', 'desc');
    }
}
