<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataCenter extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(CategoryDataCenter::class, "category_data_center_id");
    }
}
