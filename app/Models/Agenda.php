<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    public function scopeCurrentDataBidang($query)
    {
        if (auth()->user()->role_id == 4) {
            return $query->where(function($query){
                $query->orWhere('description', 'LIKE', '%P2EPD%')
                ->orWhere('description', 'LIKE', '%Kabid%')
                ->orWhere('description', 'LIKE', '%Perencana Ahli Muda%');
            });
        } elseif (auth()->user()->role_id == 5) {
            return $query->where(function($query){
                $query->orWhere('description', 'LIKE', '%PPM%')
                ->orWhere('description', 'LIKE', '%Kabid%')
                ->orWhere('description', 'LIKE', '%Perencana Ahli Muda%');
            });
        } elseif (auth()->user()->role_id == 6) {
            return $query->where(function($query){
                $query->orWhere('description', 'LIKE', '%Ekonomi%')
                ->orWhere('description', 'LIKE', '%Kabid%')
                ->orWhere('description', 'LIKE', '%Perencana Ahli Muda%');
            });
        } elseif (auth()->user()->role_id == 7) {
            return $query->where(function($query){
                $query->orWhere('description', 'LIKE', '%Infraswil%')
                ->orWhere('description', 'LIKE', '%Kabid%')
                ->orWhere('description', 'LIKE', '%Perencana Ahli Muda%');
            });
        } elseif (auth()->user()->role_id == 8) {
            return $query->where(function($query){
                $query->orWhere('description', 'LIKE', '%Ka. Bappeda%')
                ->orWhere('description', 'LIKE', '%Plt. Asisten 2%');
            });
        }elseif (auth()->user()->role_id == 9) {
            return $query->where(function($query){
                $query->orWhere('description', 'LIKE', '%Kasubbag Umum%')
                ->orWhere('description', 'LIKE', '%Sekretaris%')
                ->orWhere('description', 'LIKE', '%Kasubbag Program%')
                ->orWhere('description', 'LIKE', '%Sekretariat%');
            });
        }
    }
}
