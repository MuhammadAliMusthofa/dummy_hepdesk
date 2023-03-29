<?php

namespace App\Http\Controllers;

use App\Models\SSD;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class SSDController1 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 0 ) {
            $data = SSD::paginate(10);
            return view('SSD.admin', compact('data'));

        } else if (Auth::user()->role == 1) {

            return view('SSD.sdd');
        }
        Auth::logout();
        return redirect('/login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

            $date = Carbon::now()->format('d-m-Y'); 
            $data = new SSD();
            $data->kategori = $request->kategori;
            $data->pertanyaan = $request->pertanyaan;
            $data->jawaban = $request->jawaban;
            
            $data->tanggal = $date;
            $data->save();
    
            return redirect()->back();
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SSD  $sSD
     * @return \Illuminate\Http\Response
     */
    public function show(SSD $sSD)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SSD  $sSD
     * @return \Illuminate\Http\Response
     */
    public function edit(SSD $id_ssd)
    {
        $data=SSD::find($id_ssd);
        
        return view('SSD.form',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SSD  $sSD
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SSD $id_ssd)
    {
        $data=SSD::find($id_ssd);
        $data->kategori = $request->kategori;
        $data->pertanyaan = $request->pertanyaan;
        $data->kategori = $request->kategori;
        
        $data->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SSD  $sSD
     * @return \Illuminate\Http\Response
     */
    public function destroy(SSD $sSD)
    {
       
            $data=SSD::find($sSD);
            $data->delete();
    
            return redirect()->back();
     
    }
}