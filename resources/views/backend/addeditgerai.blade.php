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
                      <input type="hidden" name="id" class="form-control" value="{{ $backendGerai->id }}">
                      <input type="hidden" name="users_id" class="form-control" value="{{ $userId }}">
                      <input type="text" readonly name="nomor_hp_bisnis_developer" class="form-control @error('nomor_hp_bisnis_developer') is-invalid @enderror" value="{{ old('nomor_hp_bisnis_developer', $backendGerai->nomor_hp_bisnis_developer) }}">
                      @error('nomor_hp_bisnis_developer')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Bisnis Developer</label>
                      <input type="text" readonly name="bisnis_developer" class="form-control @error('bisnis_developer') is-invalid @enderror" value="{{ old('bisnis_developer', $backendGerai->bisnis_developer) }}">
                      @error('bisnis_developer')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Nama Gerai</label>
                      <input type="text" name="nama_gerai" class="form-control @error('nama_gerai') is-invalid @enderror" value="{{ old('nama_gerai', $backendGerai->nama_gerai) }}">
                      @error('nama_gerai')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Nama Pengelola</label>
                      <input type="text" name="nama_pengelola" class="form-control @error('nama_pengelola') is-invalid @enderror" value="{{ old('nama_pengelola', $backendGerai->nama_pengelola) }}">
                      @error('nama_pengelola')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>NIK</label>
                      <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik', $backendGerai->nik) }}">
                      @error('nik')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Telp</label>
                      <input type="text" name="telp" class="form-control @error('telp') is-invalid @enderror" value="{{ old('telp', $backendGerai->telp) }}">
                      @error('telp')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>WA</label>
                      <input type="text" name="wa" class="form-control @error('wa') is-invalid @enderror" value="{{ old('wa', $backendGerai->wa) }}">
                      @error('wa')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Tempat Lahir</label>
                      <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{ old('tempat_lahir', $backendGerai->tempat_lahir) }}">
                      @error('tempat_lahir')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Tanggal Lahir</label>
                      <input type="text" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" placeholder="YYYY/MM/DD" value="{{ old('tanggal_lahir', $backendGerai->tanggal_lahir) }}">
                      @error('tanggal_lahir')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <input type="text" name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" value="{{ old('jenis_kelamin', $backendGerai->jenis_kelamin) }}">
                      @error('jenis_kelamin')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Status Pernikahan</label>
                      <input type="text" name="status_pernikahan" class="form-control @error('status_pernikahan') is-invalid @enderror" value="{{ old('status_pernikahan', $backendGerai->status_pernikahan) }}">
                      @error('status_pernikahan')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="mb-3">
                      <label>Provinsi <span class="text-danger">*</span></label>
                      <select class="custom-select" name="provinsi" id="provinsi">
                          <option selected>Pilih Provinsi Anda</option>
                          {{-- @foreach ($provinces as $provinsi)
                          <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
                          @endforeach --}}
                      </select>
                  </div>
                  <div class="mb-3">
                      <label>Kabupaten / Kota <span class="text-danger">*</span></label>
                      <select class="custom-select" name="kota" id="kota">
                          <option selected>Pilih Kabupaten / Kota Anda</option>
                      </select>
                  </div>
                  <div class="mb-3">
                      <label>Kecamatan <span class="text-danger">*</span></label>
                      <select class="custom-select" name="kecamatan" id="kecamatan">
                          <option selected>Pilih Kecamatan Anda</option>
                      </select>
                  </div>
                  <div class="mb-3">
                      <label>Desa / Kelurahan <span class="text-danger">*</span></label>
                      <select class="custom-select" name="desa" id="desa">
                          <option selected>Pilih Desa / Kelurahan Anda</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Lingkungan / Dusun</label>
                      <input type="text" name="lingkungan" class="form-control @error('lingkungan') is-invalid @enderror" value="{{ old('lingkungan', $backendGerai->lingkungan) }}">
                      @error('lingkungan')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat', $backendGerai->alamat) }}">
                      @error('alamat')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Agama</label>
                      <input type="text" name="agama" class="form-control @error('agama') is-invalid @enderror" value="{{ old('agama', $backendGerai->agama) }}">
                      @error('agama')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Pendidikan</label>
                      <input type="text" name="pendidikan" class="form-control @error('pendidikan') is-invalid @enderror" value="{{ old('pendidikan', $backendGerai->pendidikan) }}">
                      @error('pendidikan')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Keahlian</label>
                      <input type="text" name="keahlian" class="form-control @error('keahlian') is-invalid @enderror" value="{{ old('keahlian', $backendGerai->keahlian) }}">
                      @error('keahlian')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Pekerjaan</label>
                      <input type="text" name="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror" value="{{ old('pekerjaan', $backendGerai->pekerjaan) }}">
                      @error('pekerjaan')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Rekening Bank</label>
                      <input type="text" name="rekening_bank" class="form-control @error('rekening_bank') is-invalid @enderror" value="{{ old('rekening_bank', $backendGerai->rekening_bank) }}">
                      @error('rekening_bank')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Nomor Rekening</label>
                      <input type="text" name="nomor_rekening" class="form-control @error('nomor_rekening') is-invalid @enderror" value="{{ old('nomor_rekening', $backendGerai->nomor_rekening) }}">
                      @error('nomor_rekening')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>NPWP</label>
                      <input type="text" name="npwp" class="form-control @error('npwp') is-invalid @enderror" value="{{ old('npwp', $backendGerai->npwp) }}">
                      @error('npwp')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Foto KTP <span class="font-weight-bold text-danger">(Ukuran Gambar Max 2MB)</span></label>
                      <input type="file" name="picture_path_ktp" class="form-control @error('picture_path_ktp') is-invalid @enderror" value="{{ url('/storage/assets/backendGerai/ktp/'.$backendGerai->picture_path_ktp) }}">
                      @error('picture_path_ktp')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label>Foto Profile <span class="font-weight-bold text-danger">(Ukuran Gambar Max 2MB)</span></label>
                      <input type="file" name="picture_path_profile" class="form-control @error('picture_path_profile') is-invalid @enderror" value="{{ url('/storage/assets/backendGerai/profile'.$backendGerai->picture_path_profile) }}">
                      @error('picture_path_profile')
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
