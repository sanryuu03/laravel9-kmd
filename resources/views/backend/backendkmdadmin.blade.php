  @extends('backend.layouts.main')

  @section('menuContent')
  <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Backend <small>{{ $menu }}</small></h1>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
          </ol>
      </div>
  </div>
  <!---Container Fluid-->
@can('kepengurusan perusahaan')

  <div class="container-fluid">
      <div class="card-body">
          <div class="row mb-3">
              <!-- New User Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card h-100">
                      <a href="{{  url('/backendKMDAdmin/adminKMD') }}" class="d-flex">
                      <div class="card-body">
                          <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-uppercase mb-1">Admin</div>
                                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $geraiBaru }}</div>
                                  <div class="mt-2 mb-0 text-muted text-xs">
                                      <span>Admin KMD</span>
                                  </div>
                              </div>
                              <div class="col-auto">
                                  <i class="fas fa-users fa-2x text-info"></i>
                              </div>
                          </div>
                      </div>
                      </a>
                  </div>
              </div>
              <!-- Dalam Proses Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card h-100">
                      <a href="{{  url('/backendKMDAdmin/geraiDalamProses') }}" class="d-flex">
                      <div class="card-body">
                          <div class="row align-items-center">
                              <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-uppercase mb-1">Roles</div>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $geraiDalamProses }}</div>
                                  <div class="mt-2 mb-0 text-muted text-xs">
                                      <span>Roles Admin</span>
                                  </div>
                              </div>
                              <div class="col-auto">
                                  <i class="fas fa-user-gear fa-2x text-warning"></i>
                              </div>
                          </div>
                      </div>
                      </a>
                  </div>
              </div>
              <!-- Ditolak Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card h-100">
                      <a href="{{  url('/backendKMDAdmin/geraiDitolak') }}" class="d-flex">
                      <div class="card-body">
                          <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-uppercase mb-1">Permissions</div>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $geraiDiTolak }}</div>
                                  <div class="mt-2 mb-0 text-muted text-xs">
                                      <span>Permissions Roles</span>
                                  </div>
                              </div>
                              <div class="col-auto">
                                  <i class="fas fa-user-lock fa-2x text-danger"></i>
                              </div>
                          </div>
                      </div>
                      </a>
                  </div>
              </div>
          </div>
      </div>
</div>
@endcan
  @endsection
