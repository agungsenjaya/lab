@extends('layouts.owner')
@section('content')
<!-- Modal Delete -->
<div class="modal fade" id="modalDel" tabindex="-1" aria-labelledby="modalDelLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="modalDelLabel"><i class="bi bi-info-circle me-2"></i>Notifications</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        Apakah anda yakin akan menghapus user <span class="fw-bold">{{ $data->email }}</span> dari cabang <span class="text-capitalize fw-bold">{{ $data->cabang->name }}</span> laboratorium?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="{{ route('owner.user_delete',['id' => $data -> id]) }}" class="btn btn-primary">Delete Now</a>
      </div>
    </div>
  </div>
</div>

<section>
    <div class="container">
        <div class="card shadow">
          <div class="card-header">
          <div class="d-flex justify-content-between">
					<div class="text-uppercase fw-bold">
            {{ $data->username  }}
					</div>
					<div>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0">
								<li class="breadcrumb-item"><a href="{{ route('owner.user') }}">User</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Edit user</li>
							</ol>
						</nav>
					</div>
				</div>
          </div>
          <div class="card-body">
        @if($errors->any())
        <div class="alert alert-warning alert-dismissible fade show mb-3" role="alert">
          <p class="fw-bold">Error Listing</p>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              <ul class="list-group list-group-flush line-h-2 list-error">
          @foreach ($errors->all() as $error)
              <li class="list-group-item">{{ $error }}</li>
              @endforeach
          </ul>
        </div>
        @endif

                <form action="{{ route('owner.user_update',['id' => $data -> id]) }}" method="POST">
      @csrf
      <div class="row">
        <div class="mb-3 col">
          <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="name" placeholder="Masukan nama" required value="{{ $data->name }}">
        </div>
        <div class="mb-3 col">
          <label class="form-label">Email Address <span class="text-danger">*</span></label>
          <input type="email" class="form-control" name="email" placeholder="Masukan email" required value="{{ $data->email }}">
        </div>
      </div>
  <div class="row mb-3">
  <div class="col">
      <label for="password" class="form-label">new {{ __('Password') }}</label>

      <div class="">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
  </div>

  <div class="col">
      <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>

      <div class="">
          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
      </div>
  </div>
  </div>
  <button type="submit" class="btn btn-primary">Update User</button>
  <button type="button" class="btn btn-secondary ms-2" data-bs-toggle="modal" data-bs-target="#modalDel">Delete User</button>
</form>

        </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.2.2/imask.min.js"></script>
<script>
    var masa = document.getElementById('number');
    var maskOptions = {
      mask: Number,
    };
    var mask = IMask(masa, maskOptions);
</script>
@endsection