<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class ChatWali extends Model
{
    use HasFactory;

    protected $fillable = [
		'id_point',
		'id_pengirim',
		'id_penerima',
		'chat',
	];

	public function nama($data){
		if ($data=='0') {
			return 'Guru Bk';
		}
		else{
			$a = User::find($data);
			return $a->name;
		}
	}
}
