<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\SSD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  Illuminate\Database\Eloquent\Builder;
use Yajra\Datatables\Datatables;


class SSDController extends Controller
{
    public function index(Request $request, $page = null)
    {
        if (Auth::user()->role == 0 ) {
            $data = SSD::with('users')->paginate(!$page ? 10 : $page);
            return redirect('/ssd/admin/search');

        } else if (Auth::user()->role == 1) {
            $data = SSD::paginate($page);
            return view('SSD.ssd', compact('data'));
        }
        Auth::logout();
        return redirect('/login');
    }

    public function addForm()
    {
        $data = false;
        return view('SSD.form', compact('data'));
    }


    public function editForm(Request $request, $id)

    {
        $data = SSD::with('users')->where('id_ssd','=',$id)->first();
        $page = "edit";
        return view('SSD.form', compact('data', 'page'));
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
            // session(['keluhan' => $querys]);

            $query->where('pertanyaan','like','%'. $querys .'%');
            if($kategori != 'all'){
                $query->where('kategori', '=', $kategori );
                // $count = $query->where('kategori', '=', $kategori )->count();
            }else{
            }
            // ->orWhere('kategori', '=', 'all')
            $data = $query->get();
            return view('SSD.kategori', compact('data', 'kategori', 'querys', 'count'));

        }else {
            $data=SSD::where('pertanyaan','like','%'. $request->keluhan .'%')->get();
      
            return view('SSD.kategori', compact('data', 'kategori', 'querys', 'count'));
        }  
        
    }



    public function adminShow(Request $request, SSD $sSD, $page = null)
    {
        $departemen = array(
            $request->lldikti,
        $request->dosen,
            $request->asesor,
        $request->perguruan_tinggi,
        );


        $query = SSD::query();

        

        $query->with('Users');

        foreach($departemen as $d){
            if($d){
                $query->orWhere("kategori", "=", $d);
            }    
        };

        if($request->status != NULL){
            $query->where("status","=", $request->status);
        };

        if($request->keluhan){
            $query->where("pertanyaan","=", $request->keluhan);
        }

        $query->orderBy('id_ssd','DESC');

        if($page){
            $data = $query->paginate($page);
        } else {
            $data = $query->paginate(10);
        }


        return view('SSD.admin', compact('data','kategori'));

        
    }

    public function search_kategori(Request $request, SSD $sSD)
    {
        $query = SSD::query();
        $items = count($query);

        
        if ($request->has('kategori')) {
            $kategori=$request->kategori;
            // session(['keluhan' => $kategori]);
            
            
            if($kategori== 'all'){
                $query = SSD::paginate(10);    
            }else{   
                $query= SSD::where('kategori', $kategori)->get();
                $items =  $query->count(); 
                
            }             
        
         }
        $data = $query;
        // dd($items);
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
        $data=SSD::where('id_ssd','=', $id_ssd)->first();
        $page = "edit";
        
        return view('SSD.form',compact('data', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SSD  $sSD
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SSD $sSd, $id )
    {
        
        $data=SSD::where('id_ssd','=', $id)->first();
        $data->kategori = $request->kategori;
        $data->pertanyaan = $request->pertanyaan;
        $data->jawaban = $request->jawaban;
        $data->updated_by = Auth::user()->id_pengguna;

        $data->save();

        return redirect('/ssd')->with('success', 'SSD berhasil diupdate');
    }

    public function hide(Request $request, $id)
    {
        $data=SSD::where('id_ssd','=', $id)->first();
        $data->status = false;
        
        $data->save();

        return redirect('/ssd')->with('success_hide', 'Data SSD dinonaktifkan');
    }

    public function visible(Request $request, $id)
    {
        $data=SSD::where('id_ssd','=', $id)->first();
        $data->status = true;
        
        $data->save();

        return redirect('/ssd')->with('success_visible', 'Data SSD diaktifkan');
    }

    public function destroy(Request $request, $id)
    {
        $data = SSD::where('id_ssd', '=', $id)->first();

        $data->delete();

        return redirect('/ssd')->with('success', 'SSD berhasil dihapus');
    }

    public function findOne(Request $request, SSD $sSD, $id)
    {
            
            $data=SSD::with('users')->where('id_ssd','=',$id)
            ->first();

            $page = "detail";
            // return view('SSD.form', compact('data','page'));
            dd($data);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SSD  $sSD
     * @return \Illuminate\Http\Response
     */
    
}