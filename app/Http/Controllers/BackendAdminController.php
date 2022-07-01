<?php

namespace App\Http\Controllers;

use App\Models\BackendAdmin;
use Illuminate\Http\Request;

class BackendAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->id;
        return view('admin/index', [
            "title" => "KMD - Komunitas Mitra Desa",
            "creator" => $user,
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
     * @param  \App\Models\BackendAdmin  $backendAdmin
     * @return \Illuminate\Http\Response
     */
    public function show(BackendAdmin $backendAdmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BackendAdmin  $backendAdmin
     * @return \Illuminate\Http\Response
     */
    public function edit(BackendAdmin $backendAdmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BackendAdmin  $backendAdmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BackendAdmin $backendAdmin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BackendAdmin  $backendAdmin
     * @return \Illuminate\Http\Response
     */
    public function destroy(BackendAdmin $backendAdmin)
    {
        //
    }
}
