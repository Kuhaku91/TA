<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Point;


class PointController extends Controller
{
    public function Point(){
		$data = [
			'point' => Point::all(),
		];
		return view('Admin.Point.point',compact('data'));
	}

	public function TPoint(Request $r){
		$r->validate([
			'beban' => 'required|integer',
			'ket'	=> 'required|string',
		]);

		$d = new Point;
		$d->beban = $r->beban;
		$d->ket = $r->ket;
		$d->save();

		return redirect('admin/point');
	}

	public function UPoint(Request $r,$id){
		$d = Point::find($id);
		$d->beban = $r->beban;
		$d->ket = $r->ket;
		$d->save();

		return redirect('admin/point');
	}

	public function HPoint($id){
		$d = Point::find($id);
		$d->delete();
		
		return redirect('admin/point');
	}
}
