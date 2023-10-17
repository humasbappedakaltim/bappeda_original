<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPengendalianevaluasi extends Model
{
    use HasFactory;

    public function document() {
        return $this->hasMany(DataPengendalianevaluasi::class, 'category_pengendalianevaluasis_id');
    }
}
