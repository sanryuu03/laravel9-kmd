  @extends('backend.layouts.main')

  @section('menuContent')
  <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper">
      <div class="mb-4 d-sm-flex align-items-center justify-content-between">
          <h1 class="mb-0 text-gray-800 h3">Backend
              <a href="{{ route('backendHeader.index') }}" class="btn btn-primary btn-sm">{{ ucwords('header web') }}</a>
              <a href="{{ route('backendHeaderMobile.index') }}" class="btn btn-info btn-sm">{{ ucwords('header mobile') }}</a>
          </h1>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
          </ol>
      </div>
  </div>
  <!---Container Fluid-->
  @can('header')
  <div class="container-fluid" id="container-wrapper">
      <div class="mb-4 d-sm-flex align-items-center justify-content-between">
          <a href="{{ route('backendHeader.create') }}" class="btn btn-warning btn-sm">{{ ucwords('tambah foto header web') }}</a>
      </div>
  </div>
  @if(session()->has('success'))
  <div class="mt-5 alert alert-success" role="alert">
      {{ session('success') }}
  </div>
  @endif
  <div class="container-fluid">
      <div class="card-body table-responsive">
          <table class="table table-bordered table-striped">
              <thead>
                  <tr>
                      <th width="10px">{{ ucwords('foto header web') }}</th>
                      <th width="10px">{{ ucwords('Created At') }}</th>
                      <th width="10px">{{ ucwords('Updated At') }}</th>
                      <th width="5%">{{ ucwords('OPSI') }}</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($headerWeb as $item)
                  <tr>
                      <td><img width="150px" src="{{ url('/storage/assets/header/web/'.$item->picture_path_header_web) }}"></td>
                      <td>{{ $item->created_at }} WIB</td>
                      <td>{{ $item->updated_at }} WIB</td>
                      <td>
                          <a href="{{ route('backendHeader.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pencil"></i></a>
                          <form action="{{ route('backendHeader.destroy', $item->id) }}" method="POST" class="d-inline">
                              @csrf
                              @method('delete')
                              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Hapus Data ?')">
                                  <i class="fa-solid fa-trash-can"></i>
                              </button>
                          </form>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
  </div>
  @endcan
  @endsection
