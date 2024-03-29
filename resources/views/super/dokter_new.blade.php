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
								<li class="breadcrumb-item"><a href="{{ route('super.dokter') }}">Dokter</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Tambah Dokter</li>
							</ol>
						</nav>
					</div>
				</div>


    <form id="form-1" action="{{ route('super.dokter_store') }}" method="POST">
      @csrf
  <div class="mb-3">
    <label class="form-label">Nama Lengkap</label>
    <input type="text" class="form-control" name="name" placeholder="Masukan nama" required>
  </div>
  <div class="mb-3 d-none">
    <label class="form-label">Specialist</label>
    <select name="specialist" class="form-select">
        <option value="">-- Select Option --</option>
        <option value="umum">umum</option>
        <option value="gigi">gigi</option>
        <option value="jantung">jantung</option>
        <option value="mata">mata</option>
        <option value="syaraf">syaraf</option>
        <option value="anak">anak</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Tambah Dokter</button>
</form>
    </div>
    </div>
</section>
@endsection
@section('js')
<script>
  var modalLoad = new bootstrap.Modal(document.getElementById('modalLoad'));
  $('#form-1').submit(function () { 
    // e.preventDefault();
    modalLoad.show();
    return true
  });
</script>
@endsection