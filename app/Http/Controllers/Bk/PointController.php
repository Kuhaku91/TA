<?php

namespace App\Http\Controllers\Bk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lapor;
use File;
use App\Models\ChatLapor;
use App\Models\ChatPoint;
use App\Models\ChatWali;
use App\Models\User;

class PointController extends Controller
{
	public function Point(){
		$data = [
			'lapor' => Lapor::
			select(
				'lapors.id',
				'pe.name as pe',
				'pe.id as id_pe',
				'di.name as di',
				'di.id as id_di',
				'lapors.ket as ur',
				'points.beban',
				'points.ket',
				'lapors.bukti',
				'lapors.bukti1',
				'lapors.bukti2',
				'lapors.bukti3',
				'lapors.verif',
			)->
			leftjoin('users as di','lapors.id_dilapor','di.id')->
			leftjoin('points','lapors.id_point','points.id')->
			leftjoin('users as pe','lapors.id_pelapor','pe.id')->
			get(),
		];
		// dd($data['lapor']);
		return view('Bk.Lapor.Lapor',compact('data'));
	}

	public function VPoint($id){
		Lapor::find($id)->update([
			'verif' => 's',
		]);
		return redirect('bk/lapor');
	}

	public function TPoint($id){
		$a = Lapor::find($id);
		File::delete('BUKTI/'.$a->bukti);
		$a->delete();
		return redirect('bk/lapor');
	}

	public function CPoint($id){
		$data = [
			'id' => $id,
			'id_penerima' => Lapor::find($id),
		];
		if (User::find($data['id_penerima']->id_dilapor)->role=='guru') {
			$data[] = [
				'chat_point' => ChatPoint::where('id_point',$id)->get(),
			];
			return view('Bk.Lapor.clapor_guru',compact('data'));
		}
		elseif (User::find($data['id_penerima']->id_dilapor)->role=='siswa') {
			$data[] = [
				'chat_point' => ChatPoint::where('id_point',$id)->get(),
				'chat_wali' => ChatWali::where('id_point',$id)->get(),
			];
			return view('Bk.Lapor.clapor_siswa',compact('data'));
		}
		dd($data);
	}

	public function TCPointSiswa(Request $request,$id){
		// dd($request,$id);

		$a = new ChatPoint;
		$a->id_point = $id;
		$a->id_pengirim = '0';
		$a->id_penerima = $request->id_penerima;
		$a->chat = $request->chat;
		$a->save();

		return redirect()->back();
	}

	public function TCPointWali(Request $request,$id){
		// dd($request,$id);

		$a = new ChatWali;
		$a->id_point = $id;
		$a->id_pengirim = '0';
		$a->id_penerima = $request->id_penerima;
		$a->chat = $request->chat;
		$a->save();

		return redirect()->back();
	}

	public function CPPoint($id){
		$data = [
			'id' => $id,
			'id_pelapor' => Lapor::find($id),
		];
		if (User::find($data['id_pelapor']->id_pelapor)->role=='guru') {
			$data[] = [
				'chat_point' => ChatLapor::where('id_point',$id)->get(),
			];
			// dd($data);
			return view('Bk.Lapor.cplapor_guru',compact('data'));
		}
		elseif (User::find($data['id_pelapor']->id_pelapor)->role=='siswa') {
			$data[] = [
				'chat_point' => ChatLapor::where('id_point',$id)->get(),
			];
			// dd($data);
			return view('Bk.Lapor.cplapor_siswa',compact('data'));
		}
	}

	public function TCPPoint(Request $request,$id)
	{
		// dd($request,$id);
		$a = new ChatLapor;
		$a->id_point = $id;
		$a->id_pengirim = '0';
		$a->id_penerima = $request->id_penerima;
		$a->chat = $request->chat;
		$a->save();

		return redirect()->back();
	}
}
