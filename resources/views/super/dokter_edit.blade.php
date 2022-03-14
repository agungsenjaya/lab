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
								<li class="breadcrumb-item active" aria-current="page">Edit dokter</li>
							</ol>
						</nav>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						
					</div>
				</div>

				<form action="{{ route('super.dokter_update',['id' => $data -> id]) }}" method="POST">
      @csrf
  <div class="mb-3">
    <label class="form-label">Nama Lengkap</label>
    <input type="text" class="form-control" name="name" placeholder="Masukan nama" required value="{{ $data->name }}">
  </div>
  <div class="mb-3">
    <label class="form-label">Specialist</label>
    <select name="specialist" class="form-select" required>
        <option value="">-- Select Option --</option>
        <option value="umum" {{ ($data->specialist == 'umum') ? 'selected' : '' }}>umum</option>
        <option value="gigi" {{ ($data->specialist == 'gigi') ? 'selected' : '' }}>gigi</option>
        <option value="jantung" {{ ($data->specialist == 'jantung') ? 'selected' : '' }}>jantung</option>
        <option value="mata" {{ ($data->specialist == 'mata') ? 'selected' : '' }}>mata</option>
        <option value="syaraf" {{ ($data->specialist == 'syaraf') ? 'selected' : '' }}>syaraf</option>
        <option value="anak" {{ ($data->specialist == 'anak') ? 'selected' : '' }}>anak</option>
    </select>
  </div>
  <button type="submit" class="btn btn-lab">Update Dokter</button>
</form>

        </div>
    </div>
</section>
@endsection