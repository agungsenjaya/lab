@extends('layouts.app')
@section('content')
<section>
    <div class="row g-0">
        <div class="col-md-4">
        <div class="min-vh-100 bg-white d-flex align-items-center">
        <div class="z-index-100 mb-0 ">
                <div class="card-header bg-transparent border-0 text-center">
                    <h3 class="title-3 text-uppercase fw-bold">Login Now</h3>
                  </div>
                <div class="card-body px-md-5 py-5">
                  <span class="clearfix"></span>
                  <form method="POST" action="{{ route('login') }}">
                        @csrf
                    <div class="mb-4">
                      <label class="form-label">Email address</label>
                      <!-- <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div> -->
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                                <label class="form-label">Password</label>
                                <input id="input-password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="mt-4 text-center">
                        <button type="submit" class="btn btn-lab">
                        <span class="btn-inner--text">Masuk sekarang</span>
                      </button>
                    </div>
                  </form>
                </div>
                <div class="card-footer lead bg-transparent border-0 text-muted text-center mx-4">
                Jika anda mempunyai kendala seputar lupa password, silahkan <a href="{{ route('password.request') }}" class="fw-bold"><u>klik disini.</u></a>
                </div>
        </div>
        </div>
    </div>
        <div class="col-md">
            <div class="bg-lab h-100 text-white d-flex align-items-start flex-column">
                <div class="mt-auto col-md-6 offset-md-2">
                <div class="navbar-brand">
                    <img src="{{ asset('img/logo.svg') }}" alt="" width="40" class="d-inline-block align-middle mr-2"><span class="title-3 fw-bold text-uppercase h5">Labora</span>
                </div>
                <h2 class="title-1 display-5">Sistem management laboratorium</h2>
                    <!-- <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Est quisquam numquam aut dicta sint quaerat aperiam veniam omnis</p> -->
                </div>
                <div class="w-100 text-right">
                    <img src="{{ asset('img/shape-5.svg') }}" alt="" width="80%">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
