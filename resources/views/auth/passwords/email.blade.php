@extends('layouts.app')
@section('content')
<div class="images">
<section class="vh-100 bg-primary align-items-center d-flex">
<div class="container z-index-100">
    <div class="card col-md-4 offset-md-4">
    <div class="card-header text-center">
        <h3 class="title-3 text-uppercase font-weight-bold">Reset Pasword</h3>
    </div>
        <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group">
                      <label class="form-control-label">Email address</label>
                      <!-- <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div> -->
                        <input id="input-email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                    </div>
                    <div class="mt-4 text-center">
                        <button type="submit" class="btn btn-primary">
                        <span class="btn-inner--text">Reset Password</span>
                      </button>
                    </div>
            </form>
        </div>
        <div class="card-footer text-muted text-center">
        Sudah mempunyai akun? kembali ke halaman login, silahkan <a href="{{ route('login') }}" class="font-weight-bold"><u>klik disini.</u></a>
        </div>
    </div>
</div>
</section>
<div class="d-bottom text-right">
    <img src="{{ asset('img/shape-5.svg') }}" alt="" width="80%">
</div>
</div>
@endsection
