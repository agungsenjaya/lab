<nav class="navbar navbar-light bg-primary">
    <div class="container">
    <a class="navbar-brand text-white" href="{{ route('admin.dashboard') }}">
        <img src="{{ asset('img/logo.svg') }}" alt="" width="40" class="d-inline-block align-middle me-2"><span class="title-3 fw-bold h5">Admin</span>
    </a>
    <ul class="nav ms-auto nav-top d-flex align-items-center">
    <li class="nav-item align-self-center">
        <a class="nav-link"><span class="badge p-2 px-4 alert-primary text-uppercase">{{ Auth::user()->cabang->kode  }}</span></a>
    </li>
      <li class="nav-item">
        <a type="button" class="nav-link px-0 fw-bold h5 m-0" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
          Menu<i class="ms-2 bi bi-list"></i>
        </a>
      </li>
    </ul>
  </div>
</nav>
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title fw-bold" id="offcanvasExampleLabel">Menu Admin</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body px-0">
  <div class="list-group list-group-flush line-h-2">
  <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action"> <i class="text-primary bi bi-archive me-3"></i>Home</a>
  <a href="{{ route('admin.pasien') }}" class="list-group-item list-group-item-action"> <i class="text-primary bi bi-card-list me-3"></i>Table Pasien</a>
  <a href="{{ route('admin.pasien_new') }}" class="list-group-item list-group-item-action"> <i class="text-primary bi bi-clipboard-plus me-3"></i>Input Pasien</a>
  <a href="{{ route('admin.dokter') }}" class="list-group-item list-group-item-action"> <i class="text-primary bi bi-person me-3"></i>Dokter</a>
  <a href="{{ route('admin.info') }}" class="list-group-item list-group-item-action"> <i class="text-primary bi bi-info-circle me-3"></i>Informasi Lab</a>
  <a href="javascript:void(0)" class="list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#modalLogout"><i class="text-primary bi bi-slash-circle me-3"></i>Logout Account</a>
</div>
  </div>
</div>