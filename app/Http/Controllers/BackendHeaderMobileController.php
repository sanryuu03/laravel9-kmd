<?php

namespace App\Http\Controllers;

use App\Models\BackendHeaderMobile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BackendHeaderMobileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $headerMobile = BackendHeaderMobile::get();
        View::share([
            "headerMobile" => $headerMobile,
        ]);

    }

    public function index()
    {
        return view('backend/backendHeaderMobile', [
            "title" => "KMD - Komunitas Mitra Desa",
            "menu" => ucwords('header mobile'),
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
     * @param  \App\Models\BackendHeaderMobile  $backendHeaderMobile
     * @return \Illuminate\Http\Response
     */
    public function show(BackendHeaderMobile $backendHeaderMobile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BackendHeaderMobile  $backendHeaderMobile
     * @return \Illuminate\Http\Response
     */
    public function edit(BackendHeaderMobile $backendHeaderMobile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BackendHeaderMobile  $backendHeaderMobile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BackendHeaderMobile $backendHeaderMobile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BackendHeaderMobile  $backendHeaderMobile
     * @return \Illuminate\Http\Response
     */
    public function destroy(BackendHeaderMobile $backendHeaderMobile)
    {
        //
    }
}
