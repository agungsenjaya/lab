@extends('layouts.app')
@section('content')
<section class="vh-100 bg-primary d-flex align-items-center">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center">
                <h3 class="title-3 text-uppercase font-weight-bold">Reset Pasword</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">
                        <input id="email" type="hidden" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                        <div class="form-group">
                            <label for="password" class="text-md-right">{{ __('Password') }}</label>

                            <div class="">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group mb-0 text-center">
                            <div class="">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-muted text-center">
        Sudah mempunyai akun? kembali ke halaman login, silahkan <a href="{{ route('login') }}" class="font-weight-bold"><u>klik disini.</u></a>
        </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
