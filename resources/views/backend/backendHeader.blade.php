  @extends('backend.layouts.main')

  @section('menuContent')
  <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper">
      <div class="mb-4 d-sm-flex align-items-center justify-content-between">
          <h1 class="mb-0 text-gray-800 h3">Backend <small>{{ $menu }}</small></h1>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
          </ol>
      </div>
  </div>
  <!---Container Fluid-->
@can('header')

  <div class="container-fluid">
      <div class="card-body">
          <div class="mb-3 row">
              <!-- New User Card Example -->
              <div class="mb-4 col-xl-3 col-md-6">
                  <div class="card h-100">
                      <a href="{{  url('/backendKMDAdmin/adminKMD') }}" class="d-flex">
                      <div class="card-body">
                          <div class="row no-gutters align-items-center">
                              <div class="mr-2 col">
                                  <div class="mb-1 text-xs font-weight-bold text-uppercase">Admin</div>
                                  <div class="mt-2 mb-0 text-xs text-muted">
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
              <div class="mb-4 col-xl-3 col-md-6">
                  <div class="card h-100">
                      <a href="{{  url('/backendKMDAdmin/geraiDalamProses') }}" class="d-flex">
                      <div class="card-body">
                          <div class="row align-items-center">
                              <div class="mr-2 col">
                                  <div class="mb-1 text-xs font-weight-bold text-uppercase">Roles</div>
                                  <div class="mt-2 mb-0 text-xs text-muted">
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
              <div class="mb-4 col-xl-3 col-md-6">
                  <div class="card h-100">
                      <a href="{{  url('/backendKMDAdmin/geraiDitolak') }}" class="d-flex">
                      <div class="card-body">
                          <div class="row no-gutters align-items-center">
                              <div class="mr-2 col">
                                  <div class="mb-1 text-xs font-weight-bold text-uppercase">Permissions</div>
                                  <div class="mt-2 mb-0 text-xs text-muted">
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
