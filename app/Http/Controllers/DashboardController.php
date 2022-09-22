<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TableGambar;

class DashboardController extends Controller
{
    public function Dashboard(){
    	$data = [
			'gambar' => TableGambar::first(),
		];
    	return view('Dashboard',compact('data'));
    }
}
