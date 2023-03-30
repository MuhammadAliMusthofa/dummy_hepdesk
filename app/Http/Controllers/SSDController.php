<?php

namespace App\Http\Controllers;

use App\Models\SSD;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use  Illuminate\Database\Eloquent\Builder;


class SSDController extends Controller
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
            $data = SSD::paginate(10);
            return view('SSD.sdd', compact('data'));
        }
        Auth::logout();
        return redirect('/login');
    }

    public function addForm(){
        $data = false;
        return view('SSD.form', compact('data'));
    }


    public function editForm(Request $request, $id)
    
    {
        $data = SSD::where('id_ssd','=',$id)->first();
        return view('SSD.form', compact('data'));
    }

    
    public function create(Request $request, SSD $sSD)

    {
        $data = new SSD;

        $data->pertanyaan = $request->pertanyaan;
        $data->jawaban = $request->jawaban;
        $data->tanggal =  Carbon::now();
        $data->kategori = $request->kategori;
        $data->status = true;
        $data->created_by = Auth::user()->id_pengguna;
        $data->updated_by = Auth::user()->id_pengguna;
        $data->id_role_pengguna = Auth::user()->role;

        $data->save();
        return redirect('/ssd')->with('success', 'SSD berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SSD  $sSD
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, SSD $sSD, $kategori = null)
    {
        // $kategori = $request->kategori;
        if($kategori){

            // $keyword = $request->keluhan;
            $query = SSD::query();
            $querys = $request->input('keluhan');

            $query->where('pertanyaan','like','%'. $querys .'%');
            if($kategori != 'all'){
                $query->where('kategori', '=', $kategori );
            }else{
            }
            // ->orWhere('kategori', '=', 'all')
            $data = $query->get();

            return view('SSD.kategori', compact('data', 'kategori', 'querys'));

        }else {
            $data=SSD::where('pertanyaan','like','%'. $request->keluhan .'%')->get();
            return view('SSD.kategori', compact('data', 'kategori', 'querys'));
        }  
        
    }

    // $query = $request->input('query');
    // $datas = Tiket::where('id_tiket', 'LIKE', "%$query%")
    // ->orWhere('tanggal', 'LIKE', "%$query%")
    // ->orWhere('nama', 'LIKE', "%$query%")
    // ->orWhere('email', 'LIKE', "%$query%")
    // ->orWhere('departemen', 'LIKE', "%$query%")
    // ->orWhere('status', 'LIKE', "%$query%")
    // ->get();
    public function search_kategori(Request $request, SSD $sSD)
    {
        $query = SSD::query();

        if ($request->has('kategori')) {
            $kategori=$request->kategori;
            
            if($kategori== 'all'){
                $query = SSD::paginate(10);      
            }else{   
                $query= SSD::where('kategori', $kategori)->get();
            }             
        
         }
        $data = $query;
        return view('SSD.kategori', compact('data','kategori', 'items'));
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
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SSD  $sSD
     * @return \Illuminate\Http\Response
     */
    public function edit(SSD $id_ssd)
    {
        $data=SSD::where('id_ssd','=', $id)->first();
        
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
        
        $data=SSD::where('id_ssd','=', $id)->first();
        $data->kategori = $request->kategori;
        $data->pertanyaan = $request->pertanyaan;
        $data->jawaban = $request->jawaban;
        $data->updated_by = Auth::user()->id_pengguna;
        
        $data->save();

        return redirect('/ssd')->with('success', 'SSD berhasil diupdate');
    }

    public function destroy(Request $request, $id)
    {
        $data=SSD::where('id_ssd','=', $id)->first();
        
        $data->delete();

        return redirect('/ssd')->with('success', 'SSD berhasil dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SSD  $sSD
     * @return \Illuminate\Http\Response
     */
    
}