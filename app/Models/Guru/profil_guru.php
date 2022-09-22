<?php

namespace App\Models\Guru;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profil_guru extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'alamat',
        'ttl',
        'no_hp',
    ];
}
