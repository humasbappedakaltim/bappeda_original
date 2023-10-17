<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryDataCenter extends Model
{
    use HasFactory;

    public function document() {
        return $this->hasMany(DataCenter::class, 'category_data_center_id');
    }
}

