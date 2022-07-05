<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BackendGerai;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\BackendKomunitasMitraDesa;

class BackendKomunitasMitraDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->geraiBaru = BackendGerai::where('status_gerai', 'pembayaran sedang diproses')-> get();
        $this->geraiDalamProses = BackendGerai::where('status_gerai', 'dalam proses')-> get();
        $this->geraiDiTolak = BackendGerai::where('status_gerai', 'tidak sesuai')-> get();
        $this->geraiDiterima = BackendGerai::where('status_gerai', 'sudah bayar')-> get();

        $hitungGeraiBaru = count($this->geraiBaru);
        $hitungGeraiDalamProses = count($this->geraiDalamProses);
        $hitungGeraiDiTolak = count($this->geraiDiTolak);
        $hitungGeraiDiterima = count($this->geraiDiterima);
        // return $hitungUserDiterima;
        $pendaftarBaru = $hitungGeraiBaru > 0 ? $hitungGeraiBaru:0;
        $dalamProses = $hitungGeraiDalamProses > 0 ? $hitungGeraiDalamProses:0;
        $diTolak = $hitungGeraiDiTolak > 0 ? $hitungGeraiDiTolak:0;
        $geraiDiterima = $hitungGeraiDiterima > 0 ? $hitungGeraiDiterima:0;
        // dd($pendaftarBaru);
        View::share([
            'geraiBaru' => $pendaftarBaru,
            'geraiDalamProses' => $dalamProses,
            'geraiDiTolak' => $diTolak,
            'geraiDiterima' => $geraiDiterima,
        ]);

    }

    public function index()
    {
        $user = auth()->user()->id;
        return view('backend/index', [
            "title" => "KMD - Komunitas Mitra Desa",
            "menu" => "Backend",
            "creator" => $user,
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guest();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
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

    public function backendKMDAdmin()
    {
        $user = auth()->user()->id;
        // foreach($users as $user){
            //     foreach($user->roles as $role) {
                //         return $role->name;
                //     }
        // }
        return view('backend/backendkmdadmin', [
            "title" => "KMD - Komunitas Mitra Desa",
            "menu" => "KMD Admin",
            "creator" => $user,
        ]);
    }

    public function backendKMDAdminList()
    {
        $user = auth()->user()->id;
        $users = User::paginate(10);
        return view('backend/backendadminkmdlist', [
            "title" => "KMD - Komunitas Mitra Desa",
            "menu" => "Gerai Diterima",
            "creator" => $user,
            "users" => $users,
        ]);
    }
}
