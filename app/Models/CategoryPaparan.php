<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPaparan extends Model
{
    use HasFactory;
    public function document() {
        return $this->hasMany(DataPaparan::class, 'category_paparans_id');
    }
}

