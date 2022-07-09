@extends('layouts.owner')
@section('content')
<section class="">
  <div class="container">
    <div class="card card-body shadow">

    <div class="d-flex justify-content-between">
					<div>
						
					</div>
					<div>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('owner.cabang') }}">Cabang</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Tambah cabang</li>
							</ol>
						</nav>
					</div>
				</div>

    <form action="{{ route('owner.cabang_store') }}" method="POST">
        @csrf
  <div class="row mb-3">
  <div class="col">
    <label class="form-label">Nama Cabang <span class="text-danger">*</span></label>
    <input type="text" class="form-control" name="name" required>
  </div>
  <div class="col">
    <label class="form-label">Kota / Kabupaten <span class="text-danger">*</span></label>
    <select name="kota" class="form-select" required>
        <option value="">--Select Option--</option>
    </select>
  </div>
  </div>
  <div class="mb-3">
    <label class="form-label">Alamat <span class="text-danger">*</span></label>
    <textarea class="form-control" name="alamat" required></textarea>
  </div>
  
  <button type="submit" class="btn btn-primary">Insert cabang</button>
</form>
</div>
</div>
</section>
@endsection
@section('js')
<script>
    $.getJSON("http://localhost:8000/json/prov.json",
        function (data) {
            $.each(data, function (index, value) { 
                $('select[name="kota"]').append(`<option value="${value.name}">${value.name}</option>`);
            });
        }
    );
</script>
@endsection