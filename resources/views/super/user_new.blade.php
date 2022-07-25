@extends('layouts.super')
@section('content')
<section>
    <div class="container">
        <div class="card card-body shadow">

        <div class="d-flex justify-content-between">
					<div>
						
					</div>
					<div>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('super.user') }}">User</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Tambah user</li>
							</ol>
						</nav>
					</div>
				</div>

        @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
          <h6 class="fw-bold"><i class="bi bi-info-circle-fill me-2"></i>Notifications</h6>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <ul class="list-group list-group-flush line-h-2 list-error">
              @foreach ($errors->all() as $error)
              <li class="list-group-item ps-0"><i class="bi bi-dash me-2"></i>{{ $error }}</li>
              @endforeach
              </ul>
        </div>
        @endif

        <form id="form-1" action="{{ route('super.user_store') }}" method="POST">
      @csrf
      <div class="row">
        <div class="mb-3 col">
          <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="name" placeholder="Masukan nama" required>
        </div>
        <div class="mb-3 col">
          <label class="form-label">Email Address <span class="text-danger">*</span></label>
          <input type="email" class="form-control" name="email" placeholder="Masukan email" required>
        </div>
      </div>
  {{--<div class="row">
    <div class="col mb-3">
                            <label for="password" class="form-label">{{ __('Password') }} <span class="text-danger">*</span></label>

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Masukan password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col mb-3">
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }} <span class="text-danger">*</span></label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi password">
                        </div>

                        </div>--}}

  <button type="submit" class="btn btn-primary">Tambah User</button>
</form>

        </div>
    </div>
</section>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.2.2/imask.min.js"></script>
<script>
  var modalLoad = new bootstrap.Modal(document.getElementById('modalLoad'));
    var masa = document.getElementById('number');
    var maskOptions = {
      mask: Number,
    };
    var mask = IMask(masa, maskOptions);

    $('#form-1').submit(function () { 
    // e.preventDefault();
    modalLoad.show();
    return true
  });
</script>
@endsection