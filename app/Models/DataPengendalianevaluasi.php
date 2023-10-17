<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPengendalianevaluasi extends Model
{
    use HasFactory;
    
    public function document() {
        return $this->hasMany(DataPengendalianevaluasi::class, 'category_pengendalianevaluasis_id');
    }

    public function category()
    {
        return $this->belongsTo(CategoryPengendalianevaluasi::class, "category_pengendalianevaluasis_id");
    }
}


