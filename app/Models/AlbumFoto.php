<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlbumFoto extends Model
{
    use HasFactory;
    protected $table = "post_album";

    public function post_foto(){
        return $this->hasMany('App\PostsFoto');
    }
}
