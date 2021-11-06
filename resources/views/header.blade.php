<nav class="navbar navbar-light bg-primary">
    <div class="container">
    <a class="navbar-brand text-white" href="{{ route('admin.dashboard') }}">
        <img src="{{ asset('img/logo.svg') }}" alt="" width="40" class="d-inline-block align-middle mr-2"><span class="title-3 text-uppercase font-weight-bold h5">Labora</span>
    </a>
    <ul class="nav ml-auto nav-top d-flex align-items-center">
    <li class="nav-item">
    <div class="input-group input-group-sm bg-white rounded-pill">
   <div class="input-group-prepend">
     <button class="btn pr-0 pl-2" type="button">
       <img src="{{ asset('img/search.svg') }}" alt="" width="18" class="d-flex align-items-center">
      </button>
    </div>
    <input type="text" class="form-control border-0 bg-transparent" placeholder="Cari nik pasien" aria-label="" aria-describedby="">
  </div>

      </li>
      <li class="nav-item">
        <a class="nav-link" href="javascript:void(0)"><i class="ms-Icon ms-Icon--Ringer"></i></a>
      </li>
        <li class="nav-item">
          <div class="divider-top border-left border-white"></div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="align-middle text-uppercase">Account</span>
      <img src="https://dummyimage.com/200x200" width="40" alt="" class="align-middle ml-3 rounded-pill">
        </a>
        <div class="dropdown-menu dropdown-menu-right animate__animated animate__fadeInDown animate__faster" aria-labelledby="navbarDropdown">
          <h6 class="dropdown-header text-uppercase">Your Account</h6>
          <a class="dropdown-item" href="javascript:void(0)"><i class="ms-Icon ms-Icon--PlayerSettings mr-2"></i>Setting Account</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#modalLogout"><i class="ms-Icon ms-Icon--SignOut mr-2"></i>Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>