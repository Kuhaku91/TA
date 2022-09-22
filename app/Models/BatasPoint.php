<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatasPoint extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'batas',
        'ket',
    ];
}
