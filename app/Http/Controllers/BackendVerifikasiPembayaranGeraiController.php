<?php

namespace App\Http\Controllers;

use App\Models\BackendGerai;
use Illuminate\Http\Request;
use App\Models\BackendVerifikasiPembayaranGerai;

class BackendVerifikasiPembayaranGeraiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BackendVerifikasiPembayaranGerai $backendVerifikasiPembayaranGerai, $id)
    {
        $userId = auth()->user()->id;
        $namaUser = auth()->user()->name;
        $backendVerifikasiPembayaranGerai->biaya_pembukaan_gerai = '1.500.000';
        $backendVerifikasiPembayaranGerai->rekening_pembayaran = 'BRI';
        $backendVerifikasiPembayaranGerai->nomor_rekening = '5322 0101 9236 532';
        $backendVerifikasiPembayaranGerai->atas_nama_rekening = 'ARNOLD PG LBN';
        $backendGerai = BackendGerai::find($id);
        // return $backendVerifikasiPembayaranGerai;
        return view('backend/backendverifikasiPembayarangerai', [
            "title" => "KMD - Komunitas Mitra Desa",
            "menu" => "Verifikasi Pembayaran Gerai",
            "userId" => $userId,
            "namaUser" => $namaUser,
            "backendGerai" => $backendGerai,
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BackendVerifikasiPembayaranGerai  $backendVerifikasiPembayaranGerai
     * @return \Illuminate\Http\Response
     */
    public function show(BackendVerifikasiPembayaranGerai $backendVerifikasiPembayaranGerai, $id)
    {
        $userId = auth()->user()->id;
        $namaUser = auth()->user()->name;
        $backendGerai = BackendGerai::find($id);
        $backendVerifikasiPembayaranGerai = BackendVerifikasiPembayaranGerai::find($id);
        // return $backendVerifikasiPembayaranGerai;
        return view('backend/backendverifikasiPembayarangerai', [
            "title" => "KMD - Komunitas Mitra Desa",
            "menu" => "Edit Verifikasi Pembayaran Gerai",
            "userId" => $userId,
            "namaUser" => $namaUser,
            "backendGerai" => $backendGerai,
            "backendVerifikasiPembayaranGerai" => $backendVerifikasiPembayaranGerai,
            "action" => 'edit',
        ]);
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

    public function saveformverifikasigerai(Request $request)
    {
        // return $request->action;
        $data = request()->except(['_token']);
        if ($request->action == "add") {
            if ($request->file('picture_path_slip_pembayaran')) {
                // menyimpan data file yang diupload ke variabel $file
                $file = $request->file('picture_path_slip_pembayaran');
                // dd($request->file('picture_path'));
                $nama_file = time() . "_" . $file->getClientOriginalName();

                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'storage/assets/backendVerifikasiPembayaranGerai/slipPembayaran/';
                // upload file
                $file->move($tujuan_upload, $nama_file);
                $data['picture_path_slip_pembayaran'] = $nama_file;
            }

            BackendVerifikasiPembayaranGerai::create($data);
            BackendGerai::where('id', $request->id)->update(
                [
                    'status_gerai' => 'pembayaran sedang diproses',
                ]
            );
            // return $request;
            return redirect()->route('backend.gerai')->with('success', 'Gerai telah ditambahkan');
        }

        if ($request->action == "edit") {
            // return $request->id;
            if ($request->file('picture_path_slip_pembayaran')) {
                // menyimpan data file yang diupload ke variabel $file
                $file = $request->file('picture_path_slip_pembayaran');
                // dd($request->file('picture_path'));
                $nama_file = time() . "_" . $file->getClientOriginalName();

                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'storage/assets/backendVerifikasiPembayaranGerai/slipPembayaran/';
                // upload file
                $file->move($tujuan_upload, $nama_file);

                $result = BackendVerifikasiPembayaranGerai::where('id', $request->id)->update([
                    'picture_path_slip_pembayaran' => $nama_file,
                ]);
                BackendGerai::where('id', $request->backend_gerais_id)->update(
                    [
                        'edited_by' => $request->edited_by,
                    ]
                );

                // return response()->json([$result]);
                return redirect()->route('backend.gerai')->with('success', 'Gerai telah ditambahkan');
            }
        }
    }

    public function verifikasiPendaftarGeraiBaruOlehSuperAdmin(BackendVerifikasiPembayaranGerai $backendVerifikasiPembayaranGerai, $id)
    {
        $userId = auth()->user()->id;
        $namaUser = auth()->user()->name;
        $backendGerai = BackendGerai::find($id);
        $backendVerifikasiPembayaranGerai = BackendVerifikasiPembayaranGerai::find($id);
        // return $backendVerifikasiPembayaranGerai;
        return view('backend/backendverifikasiPembayarangeraiolehadmin', [
            "title" => "KMD - Komunitas Mitra Desa",
            "menu" => "Verifikasi Pembayaran Gerai Oleh Admin",
            "userId" => $userId,
            "namaUser" => $namaUser,
            "backendGerai" => $backendGerai,
            "backendVerifikasiPembayaranGerai" => $backendVerifikasiPembayaranGerai,
            "action" => 'edit',
        ]);
    }

    public function approvePendaftarGeraiBaruOlehSuperAdmin(Request $request)
    {

        // $pendaftarGeraiBaru = BackendGerai::where('id', $request->id)->first();
        // return $pendaftarGeraiBaru;
        $namaUser = auth()->user()->name;

        BackendGerai::where('id', $request->id)->update(
            [
                'status_gerai' => 'sudah bayar',
                'edited_by' => $namaUser,
            ]
        );

        // return response()->json([$result]);
        return redirect()->route('backend.pendaftar.gerai.baru')->with('success', 'Verifikasi Gerai telah disetujui');
    }
}
