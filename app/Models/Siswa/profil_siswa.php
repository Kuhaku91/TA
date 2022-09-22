<?php

namespace App\Models\Siswa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profil_siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'wali',
        'kelas_id',
        'no_hp',
        'jenis_kelamin',
        'alamat',
    ];
}
