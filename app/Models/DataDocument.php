<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDocument extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(DataCategory::class, "category_id");
    }

    public function categoryId(){
        return $this->belongsTo('App\Models\DataCategory','category_id','id');
    }
}
