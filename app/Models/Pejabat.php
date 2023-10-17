<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Pejabat extends Model
{
    use HasFactory;
    public function scopeCurrentDataBidang($query)
    {
        if (auth()->user()->role_id == 4) {
            return $query->where('bidang_id', 2);
        } elseif (auth()->user()->role_id == 5) {
            return $query->where('bidang_id', 3);
        } elseif (auth()->user()->role_id == 6) {
            return $query->where('bidang_id', 4);
        } elseif (auth()->user()->role_id == 7) {
            return $query->where('bidang_id', 5);
        } elseif (auth()->user()->role_id == 8) {
            return $query->where('bidang_id', 6);
         }elseif (auth()->user()->role_id == 9) {
            return $query->where('bidang_id', 1);
        }
    }
}
