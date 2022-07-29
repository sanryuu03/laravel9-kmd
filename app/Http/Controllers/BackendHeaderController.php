<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BackendHeader;
use Illuminate\Support\Facades\View;

class BackendHeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $headerWeb = BackendHeader::get();
        View::share([
            "headerWeb" => $headerWeb,
            "title" => ucwords("KMD - Komunitas Mitra Desa"),
        ]);
    }

    public function index()
    {
        return view('backend/backendHeader', [
            "menu" => ucwords('header'),
            "creator" => auth()->user()->id,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(BackendHeader $backendHeader)
    {
        $namaUser = auth()->user()->name;
        return view('backend/backendFormHeader', [
            "menu" => ucwords('edit foto header web'),
            "creator" => "San",
            'action' => 'add',
            "backendHeader" => $backendHeader,
            'namaUser' => $namaUser,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        if ($request->action == "add") {
            if (!$request->file('picture_path_header_web')) {
                return back()
                    ->withInput()
                    ->withErrors([
                        'picture_path_header_web' => 'Gambar belum di upload '
                    ]);
            }
            $pesanError = [
                'picture_path_header_web.mimes' => 'format gambar harus jpeg,png,jpg ',
                'picture_path_header_web.max' => 'Gambar Melebihi 2MB',
            ];
            // $data = request()->except(['_token'], $pesanError);
            $data = $request->validate([
                'picture_path_header_web' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
                'post_by' => 'required',
            ], $pesanError);
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('picture_path_header_web');
            // dd($request->file('picture_path'));
            $nama_file = time() . "_" . $file->getClientOriginalName();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'storage/assets/header/web/';


            // upload file
            $file->move($tujuan_upload, $nama_file);
            $data['picture_path_header_web'] = $nama_file;
            $data['created_at'] = time();
            $data['updated_at'] = time();
            BackendHeader::create($data);
            return redirect()->route('backendHeader.index')->with('success', ucwords('foto header web telah ditambahkan'));
        }
        if ($request->action == "edit") {
            // return $request->id;
            if ($request->file('picture_path_header_web')) {
                // menyimpan data file yang diupload ke variabel $file
                $file = $request->file('picture_path_header_web');
                $nama_file = time() . "_" . $file->getClientOriginalName();
                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'storage/assets/header/web/';

                // upload file
                $file->move($tujuan_upload, $nama_file);

                $result = BackendHeader::where('id', $request->id)->update([
                    'picture_path_header_web' => $nama_file,
                    'edited_by' => $request->edited_by,
                ]);

                // return response()->json([$result]);
                return redirect()->route('backendHeader.index')->with('success', ucwords('foto header web telah diedit'));
            }
        }
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
        $namaUser = auth()->user()->name;
        return view('backend/backendFormHeader', [
            "title" => "PIKI - Sangrid",
            "menu" => ucwords('edit foto header web'),
            "creator" => "San",
            'action' => 'edit',
            "backendHeader" => $backendHeader,
            'namaUser' => $namaUser,
        ]);
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
        // return $backendHeader;
        // return $backendHeader->id;
        $namaUser = auth()->user()->name;
        $data = ['deleted_by' => $namaUser];
        $backendHeader->where('id', $backendHeader->id)
            ->update($data);
        $backendHeader->find($backendHeader->id);
        $backendHeader->delete(); //softdeletes

        return redirect()->back()->with('success', ucwords('foto header web telah dihapus'));
    }
}
