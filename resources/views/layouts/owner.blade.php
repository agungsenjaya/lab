<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="{{ asset('img/logo.svg') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

     <!-- Page loading styles-->
     <style>
      .page-loading {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        -webkit-transition: all .4s .2s ease-in-out;
        transition: all .4s .2s ease-in-out;
        background-color: #282828d9;
        opacity: 0;
        visibility: hidden;
        z-index: 9999;
      }
      .page-loading.active {
        opacity: 1;
        visibility: visible;
      }
      .page-loading-inner {
        position: absolute;
        top: 50%;
        left: 0;
        width: 100%;
        text-align: center;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        -webkit-transition: opacity .2s ease-in-out;
        transition: opacity .2s ease-in-out;
        opacity: 0;
      }
      .page-loading.active > .page-loading-inner {
        opacity: 1;
      }
      .page-loading-inner > span {
        display: block;
        font-size: 1rem;
        font-weight: normal;
        color: #fff;;
      }
      .page-spinner {
        display: inline-block;
        width: 2.75rem;
        height: 2.75rem;
        margin-bottom: .75rem;
        vertical-align: text-bottom;
        border: .15em solid #fff;
        border-right-color: transparent;
        border-radius: 50%;
        -webkit-animation: spinner .75s linear infinite;
        animation: spinner .75s linear infinite;
      }
      @-webkit-keyframes spinner {
        100% {
          -webkit-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }
      @keyframes spinner {
        100% {
          -webkit-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }
      
    </style>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://static2.sharepointonline.com/files/fabric/office-ui-fabric-core/9.6.1/css/fabric.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    @yield('css')

     <!-- Page loading scripts-->
     <script>
      (function () {
        window.onload = function () {
          var preloader = document.querySelector('.page-loading');
          preloader.classList.remove('active');
          setTimeout(function () {
            preloader.remove();
          }, 2000);
        };
      })();
      
    </script>
</head>
<body>
@include('modal')
@include('alert')
@guest
@else
    <!-- Page loading spinner-->
    <div class="page-loading active">
      <div class="page-loading-inner">
        <div class="page-spinner"></div><span class="text-uppercase title-3">Loading...</span>
      </div>
    </div>
    <div id="app">
      @if(Auth::user()->hasRole('owner'))
        <section class="">
          <div class="">
            <div class="row g-0">
              <div class="col-md-2 min-vh-100 bg-primary">
                <div class="sticky-top">
                <div class="position-absolute w-100">
              <nav class="navbar navbar-light bg-lab-2 py-2">
              <div class="container">
              <a class="navbar-brand text-white" href="#">
                    <img src="{{ asset('img/logo.svg') }}" alt="" width="40" class="d-inline-block align-middle me-2"><span class="title-3 fw-bold h5">Owner</span>
                </a>
              </div>
            </nav>
              <div class="list-group list-group-flush nav-res">
                <a href="{{ route('dashboard.owner') }}" class="list-group-item list-group-item-action {{ (Route::currentRouteName() == 'dashboard.owner')? 'active-res' : '' }}">
                  <img src="data:image/svg+xml,%3Csvg width='16' height='16' viewBox='0 0 16 16' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cg clip-path='url(%23clip0_10_34)'%3E%3Cpath d='M15.5232 8.94116H8.54412L13.1921 13.5891C13.3697 13.7667 13.6621 13.7812 13.8447 13.6091C14.9829 12.5367 15.7659 11.0912 15.9956 9.46616C16.035 9.18793 15.8041 8.94116 15.5232 8.94116V8.94116ZM15.0576 7.03528C14.8153 3.52176 12.0076 0.714119 8.49412 0.471767C8.22589 0.453237 8 0.679413 8 0.948236V7.5294H14.5815C14.8503 7.5294 15.0762 7.30352 15.0576 7.03528ZM6.58824 8.94116V1.96206C6.58824 1.68118 6.34147 1.45029 6.06353 1.48971C2.55853 1.985 -0.120585 5.04705 0.00412089 8.71675C0.132356 12.4856 3.37736 15.5761 7.14794 15.5288C8.6303 15.5103 10 15.0326 11.1262 14.2338C11.3585 14.0691 11.3738 13.727 11.1724 13.5256L6.58824 8.94116Z' fill='white'/%3E%3C/g%3E%3Cdefs%3E%3CclipPath id='clip0_10_34'%3E%3Crect width='16' height='16' fill='white'/%3E%3C/clipPath%3E%3C/defs%3E%3C/svg%3E%0A" class="me-3" alt="">Dashboard
                </a>
              <a href="javascript:void(0)" class="list-group-item list-group-item-action d-flex justify-content-between" data-bs-toggle="collapse" data-bs-target="#nav-2" aria-expanded="false">
                  <div>
                    <i class="bi bi-bank2 me-3"></i>Cabang
                  </div>
                  <div><i class="bi bi-chevron-down"></i></div>
                </a>
                <div class="collapse bg-lab-2 {{ (Route::currentRouteName() == 'owner.cabang' || Route::currentRouteName() == 'owner.cabang_new' || Route::currentRouteName() == 'owner.cabang_detail' || Route::currentRouteName() == 'owner.laporan') ?  'show' : '' }}" id="nav-2" style="">

                <div class="list-group list-group-flush nav-res">
                  <a href="{{ route('owner.cabang') }}" class="list-group-item list-group-item-action {{ (Route::currentRouteName() == 'owner.cabang' || Route::currentRouteName() == 'owner.cabang_detail' || Route::currentRouteName() == 'owner.laporan')? 'active-res' : '' }}"><i class="bi bi-dot me-3"></i>Table Cabang</a>
                  <a href="{{ route('owner.cabang_new') }}" class="list-group-item list-group-item-action {{ (Route::currentRouteName() == 'owner.cabang_new')? 'active-res' : '' }}"><i class="bi bi-dot me-3"></i>Tambah Cabang</a>
                </div>
                
              </div>

              <a href="javascript:void(0)" class="list-group-item list-group-item-action d-flex justify-content-between" data-bs-toggle="collapse" data-bs-target="#nav-3" aria-expanded="false">
                  <div>
                    <img src="data:image/svg+xml,%3Csvg width='16' height='16' viewBox='0 0 16 16' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M2.4 7.19999C3.2825 7.19999 4 6.48249 4 5.59999C4 4.71749 3.2825 3.99999 2.4 3.99999C1.5175 3.99999 0.8 4.71749 0.8 5.59999C0.8 6.48249 1.5175 7.19999 2.4 7.19999ZM13.6 7.19999C14.4825 7.19999 15.2 6.48249 15.2 5.59999C15.2 4.71749 14.4825 3.99999 13.6 3.99999C12.7175 3.99999 12 4.71749 12 5.59999C12 6.48249 12.7175 7.19999 13.6 7.19999ZM14.4 7.99999H12.8C12.36 7.99999 11.9625 8.17749 11.6725 8.46499C12.68 9.01749 13.395 10.015 13.55 11.2H15.2C15.6425 11.2 16 10.8425 16 10.4V9.59999C16 8.71749 15.2825 7.99999 14.4 7.99999ZM8 7.99999C9.5475 7.99999 10.8 6.74749 10.8 5.19999C10.8 3.65249 9.5475 2.39999 8 2.39999C6.4525 2.39999 5.2 3.65249 5.2 5.19999C5.2 6.74749 6.4525 7.99999 8 7.99999ZM9.92 8.79999H9.7125C9.1925 9.04999 8.615 9.19999 8 9.19999C7.385 9.19999 6.81 9.04999 6.2875 8.79999H6.08C4.49 8.79999 3.2 10.09 3.2 11.68V12.4C3.2 13.0625 3.7375 13.6 4.4 13.6H11.6C12.2625 13.6 12.8 13.0625 12.8 12.4V11.68C12.8 10.09 11.51 8.79999 9.92 8.79999ZM4.3275 8.46499C4.0375 8.17749 3.64 7.99999 3.2 7.99999H1.6C0.7175 7.99999 0 8.71749 0 9.59999V10.4C0 10.8425 0.3575 11.2 0.8 11.2H2.4475C2.605 10.015 3.32 9.01749 4.3275 8.46499Z' fill='white'/%3E%3C/svg%3E%0A" class="me-3" alt="">User
                  </div>
                  <div><i class="bi bi-chevron-down"></i></div>
                </a>
                <div class="collapse bg-lab-2 {{ (Route::currentRouteName() == 'owner.user' || Route::currentRouteName() == 'owner.user_edit' || Route::currentRouteName() == 'owner.user_new') ?  'show' : '' }}" id="nav-3" style="">

                <div class="list-group list-group-flush nav-res">
                  <a href="{{ route('owner.user') }}" class="list-group-item list-group-item-action {{ (Route::currentRouteName() == 'owner.user' || Route::currentRouteName() == 'owner.user_edit' ) ? 'active-res' : '' }}"><i class="bi bi-dot me-3"></i>Table User</a>
                  <a href="{{ route('owner.user_new') }}" class="list-group-item list-group-item-action {{ (Route::currentRouteName() == 'owner.user_new')? 'active-res' : '' }}"><i class="bi bi-dot me-3"></i>Tambah User</a>
                </div>
                </div>
              
                <a href="javascript:void(0)" class="list-group-item list-group-item-action d-flex justify-content-between" data-bs-toggle="collapse" data-bs-target="#nav-4" aria-expanded="false">
                  <div>
                    <i class="bi bi-credit-card-fill me-3"></i>Pricing
                  </div>
                  <div><i class="bi bi-chevron-down"></i></div>
                </a>
                <div class="collapse bg-lab-2 {{ (Route::currentRouteName() == 'owner.pricing') ?  'show' : '' }}" id="nav-4" style="">

                <div class="list-group list-group-flush nav-res">
                  <a href="{{ route('owner.pricing') }}" class="list-group-item list-group-item-action {{ (Route::currentRouteName() == 'owner.pricing') ? 'active-res' : '' }}"><i class="bi bi-dot me-3"></i>Pricing Status</a>
                </div>
                </div>
                
                <a class="list-group-item title-3 text-uppercase small">
                  Other
                </a>
                <a href="{{ route('owner.account') }}" class="list-group-item list-group-item-action">
                  <img src="data:image/svg+xml,%3Csvg width='16' height='16' viewBox='0 0 16 16' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M15.2313 9.86557L13.9 9.09682C14.0344 8.37182 14.0344 7.62807 13.9 6.90307L15.2313 6.13432C15.3844 6.04682 15.4531 5.86557 15.4031 5.69682C15.0563 4.58432 14.4656 3.57807 13.6938 2.74057C13.575 2.61244 13.3813 2.58119 13.2313 2.66869L11.9 3.43744C11.3406 2.95619 10.6969 2.58432 10 2.34057V0.806195C10 0.631195 9.87814 0.47807 9.70627 0.44057C8.55939 0.18432 7.38439 0.19682 6.29377 0.44057C6.12189 0.47807 6.00002 0.631195 6.00002 0.806195V2.34369C5.30627 2.59057 4.66252 2.96244 4.10002 3.44057L2.77189 2.67182C2.61877 2.58432 2.42814 2.61244 2.30939 2.74369C1.53752 3.57807 0.946895 4.58432 0.60002 5.69994C0.546895 5.86869 0.61877 6.04994 0.771895 6.13744L2.10314 6.90619C1.96877 7.63119 1.96877 8.37494 2.10314 9.09995L0.771895 9.86869C0.61877 9.95619 0.55002 10.1374 0.60002 10.3062C0.946895 11.4187 1.53752 12.4249 2.30939 13.2624C2.42814 13.3906 2.62189 13.4218 2.77189 13.3343L4.10314 12.5656C4.66252 13.0468 5.30627 13.4187 6.00314 13.6624V15.1999C6.00314 15.3749 6.12502 15.5281 6.29689 15.5656C7.44377 15.8218 8.61877 15.8093 9.70939 15.5656C9.88127 15.5281 10.0031 15.3749 10.0031 15.1999V13.6624C10.6969 13.4156 11.3406 13.0437 11.9031 12.5656L13.2344 13.3343C13.3875 13.4218 13.5781 13.3937 13.6969 13.2624C14.4688 12.4281 15.0594 11.4218 15.4063 10.3062C15.4531 10.1343 15.3844 9.95307 15.2313 9.86557ZM8.00002 10.4999C6.62189 10.4999 5.50002 9.37807 5.50002 7.99994C5.50002 6.62182 6.62189 5.49994 8.00002 5.49994C9.37814 5.49994 10.5 6.62182 10.5 7.99994C10.5 9.37807 9.37814 10.4999 8.00002 10.4999Z' fill='white'/%3E%3C/svg%3E%0A" class="me-3" alt="">Account
                </a>
              </div>
              </div>
              </div>
              </div>
              <div class="col-md">
              <nav class="navbar navbar-light bg-white shadow-sm sticky-top py-1">
            <div class="container px-4">
                <a class="navbar-brand title-2">
                    Dashboard
                </a>
                <!-- <div class="input-group me-auto">
                  <span class="input-group-text" id="search">Default</span>
                  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="search" placeholder="Pencarian Pasien">
                </div> -->
                    <!-- Right Side Of Navbar -->
                    <ul class="nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle text-dark" href="javascript:void(0)" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="https://dummyimage.com/200x200" width="40" alt="" class="align-middle rounded-pill">
                            <span class="align-middle title-3 fw-bold ms-2">Account</span>
                          </a>
                          <div class="dropdown-menu dropdown-menu-end animate__animated animate__fadeInDown animate__faster" aria-labelledby="navbarDropdown">
                            <h6 class="dropdown-header">Your Account</h6>
                            <a class="dropdown-item" href="{{ route('owner.account') }}">Setting Account</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modalLogout">Logout</a>
                          </div>
                        </li>
                        @endguest
                    </ul>
            </div>
        </nav>

        <div class="p-4">
          @yield('content')
        </div>


              </div>
            </div>
          </div>
        </section>
        @endif
        @endguest
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @yield('js')
</body>
</html>
