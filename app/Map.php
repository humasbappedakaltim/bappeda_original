<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Map extends Model
{
    public function categoryMapId(){
        return $this->belongsTo('App\CategoryMap','category_map_id','id');
    }
}
