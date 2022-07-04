  @extends('backend.layouts.main')

  @section('menuContent')
  <!-- Container Fluid-->

  <style>
      trix-toolbar [data-trix-button-group="file-tools"] {
          display: none;
      }

  </style>
  <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">{{ $menu }}</h1>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $menu }}</li>
          </ol>
      </div>
  </div>
  @if(session()->has('success'))
  <div class="alert alert-success mt-5" role="alert">
      {{ session('success') }}
  </div>
  @endif


  <!-- Header Start-->
  <div class="card mx-3 my-3">
      <div class="card-body">
          <div class="container-fluid">
              <form method="post" action="{{ route('save.form.gerai') }}" enctype="multipart/form-data">
                  {{ csrf_field() }}

                  <div class="form-group">
                      <label>Nomor HP Bisnis Developer</label>
                      <input type="hidden" name="id" class="form-control" value="{{ old('backendVerifikasiPembayaranGerai', $backendVerifikasiPembayaranGerai->id) }}">
                      <input type="hidden" name="users_id" class="form-control" value="{{ $userId }}">
                      <input type="text" readonly name="nomor_hp_bisnis_developer" class="form-control @error('nomor_hp_bisnis_developer') is-invalid @enderror" value="{{ old('nomor_hp_bisnis_developer', $backendVerifikasiPembayaranGerai->nomor_hp_bisnis_developer) }}">
                      @error('nomor_hp_bisnis_developer')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Bisnis Developer</label>
                      <input type="text" readonly name="bisnis_developer" class="form-control @error('bisnis_developer') is-invalid @enderror" value="{{ old('bisnis_developer', $backendVerifikasiPembayaranGerai->bisnis_developer) }}">
                      @error('bisnis_developer')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Nama Gerai</label>
                      <input type="text" name="nama_gerai" class="form-control @error('nama_gerai') is-invalid @enderror" value="{{ old('nama_gerai', $backendVerifikasiPembayaranGerai->nama_gerai) }}">
                      @error('nama_gerai')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Nama Pengelola</label>
                      <input type="text" name="nama_pengelola" class="form-control @error('nama_pengelola') is-invalid @enderror" value="{{ old('nama_pengelola', $backendVerifikasiPembayaranGerai->nama_pengelola) }}">
                      @error('nama_pengelola')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>NIK Pengelola</label>
                      <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik', $backendVerifikasiPembayaranGerai->nik) }}">
                      @error('nik')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Telp</label>
                      <input type="text" name="telp" class="form-control @error('telp') is-invalid @enderror" value="{{ old('telp', $backendVerifikasiPembayaranGerai->telp) }}">
                      @error('telp')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>WA</label>
                      <input type="text" name="wa" class="form-control @error('wa') is-invalid @enderror" value="{{ old('wa', $backendVerifikasiPembayaranGerai->wa) }}">
                      @error('wa')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Biaya Pembukaan Gerai</label>
                      <input type="text" readonly name="biaya_pembukaan_gerai" class="form-control @error('biaya_pembukaan_gerai') is-invalid @enderror" value="{{ old('biaya_pembukaan_gerai', $backendVerifikasiPembayaranGerai->biaya_pembukaan_gerai) }}">
                      @error('biaya_pembukaan_gerai')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Rekening Pembayaran</label>
                      <input type="text" readonly name="rekening_pembayaran" class="form-control @error('rekening_pembayaran') is-invalid @enderror" value="{{ old('rekening_pembayaran', $backendVerifikasiPembayaranGerai->rekening_pembayaran) }}">
                      @error('rekening_pembayaran')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Nomor Rekening</label>
                      <input type="text" readonly name="nomor_rekening" class="form-control @error('nomor_rekening') is-invalid @enderror" value="{{ old('nomor_rekening', $backendVerifikasiPembayaranGerai->nomor_rekening) }}">
                      @error('nomor_rekening')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Atas Nama</label>
                      <input type="text" readonly name="atas_nama_rekening" class="form-control @error('atas_nama_rekening') is-invalid @enderror" value="{{ old('atas_nama_rekening', $backendVerifikasiPembayaranGerai->atas_nama_rekening) }}">
                      @error('atas_nama_rekening')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Slip Pembayaran <span class="font-weight-bold text-danger">(Ukuran Gambar Max 2MB)</span></label>
                      <input type="file" name="picture_path_ktp" class="form-control @error('picture_path_ktp') is-invalid @enderror" value="{{ url('/storage/assets/backendVerifikasiPembayaranGerai/ktp/'.$backendVerifikasiPembayaranGerai->picture_path_ktp) }}">
                      @error('picture_path_ktp')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      @if($action == "add")
                      <label>Di Posting Oleh</label>
                      <input type="text" readonly name="post_by" class="form-control" value="{{ old('post_by', $namaUser) }}">
                      @else
                      <label>Di Edit Oleh</label>
                      <input type="text" readonly name="edited_by" class="form-control" value="{{ old('edited_by', $namaUser) }}">
                      @endif
                  </div>

                  <a class="btn btn-danger mt-3" href="{{ route('backend.gerai') }}">Back</a>
                  <button type="submit" class="btn btn-primary mt-3" name="action" value="{{ $action }}">Save</button>
              </form>
          </div>
      </div>
  </div>
  <!-- Header End-->

  <!---Container Fluid-->
  @endsection
