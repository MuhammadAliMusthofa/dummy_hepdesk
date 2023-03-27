<?php

namespace App\Http\Controllers;

use App\Models\SSD;
use Illuminate\Http\Request;

class SSDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('SSD.sdd');
    }

    public function kategori()
    {
        return view('SSD.kategori');
    }

    public function admin()
    {
        return view('SSD.admin');
    }

    public function form()
    {
        return view('SSD.form');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function edit(SSD $sSD)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SSD  $sSD
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SSD $sSD)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SSD  $sSD
     * @return \Illuminate\Http\Response
     */
    public function destroy(SSD $sSD)
    {
        //
    }
}
