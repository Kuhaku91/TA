<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lapor extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_pelapor',
        'id_dilapor',
        'id_point',
        'ket',
        'bukti',
        'bukti1',
        'bukti2',
        'bukti3',
        'verif',
    ];
}
