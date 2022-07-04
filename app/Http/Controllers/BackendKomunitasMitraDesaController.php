<?php

namespace App\Http\Controllers;

use App\Models\BackendKomunitasMitraDesa;
use Illuminate\Http\Request;

class BackendKomunitasMitraDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->id;
        return view('backend/index', [
            "title" => "KMD - Komunitas Mitra Desa",
            "menu" => "Backend",
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
     * @param  \App\Models\BackendKomunitasMitraDesa  $backendKomunitasMitraDesa
     * @return \Illuminate\Http\Response
     */
    public function show(BackendKomunitasMitraDesa $backendKomunitasMitraDesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BackendKomunitasMitraDesa  $backendKomunitasMitraDesa
     * @return \Illuminate\Http\Response
     */
    public function edit(BackendKomunitasMitraDesa $backendKomunitasMitraDesa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BackendKomunitasMitraDesa  $backendKomunitasMitraDesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BackendKomunitasMitraDesa $backendKomunitasMitraDesa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BackendKomunitasMitraDesa  $backendKomunitasMitraDesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(BackendKomunitasMitraDesa $backendKomunitasMitraDesa)
    {
        //
    }
}
