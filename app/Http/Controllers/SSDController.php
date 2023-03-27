<?php

namespace App\Http\Controllers;
use App\Models\SSD;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use  Illuminate\Database\Eloquent\Builder;
// use Illuminate\Http\Request;

class SSDController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 0 ) {
            $data = SSD::paginate(10);
            return view('SSD.admin', compact('data'));

    //     } else if (Auth::user()->role == 1) {

            return view('SSD.sdd');
        }
        Auth::logout();
        return redirect('/login');
    }


    public function edit( $id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SSD  $sSD
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, SSD $sSD)
    {
        $data=SSD::where('id_ssd','like', $request->keluhan)->get();
        return view('SSD.kategori', compact('data'));
    }


    public function update(Request $request, $id)
    {
        $data=SSD::where('id_ssd','=', $id)->first();
        $data->kategori = $request->kategori;
        $data->pertanyaan = $request->pertanyaan;
        $data->kategori = $request->kategori;
        
        $data->save();

        return redirect()->back();
    }
}
