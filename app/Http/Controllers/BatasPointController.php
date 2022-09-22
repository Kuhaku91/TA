<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BatasPoint;

class BatasPointController extends Controller
{
    public function AdminBatas()
    {
        $data = ([
            'batas' => BatasPoint::get(),
        ]);
        return view('Admin.Batas.batas', compact('data'));
    }

    public function UAdminBatas(Request $request,$id)
    {
        // dd($request,$id);
        BatasPoint::find($id)->update([
            'batas' => $request->batas,
        ]);
        return redirect()->back();
    }
    public function BkBatas()
    {
        $data = ([
            'batas' => BatasPoint::get(),
        ]);
        return view('Bk.Batas.batas', compact('data'));
    }

    public function UBkBatas(Request $request,$id)
    {
        // dd($request,$id);
        BatasPoint::find($id)->update([
            'batas' => $request->batas,
        ]);
        return redirect()->back();
    }
}
