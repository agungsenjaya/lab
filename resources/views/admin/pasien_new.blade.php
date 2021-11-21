@extends('layouts.app')
@section('content')
@include('modal')
@include('header')
<section class="space-m">
	<div class="container">
		<div class="card shadow">
			<div class="card-body">
				<div class="d-flex justify-content-between mb-4">
					<div>
						<h4 class="title-3 text-uppercase fw-bold mb-0 text-lab">Input Pasien</h4>
						<p class="mb-0 text-secondary">Input data pasien baru</p>
					</div>
					<div>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Input pasien</li>
							</ol>
						</nav>
					</div>
				</div>

				<form method="POST" action="{{ route('admin.pasien_store') }}">@csrf
					<input type="hidden" name="user" value="{{ Auth::user()->id }}">
					<div class="row">
						<div class="mb-4 col ui-widget">
							<!-- <label class="form-label" for="">Nomor KTP <span class="text-secondary">( optional )</span> -->
							<label class="form-label" for="">Nomor KTP <span class="text-danger">*</span>
							</label>
							<input required class="form-control" id="number" aria-describedby="" placeholder="Masukan nomor" name="ktp">
						</div>
						<div class="mb-4 col">
							<label class="form-label" for="">Nama Lengkap <span class="text-danger">*</span>
							</label>
							<input required type="text" class="form-control" id="" aria-describedby="" placeholder="Masukan nama" name="name">
						</div>
					</div>
					<div class="row">
						<div class="mb-4 col">
							<label class="form-label" for="">Jenis Kelamin <span class="text-danger">*</span>
							</label>
							<select required class="form-select" name="kelamin">
								<option class="text-secondary">Select option</option>
								<option class="text-secondary" value="laki-laki">Laki-laki</option>
								<option class="text-secondary" value="perempuan">Perempuan</option>
							</select>
						</div>
						<div class="mb-4 col">
							<label class="form-label" for="">Tanggal Lahir <span class="text-danger">*</span>
							</label>
							<input required type="date" class="form-control" id="" aria-describedby="" placeholder="Masukan nama" name="tgl">
						</div>
					</div>
					<div class="row">
						<div class="mb-4 col">
							<label class="form-label" for="">Dokter Pemeriksa <span class="text-danger">*</span>
							</label>
							<select required class="form-select" name="dokter">
								<option class="text-secondary">Select option</option>@foreach($dokter as $dok)
								<option class="text-secondary" value="{{ $dok->id }}">{{ $dok->name }}</option>@endforeach</select>
						</div>
						<div class="mb-4 col">
							<label class="form-label" for="">Diagnosa Pasien <span class="text-danger">*</span>
							</label>
							<select required class="form-select" name="formula">
								<option class="text-secondary">Select option</option>@foreach($formula as $for)
								<option class="text-secondary" value="{{ $for }}">{{ $for->judul }}</option>@endforeach</select>
						</div>
					</div>
					<div class="mb-4">
						<label class="form-label" for="">Alamat <span class="text-danger">*</span>
						</label>
						<textarea id="" cols="20" rows="5" class="form-control" placeholder="Masukan alamat" name="alamat"></textarea>
					</div>
					<div class="form-checkbox mb-4">
						<input required type="checkbox" class="form-control-input" id="checkSetuju">
						<label class="form-label text-secondary" for="checkSetuju">Setujui input data pasien</label>
					</div>
					<button type="submit" class="btn btn-lab">Masukan Pasien</button>
				</form>
			</div>
		</div>
	</div>
</section>
@include('alert')
@include('footer')
@endsection
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.2.2/imask.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  var masa = document.getElementById('number');
var maskOptions = {
  mask: Number,
};
var mask = IMask(masa, maskOptions);

$( "#number" ).keyup(function() {
		var bos = $(this ).val();
		if (bos.length == 16) {
			$.getJSON(`http://lab.test/api/v1/pasiens/${bos}`,
				function (res) {
					if (res.data) {
						$('input[name="name"]').val(res.data.name);
						$('select[name="kelamin"]').val(res.data.kelamin);
						$('input[name="tgl"]').val(res.data.tanggal_lahir);
						$('textarea[name="alamat"]').val(res.data.alamat);
					}
				});
		}
	});
</script>
@endsection