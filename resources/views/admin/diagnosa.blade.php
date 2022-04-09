@extends('layouts.app')
@section('content')
@include('modal')
@include('alert')
@include('header')
<section class="min-vh-100 space-m">
    <div class="container">
    <div class="card p-5 col-md-10 offset-md-1 d-none">
		<img src="https://dummyimage.com/1349x250" alt="" width="100%" class=" mb-2">
		<!-- <div class="text-center">
			<img src="https://4.bp.blogspot.com/--SlZyFIIPI8/WXGoMOqYmhI/AAAAAAACCbI/FCQH2Zwb8Ms9JU8Y-kQlFZS7LvlaRgbxwCK4BGAYYCw/s1600/kop%2Bsurat%2Blama%2Bdepkes.jpg" alt="" width="70%" class=" mb-2">
		</div> -->
		<!-- <div style="height:100px"></div> -->
		<div class="row py-2">
			<div class="col-md-6">
				<table class="table table-1 table-sm">
					<tr class="d-flex">
						<td class="col-4">No Transaksi</td>
						<td>:</td>
						<td class="text-uppercase col">{{ counTing($data->id) . substr($data->kode, 0 ,5) }}</td>
					</tr>
					<tr class="d-flex">
							<td class="col-4">Nama Lengkap</td>
							<td>:</td>
							<td class="text-capitalize col">{{ $data->pasien->name }}</td>
						</tr>
						<tr class="d-flex">
						<td class="col-4">Jenis Kelamin</td>
							<td>:</td>
							<td class="text-capitalize col">{{ $data->pasien->kelamin }}</td>
						</tr>
					<tr class="d-flex">
					<td class="col-4">Usia Pasien</td>
							<td>:</td>
							<td class="text-capitalize col">{{ $data->pasien->tanggal_lahir }} Tahun</td>
						</tr>
				</table>
			</div>
			<div class="col-md-6">
				<table class="table table-1 table-sm">
						<!-- <tr class="d-flex">
						<td class="col-4">Status Dokumen</td>
							<td>:</td>
							<td class="text-capitalize col">
								Copy
							</td>
						</tr> -->
						<tr class="d-flex">
						<td class="col-4">Dokter</td>
							<td>:</td>
							<td class="text-capitalize col">
								Dr. {{ $data->dokter->name }}
							</td>
						</tr>
							<tr class="d-flex">
							<td class="col-4">Tanggal Diagnosa</td>
								<td>:</td>
								<td>{{ $data->created_at->format('d M Y') }}</td>
							</tr>
						<tr class="d-flex">
							<td class="col-4">Alamat Lengkap</td>
							<td>:</td>
							<td class="text-capitalize col">{{ $data->pasien->alamat }}</td>
						</tr>
				</table>
			</div>
		</div>
		<table class="table table-bordered table-2 table-sm">
			<thead class="">
				<tr class="row g-0 text-center">
					<th class="col-md-4">Pemeriksaan</th>
					<th class="col-md-2">Hasil</th>
					<th class="col-md">Nilai Normal</th>
				</tr>
			</thead>
			<tbody>
			@foreach($gas as $ga => $item)
			<tr class="row g-0">
				<td class="text-uppercase col-md-4">
					{{ $ga }}
				</td>
				<td class="col-md-2"></td>
				<td class="col-md"></td>
			</tr>
				@foreach($item as $it)
				<tr class="row g-0">
					<td class="col-md-4">{{ $it->data->judul }}</td>
					<td class="col-md-2 text-center {{ !empty($it->anormali) ? 'text-danger' : '' }}">{{ $it->nilai }}<span class="text-danger">{{ !empty($it->anormali) ? $it->anormali : '' }}</span></td>
					<td class="col-md text-center">{{ $it->data->content }}</td>
				</tr>
				@endforeach
			@endforeach
			</tbody>
		</table>
		<i><p class="small"><span class="text-danger">*</span> Menunjukan hasil diatas atau dibawah nilai normal</p></i>

		<div class="row">
			<div class="col-md-6 offset-md-6 d-flex justify-content-end">
				<div>
					<p class="mb-0">Sukabumi, {{ $data->created_at->format('d M Y') }}</p>
					<br>
					<br>
					<br>
					<p>Analis</p>
				</div>
			</div>
		</div>
</div>
        <div class="card shadow">
            <div class="card-body">
            <div class="d-flex justify-content-between mb-4">
					<div>
						<h5 class="title-3 fw-bold mb-0">Diagnosa Pasien</h5>
						<p class="mb-0 text-secondary">Informasi diagnosa pasien</p>
					</div>
					<div>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('admin.pasien') }}">Pasien</a>
								</li>
								<!-- <li class="breadcrumb-item"><a href="{{ route('admin.pasien_detail',['id' =>$data ->pasien_id]) }}">Detail pasien</a></li> -->
								<li class="breadcrumb-item active" aria-current="page">Diagnosa pasien</li>
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
						<tr class="d-flex">
							<td class="col-3">No Transaksi</td>
							<td>:</td>
							<td class="text-uppercase col">
								<span class="badge alert-primary">
									{{ counTing($data->id) . substr($data->kode, 0 ,5) }}
								</span>
							</td>
						</tr>
						<tr class="d-flex">
							<td class="col-3">Nama Lengkap</td>
							<td>:</td>
							<td class="col">{{ $data->pasien->name }}</td>
						</tr>
						<tr class="d-flex">
							<td class="col-3">Dokter</td>
							<td>:</td>
							<td class="col">
								<!-- <span class="badge badge-warning badge-pill px-3"></span> -->
								<i class="text-primary bi bi-person-badge me-2"></i>{{ $data->dokter->name }}
							</td>
						</tr>
						<tr class="d-flex">
							<td class="col-3">Tanggal</td>
							<td>:</td>
							<td class="col">{{ $data->created_at }}</td>
						</tr>
						<tr class="d-flex">
							<td class="col-3">Cabang</td>
							<td>:</td>
							<td class="text-uppercase title-3 col">{{ $data->cabang->name }}</td>
						</tr>
						<tr class="d-flex border-transparent">
							<td class="col-3">Alamat Pasien</td>
							<td>:</td>
							<td class="text-capitalize title-3 col">{{ $data->pasien->alamat }}</td>
						</tr>
					</tbody>
				</table>
					</div>
					<div class="card-footer bg-transparent border-0 d-flex justify-content-between d-none">
							<div>Total Pembayaran</div>
							<div class="text-capitalize title-2 text-primary">
								{{ 'Rp ' . $data->pembayaran }}
							</div>
						</div>
					</div>
					</div>
					<div class="col-md-6">
						<div class="bg-light rounded" style="height:50vh"></div>
						<div class="mt-4 text-center">
							<!-- <a href="{{ route('admin.pasien_detail',['id' =>$data ->pasien_id]) }}" class="btn btn-warn me-2">Track Record</a> -->
							<a href="{{ route('admin.cetak',['id' => $data -> kode]) }}" target="_blank" class="btn btn-primary"><i class="ms-Icon align-middle ms-Icon--Print me-2"></i>Cetak pembayaran</a>
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
</section>
@include('footer')
@endsection
@section('css')
<style>
	/* table {
		font-size:13px;
	} */
	/* .table-1 > tbody > tr > td,
	.table-1 > tbody > tr > th,
	.table-1 > tfoot > tr > td,
	.table-1 > tfoot > tr > th,
	.table-1 > thead > tr > td,
	.table-1 > thead > tr > th {
		border: none;
	}

	thead, tbody, tfoot, tr, td, th {
		border-color: #000;
	} */
</style>
@endsection