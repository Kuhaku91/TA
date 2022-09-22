<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class ChatKonseling extends Model
{
	use HasFactory;

	protected $fillable = [
		'id_konseling',
		'id_pengirim',
		'id_penerima',
		'chat',
	];

	public function nama($data){
		$a = User::find($data);
		return $a->name;
	}
}
