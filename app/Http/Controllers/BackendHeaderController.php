<?php

namespace App\Http\Controllers;

use App\Models\BackendHeader;
use Illuminate\Http\Request;

class BackendHeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend/backendHeader', [
            "title" => "KMD - Komunitas Mitra Desa",
            "menu" => ucwords('header'),
            "creator" => auth()->user()->id,
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
     * @param  \App\Models\BackendHeader  $backendHeader
     * @return \Illuminate\Http\Response
     */
    public function show(BackendHeader $backendHeader)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BackendHeader  $backendHeader
     * @return \Illuminate\Http\Response
     */
    public function edit(BackendHeader $backendHeader)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BackendHeader  $backendHeader
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BackendHeader $backendHeader)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BackendHeader  $backendHeader
     * @return \Illuminate\Http\Response
     */
    public function destroy(BackendHeader $backendHeader)
    {
        //
    }
}
