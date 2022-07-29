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
          <a href="{{ route('backendHeaderMobile.create') }}" class="btn btn-warning btn-sm">{{ ucwords('tambah foto header mobile') }}</a>
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
                      <th width="10px">{{ ucwords('foto header mobile') }}</th>
                      <th width="10px">{{ ucwords('Created At') }}</th>
                      <th width="10px">{{ ucwords('Updated At') }}</th>
                      <th width="0.1%">{{ ucwords('OPSI') }}</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($headerMobile as $item)
                  <tr>
                      <td><img width="150px" src="{{ url('/storage/assets/header/mobile'.$item->picture_path_header_mobile) }}"></td>
                      <td>{{ $item->created_at }}</td>
                      <td>{{ $item->updated_at }}</td>
                      <td>
                          <a href="{{ route('berita.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                          <form action="{{ route('berita.destroy', $item->id) }}" method="POST" class="d-inline">
                              {!! method_field('post') . csrf_field() !!}
                              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Hapus Data ?')">
                                  Delete
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
