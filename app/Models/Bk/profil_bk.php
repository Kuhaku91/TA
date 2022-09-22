<?php

namespace App\Models\Bk;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profil_bk extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'jenis_kelamin',
        'ttl',
        'alamat',
        'no_hp',
        'kelas_id',
    ];
}
