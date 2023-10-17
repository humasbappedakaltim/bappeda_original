<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostsFoto extends Model
{
    use HasFactory;
    protected $table = "posts_foto";

    public function albumId(){
        return $this->hasMany('App\AlbumFoto','album_id','id');
    }
}
