<?php

namespace App\Http\Controllers;

use App\Models\BackendGerai;
use Illuminate\Http\Request;

class BackendGeraiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->id;
        $gerai = BackendGerai::all();
        return view('backend/backendgerai', [
            "title" => "KMD - Komunitas Mitra Desa",
            "menu" => "Gerai",
            "creator" => $user,
            "gerai" => $gerai,
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
     * @param  \App\Models\BackendGerai  $backendGerai
     * @return \Illuminate\Http\Response
     */
    public function show(BackendGerai $backendGerai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BackendGerai  $backendGerai
     * @return \Illuminate\Http\Response
     */
    public function edit(BackendGerai $backendGerai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BackendGerai  $backendGerai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BackendGerai $backendGerai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BackendGerai  $backendGerai
     * @return \Illuminate\Http\Response
     */
    public function destroy(BackendGerai $backendGerai, $id)
    {
        $backendGerai = BackendGerai::find($id);
        $backendGerai->delete();
        return redirect()->back()->with('success', 'Gerai berhasil di hapus');
    }

    public function tambahGerai(BackendGerai $backendGerai)
    {
        $userId = auth()->user()->id;
        $namaUser = auth()->user()->name;
        $backendGerai->nomor_hp_bisnis_developer = '081263245005';
        $backendGerai->bisnis_developer = 'arnold';
        return view('backend/addeditgerai', [
            "title" => "KMD - Komunitas Mitra Desa",
            "menu" => "Form Tambah Tambah Gerai",
            "userId" => $userId,
            "namaUser" => $namaUser,
            "backendGerai" => $backendGerai,
            "action" => 'add',
        ]);
    }

    public function saveformgerai(Request $request)
    {
        // return $request->action;
        $data = request()->except(['_token']);
        if ($request->action == "add") {
            if ($request->file('picture_path_ktp')) {
                // menyimpan data file yang diupload ke variabel $file
                $file = $request->file('picture_path_ktp');
                // dd($request->file('picture_path'));
                $nama_file = time() . "_" . $file->getClientOriginalName();

                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'storage/assets/backendGerai/ktp/';
                // upload file
                $file->move($tujuan_upload, $nama_file);
                $data['picture_path_ktp'] = $nama_file;
            }
            if ($request->file('picture_path_profile')) {
                // menyimpan data file yang diupload ke variabel $file
                $file = $request->file('picture_path_profile');
                // dd($request->file('picture_path'));
                $nama_file = time() . "_" . $file->getClientOriginalName();

                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'storage/assets/backendGerai/profile/';
                // upload file
                $file->move($tujuan_upload, $nama_file);
                $data['picture_path_profile'] = $nama_file;
            }


            BackendGerai::create($data);
            // return $request;
        return redirect()->route('backend.gerai')->with('success', 'Gerai telah ditambahkan');
        }

        if ($request->action == "edit") {
            // return $request->id;
            if ($request->file('picture_path_kategori_berita')) {
                // menyimpan data file yang diupload ke variabel $file
                $file = $request->file('picture_path_kategori_berita');
                // dd($request->file('picture_path_kategori_berita'));
                $nama_file = time() . "_" . $file->getClientOriginalName();
                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'storage/assets/categorynews/';

                // upload file
                $file->move($tujuan_upload, $nama_file);

                $result = BackendGerai::where('id', $request->id)->update([
                    'picture_path_kategori_berita' => $nama_file,
                    'edited_by' => $request->edited_by,
                ]);

                // return response()->json([$result]);
                return redirect()->route('backend.kategori.berita')->with('success', 'Gambar Kategori Berita telah diedit');
            }

            $data = $request->except(['_token', 'action']);
            BackendGerai::where('id', $request->id)->update($data);
            return redirect()->route('backend.kategori.berita')->with('success', 'Kategori Berita telah diedit');
        }
    }

    public function pendaftarGeraiBaru()
    {
        $user = auth()->user()->id;
        $gerai = BackendGerai::where('status_gerai', 'pembayaran sedang diproses')-> get();
        return view('backend/backendpendaftargeraibaru', [
            "title" => "KMD - Komunitas Mitra Desa",
            "menu" => "Pendaftar Gerai Baru",
            "creator" => $user,
            "gerai" => $gerai,
        ]);
    }

    public function geraiDalamProses()
    {
        $user = auth()->user()->id;
        $gerai = BackendGerai::where('status_gerai', 'dalam proses')-> get();
        return view('backend/backendgeraidalamproses', [
            "title" => "KMD - Komunitas Mitra Desa",
            "menu" => "Pendaftar Gerai Dalam Proses",
            "creator" => $user,
            "gerai" => $gerai,
        ]);
    }

    public function geraiDitolak()
    {
        $user = auth()->user()->id;
        $gerai = BackendGerai::where('status_gerai', 'tidak sesuai')-> get();
        return view('backend/backendgeraiditolak', [
            "title" => "KMD - Komunitas Mitra Desa",
            "menu" => "Pendaftar Gerai Baru Ditolak",
            "creator" => $user,
            "gerai" => $gerai,
        ]);
    }

    public function geraiDiterima()
    {
        $user = auth()->user()->id;
        $gerai = BackendGerai::where('status_gerai', 'sudah bayar')-> get();
        return view('backend/backendgeraiditerima', [
            "title" => "KMD - Komunitas Mitra Desa",
            "menu" => "Gerai Diterima",
            "creator" => $user,
            "gerai" => $gerai,
        ]);
    }
}
