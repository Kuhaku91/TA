<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konseling extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_siswa',
        'id_guru',
        'jenis_konseling',
        'ket',
        'verif',
    ];
}
