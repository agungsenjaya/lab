@extends('layouts.app')
@section('content')
@include('modal')
@include('header')
@php 
$data = \App\Diagnosa::where('pasien_id', $pasien->id)->get(); 
$no = 1;
@endphp
<section class="min-vh-100 space-m">
    <div class="container">
        <div class="card shadow">
            <div class="card-body">
            <div class="d-flex justify-content-between mb-4">
					<div>
						<h4 class="title-3 text-uppercase fw-bold mb-0 text-primary">Detail Pasien</h4>
						<p class="mb-0 text-secondary">Informasi detail pasien</p>
					</div>
					<div>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
								</li>
								<li class="breadcrumb-item"><a href="{{ route('admin.pasien') }}">Pasien</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Detail pasien</li>
							</ol>
						</nav>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="card border-0">
							<div class="card-body">
							<table class="table text-secondary line-h-2">
							<tbody class="text-capitalize">
								<tr>
									<td>Nomor KTP</td>
									<td>:</td>
									<td>{{ $pasien->ktp }}</td>
								</tr>
								<tr>
									<td>Nama Lengkap</td>
									<td>:</td>
									<td>{{ $pasien->name }}</td>
								</tr>
								<tr>
									<td>Jenis Kelamin</td>
									<td>:</td>
									<td>{{ $pasien->kelamin }}</td>
								</tr>
								<tr>
									<td>Date Reg</td>
									<td>:</td>
									<td>{{ $pasien->created_at }}</td>
								</tr>
								<!-- <tr>
									<td>Alamat</td>
									<td>:</td>
									<td>{{ $pasien->alamat }}</td>
								</tr> -->
							</tbody>
						</table>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<!-- <table class="table text-secondary">
							<tbody>
							<tr>
									<td>Berobat</td>
									<td>:</td>
									<td>@if($data) {{ counTing(count($data)) }} @endif</td>
								</tr>
							</tbody>
						</table> -->
					</div>
				</div>


				<div class="d-flex justify-content-between my-4">
					<div>
						<h4 class="title-3 text-uppercase fw-bold mb-0 text-primary">Riwayat pasien</h4>
						<p class="mb-0 text-secondary">Informasi riwayat pengobatan</p>
					</div>
					
				</div>

				@if($data)
				<table id="table1" class="table table-striped w-100 table-bordered">
						<thead class="title-3 text-uppercase text-primary">
							<tr>
								<th scope="col" class="border-top-0 py-2">#</th>
								<th scope="col" class="border-top-0 py-2">Diagnosa</th>
								<th scope="col" class="border-top-0 py-2">Dokter</th>
								<th scope="col" class="border-top-0 py-2">Cabang</th>
								<th scope="col" class="border-top-0 py-2">Tgl</th>
								<th scope="col" class="border-top-0 py-2">Actions</th>
							</tr>
						</thead>
						<tbody class="font-size-1 text-capitalize">@foreach($data->reverse() as $pas)
							<tr>
								<td>{{ counTing($no++) }}</td>
								<td>{{ $pas->formula->judul }}</td>
								<td><i class="text-primary bi bi-person-badge me-2"></i>{{ $pas->dokter->name }}</td>
								<td class="text-uppercase title-3">{{ $pas->cabang->name }}</td>
								<td>{{ $pas->created_at }}</td>
								<td><a href="{{ route('admin.diagnosa',['id' => $pas -> kode]) }}" class="btn btn-sm w-100 btn-warn">Detail</a>
								</td>
							</tr>@endforeach</tbody>
					</table>
				@endif

            </div>
        </div>
    </div>
</section>
@include('alert')
@include('footer')
@endsection
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection
@section('js')
<script src="https://htmlstream.com/preview/nova-v1.2.2/assets/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
<!-- <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> -->
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script>
    $('#table1').DataTable();
</script>
@endsection