<?php

namespace App\Models\Wali;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profil_wali extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'alamat',
    ];
}
