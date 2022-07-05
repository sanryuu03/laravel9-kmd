  @extends('backend.layouts.main')

  @section('menuContent')
  <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Backend <small>{{ $menu }}</small></h1>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $menu }}</li>
          </ol>
      </div>
  </div>
    @if(session()->has('success'))
  <div class="alert alert-success" role="alert">
      {{ session('success') }}
  </div>
  @elseif(session()->has('error'))
  <div class="alert alert-danger" role="alert">
      {{ session('error') }}
  </div>
  @endif
        <div class="row">
          <div class="col-md-4">
              <a href="{{ route('backend.tambah.gerai') }}" class="btn btn-primary btn-sm mb-1">Tambahkan Gerai</a>
          </div>
      </div>
  <!---Container Fluid-->
  <div class="container-fluid">
      <div class="card-body">
          <table id="table_id" class="table table-bordered table-striped table-anggota">
              <thead>
                  <tr>
                      <th width="0.1%">No</th>
                      <th width="1%">Status Gerai</th>
                      <th width="1%">Nama Gerai</th>
                      <th width="1%">Nama Pengelola</th>
                      <th width="1%">WA</th>
                      <th width="1%">Rekening</th>
                      <th width="1%">Nomor Rekening</th>
                      <th width="1%">NPWP</th>
                      <th width="1%">Created At</th>
                      <th width="1%">Di Buat Oleh</th>
                      <th width="1%">Updated At</th>
                      <th width="1%">Di Edit Oleh</th>
                      <th width="0.1%">OPSI</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($gerai as $item)
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                      @if($item->status_gerai == 'pembayaran sedang diproses')
                      <td><a href="{{ route('backend.verifikasi.pembayaran.gerai.baru', $item->id) }}" class="btn btn-info btn-sm mb-1">{{ $item->status_gerai }}</a></td>
                      @else
                      <td><a href="{{ route('backend.show.verifikasi.pembayaran.gerai', $item->id) }}" class="btn btn-success btn-sm mb-1">{{ $item->status_gerai }}</a></td>
                      @endif
                      <td>{{ $item->nama_gerai }}</td>
                      <td>{{ $item->nama_pengelola }}</td>
                      <td>{{ $item->wa }}</td>
                      <td>{{ $item->rekening_bank }}</td>
                      <td>{{ $item->nomor_rekening }}</td>
                      <td>{{ $item->npwp }}</td>
                      <td>{{ date('d-M-y H:i', strtotime($item->created_at)) }} WIB</td>
                      <td>{{ $item->post_by }}</td>
                      <td>{{ date('d-M-y H:i', strtotime($item->updated_at)) }} WIB</td>
                      <td>{{ $item->edited_by }}</td>
                      <td>
                      @if($item->status_gerai != 'belum bayar')
                          <a href="{{ route('backend.profile.gerai', $item->id) }}" class="btn btn-primary btn-sm mb-1"><i class="fa-solid fa-eye"></i></a>
                          <a href="{{ route('backend.profile.gerai', $item->id) }}" class="btn btn-warning btn-sm mb-1"><i class="fa-solid fa-pencil"></i></a>
                          <form action="{{ route('backend.destroy.gerai', $item->id) }}" method="POST" class="d-inline">
                              {!! method_field('post') . csrf_field() !!}
                              <button type="submit" class="btn btn-danger btn-sm">
                                  <i class="fa-solid fa-trash"></i>
                              </button>
                          </form>
                      @else
                          <form action="{{ route('backend.destroy.gerai', $item->id) }}" method="POST" class="d-inline">
                              {!! method_field('post') . csrf_field() !!}
                              <button type="submit" class="btn btn-danger btn-sm">
                                  <i class="fa-solid fa-trash"></i>
                              </button>
                          </form>
                      @endif
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
  </div>
  @endsection
