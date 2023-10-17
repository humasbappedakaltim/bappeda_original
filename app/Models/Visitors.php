<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Visitors extends Model
{
    use HasFactory;

    protected $table = 'visitors';
    protected $primaryKey = 'id';
}
