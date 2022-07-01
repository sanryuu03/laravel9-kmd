<?php

namespace App\Http\Controllers;

use App\Models\Gerai;
use Illuminate\Http\Request;

class GeraiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->id;
        $pendapatanGerai = Gerai::all();
        return view('admin/pendapatangerai', [
            "title" => "KMD - Komunitas Mitra Desa",
            "creator" => $user,
            "menu" => "Pendapatan Gerai",
            "pendapatanGerai" => $pendapatanGerai,
        ]);
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
     * @param  \App\Models\Gerai  $gerai
     * @return \Illuminate\Http\Response
     */
    public function show(Gerai $gerai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gerai  $gerai
     * @return \Illuminate\Http\Response
     */
    public function edit(Gerai $gerai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gerai  $gerai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gerai $gerai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gerai  $gerai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gerai $gerai)
    {
        //
    }
}
