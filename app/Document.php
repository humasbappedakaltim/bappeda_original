<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Document extends Model
{
    public function category(){
        return $this->belongsTo('App\CategoryDocument','category_id','id');
    }
}
