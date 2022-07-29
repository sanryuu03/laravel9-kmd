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
  <div class="mx-3 my-3 card">
      <div class="card-body">
          <div class="container-fluid">

              <form method="post" action="{{ route('backendHeader.store') }}" enctype="multipart/form-data">
                  {{ csrf_field() }}

                  <div class="form-group">
                      <label>{{ ucwords('foto header web') }}</label>
                      <input type="hidden" name="id" class="form-control" value="{{ $backendHeader->id }}">
                      @if($backendHeader->picture_path_header_web)
                      <div><img width="150px" src="{{ url('/storage/assets/header/web/'.$backendHeader->picture_path_header_web) }}"></div>
                      <input type="file" name="picture_path_header_web" class="form-control @error('picture_path_header_web') is-invalid @enderror" value="{{ url('/storage/assets/header/web'.$backendHeader->picture_path_header_web) }}">
                      @else
                      <input type="file" name="picture_path_header_web" class="form-control @error('picture_path_header_web') is-invalid @enderror" value="{{ url('/storage/assets/header/web'.$backendHeader->picture_path_header_web) }}">
                      @endif
                      @error('picture_path_header_web')
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

                  <button type="submit" class="mt-3 btn btn-primary" name="action" value="{{ $action }}">Save</button>
                  <a class="mt-3 btn btn-danger" href="{{ route('backendHeader.index') }}">Back</a>
              </form>
          </div>
      </div>
  </div>
  @endcan
  @endsection
