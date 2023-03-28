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
    public function show(Request $request, SSD $sSD)
    {
        $data=SSD::where('pertanyaan','like', $request->keluhan)->get();
        return view('SSD.kategori', compact('data'));
    }


    public function update(Request $request, $id)
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
}
