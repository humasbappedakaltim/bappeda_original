<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = "posts_news";

    public function authorId(){
        return $this->belongsTo('App\Models\User','author_id','id');
    }

    public function categoryId(){
        return $this->belongsTo('App\Models\CategoryPost','category_id','id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category() {
        return $this->belongsTo(CategoryPost::class, 'category_id');
    }
}
