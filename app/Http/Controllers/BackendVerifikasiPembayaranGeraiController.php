<?php

namespace App\Http\Controllers;

use App\Models\BackendVerifikasiPembayaranGerai;
use Illuminate\Http\Request;

class BackendVerifikasiPembayaranGeraiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BackendVerifikasiPembayaranGerai $backendVerifikasiPembayaranGerai)
    {
        $userId = auth()->user()->id;
        $namaUser = auth()->user()->name;
        $backendVerifikasiPembayaranGerai->biaya_pembukaan_gerai = '1.500.000';
        $backendVerifikasiPembayaranGerai->rekening_pembayaran = 'BRI';
        $backendVerifikasiPembayaranGerai->nomor_rekening = '5322 0101 9236 532';
        $backendVerifikasiPembayaranGerai->atas_nama_rekening = 'ARNOLD PG LBN';
        return view('backend/backendverifikasiPembayarangerai', [
            "title" => "KMD - Komunitas Mitra Desa",
            "menu" => "Verifikasi Pembayaran Gerai",
            "userId" => $userId,
            "namaUser" => $namaUser,
            "backendVerifikasiPembayaranGerai" => $backendVerifikasiPembayaranGerai,
            "action" => 'add',
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
     * @param  \App\Models\BackendVerifikasiPembayaranGerai  $backendVerifikasiPembayaranGerai
     * @return \Illuminate\Http\Response
     */
    public function show(BackendVerifikasiPembayaranGerai $backendVerifikasiPembayaranGerai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BackendVerifikasiPembayaranGerai  $backendVerifikasiPembayaranGerai
     * @return \Illuminate\Http\Response
     */
    public function edit(BackendVerifikasiPembayaranGerai $backendVerifikasiPembayaranGerai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BackendVerifikasiPembayaranGerai  $backendVerifikasiPembayaranGerai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BackendVerifikasiPembayaranGerai $backendVerifikasiPembayaranGerai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BackendVerifikasiPembayaranGerai  $backendVerifikasiPembayaranGerai
     * @return \Illuminate\Http\Response
     */
    public function destroy(BackendVerifikasiPembayaranGerai $backendVerifikasiPembayaranGerai)
    {
        //
    }
}
