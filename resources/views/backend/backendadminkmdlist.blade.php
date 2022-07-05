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
          <a href="{{ route('backend.tambah.gerai') }}" class="btn btn-primary btn-sm mb-1">Tambahkan Admin</a>
      </div>
  </div>
  <!---Container Fluid-->
  <div class="container-fluid">
      <div class="card-body">
          <table id="table_id" class="table table-bordered table-striped table-anggota">
              <thead>
                  <tr>
                      <th width="0.1%">No</th>
                      <th width="1%">Nama Akun</th>
                      <th width="1%">Telp</th>
                      <th width="1%">WA</th>
                      <th width="1%">Roles</th>
                      <th width="1%">Permissions</th>
                      <th width="1%">Created At</th>
                      <th width="1%">Di Buat Oleh</th>
                      <th width="1%">Updated At</th>
                      <th width="1%">Di Edit Oleh</th>
                      <th width="0.1%">OPSI</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($users as $user)
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->telp }}</td>
                      <td>{{ $user->wa }}</td>
                      <td>
                          @foreach($user->roles as $role)
                          <span class="badge bg-warning">{{ $role->name }}</span>
                          @endforeach
                      </td>
                      <td>
                          @foreach($user->Permissions as $Permission)
                          <span class="badge bg-danger">{{ $Permission->name }}</span>
                          @endforeach
                      </td>
                      <td>{{ date('d-M-y H:i', strtotime($user->created_at)) }} WIB</td>
                      <td>{{ $user->post_by }}</td>
                      <td>{{ date('d-M-y H:i', strtotime($user->updated_at)) }} WIB</td>
                      <td>{{ $user->edited_by }}</td>
                      <td>
                          <a href="{{ route('backend.profile.gerai', $user->id) }}" class="btn btn-primary btn-sm mb-1"><i class="fa-solid fa-eye"></i></a>
                          <a href="{{ route('backend.profile.gerai', $user->id) }}" class="btn btn-warning btn-sm mb-1"><i class="fa-solid fa-pencil"></i></a>
                          <form action="{{ route('backend.destroy.gerai', $user->id) }}" method="POST" class="d-inline">
                              {!! method_field('post') . csrf_field() !!}
                              <button type="submit" class="btn btn-danger btn-sm">
                                  <i class="fa-solid fa-trash"></i>
                              </button>
                          </form>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
  </div>
  @endsection
