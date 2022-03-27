@extends('layouts.app')
@section('content')
<section>
    <div class="row g-0">
        <div class="col-md-4">
        <div class="min-vh-100 bg-white d-flex align-items-center">
            <div class="w-100">
                <div class="text-center">
                    <h3 class="fw-bold mb-0">Login Page</h3>
                    <p class="text-secondary">Halaman login sistem laboratorium</p>
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
                        <button type="submit" class="btn btn-primary">
                        <span class="btn-inner--text">Masuk sekarang</span>
                      </button>
                    </div>
                  </form>
                </div>
            </div>
        <div class="z-index-100 mb-0 d-none">
                <div class="card-header bg-transparent border-0 text-center">
                    <h3 class="fw-bold">Login Page</h3>
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
                        <button type="submit" class="btn btn-primary">
                        <span class="btn-inner--text">Masuk sekarang</span>
                      </button>
                    </div>
                  </form>
                </div>
                <!-- <div class="card-footer bg-transparent border-0 text-muted text-center mx-4">
                Jika anda mempunyai kendala seputar lupa password, silahkan <a href="" class="fw-bold"><u>klik disini.</u></a>
                </div> -->
        </div>
        </div>
    </div>
        <div class="col-md">
            <div class="bg-primary h-100 w-100 text-white d-flex align-items-start justify-content-center">
                <div class="my-auto col-md-6">
                <!-- <div class="navbar-brand">
                    <img src="{{ asset('img/logo.svg') }}" alt="" width="40" class="d-inline-block align-middle mr-2"><span class="title-3 fw-bold text-uppercase h5">Labora</span>
                </div> -->
                <h2 class="fw-bold">Laboratorium Sistem</h2>
                <p>Website Laporan Diagnosa Laboratorium.</p>
                <!-- <img src="https://htmldesigntemplates.com/html/ayurvedic/images/home/medical-team-workers-examining-a-medical-report-KQ5AY7L.jpg" alt="" width="70%"> -->
                </div>
                <!-- <div class="w-100 text-end">
                    <img src="{{ asset('img/shape-5.svg') }}" alt="" width="80%">
                </div> -->
            </div>
        </div>
    </div>
</section>
@endsection
