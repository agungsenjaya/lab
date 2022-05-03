@extends('layouts.app')
@section('content')
@include('modal')
@include('alert')
@include('header')
<section class="min-vh-100 space-m">
    <div class="container">
        <div class="card shadow">
            <div class="card-body">

			<div class="d-flex justify-content-between">
					<div>
						<h5 class="title-3 fw-bold mb-0">Hasil Pemeriksaan Pasien</h5>
						<p class="mb-0 text-secondary">Informasi hasil pemeriksaan pasien</p>
					</div>
					<div class="d-flex align-self-center">
						<nav aria-label="breadcrumb" class="align-self-center">
							<ol class="breadcrumb mb-0">
								<li class="breadcrumb-item"><a href="{{ route('admin.pasien') }}">Pasien</a>
								</li>
								<!-- <li class="breadcrumb-item"><a href="{{ route('admin.pasien_detail',['id' =>$data ->pasien_id]) }}">Detail pasien</a></li> -->
								<li class="breadcrumb-item active" aria-current="page">Diagnosa pasien</li>
							</ol>
						</nav>
						<div class="ms-3">
							<a href="{{ route('admin.cetak',['id' => $data -> kode]) }}" target="_blank" class="btn btn-primary"><i class="ms-Icon align-middle ms-Icon--Print me-2"></i>Cetak Pemeriksaan</a>
						</div>
					</div>
				</div>

				<div class="">
		<div class="row py-4">
			<div class="col-md-6">
				<table class="table table-1 ">
					<tr class="d-flex">
						<td class="col-4">No Transaksi / Dokumen</td>
						<td>:</td>
						<td class="text-uppercase col"><span class="badge alert-primary">{{ counTing($data->id) . substr($data->kode, 0 ,5) }}</span></td>
					</tr>
					<tr class="d-flex">
							<td class="col-4">Nama Lengkap</td>
							<td>:</td>
							<td class="text-capitalize col">{{ $data->pasien->name }}</td>
						</tr>
						<tr class="d-flex">
					<td class="col-4">Umur</td>
							<td>:</td>
							<td class="text-capitalize col">{{ $data->pasien->tanggal_lahir }} Tahun</td>
						</tr>
						<tr class="d-flex border-transparent">
						<td class="col-4">Jenis Kelamin</td>
							<td>:</td>
							<td class="text-capitalize col">{{ $data->pasien->kelamin }}</td>
						</tr>
				</table>
			</div>
			<div class="col-md-6">
				<table class="table table-1 ">
						<tr class="d-flex">
						<td class="col-4">Dokter</td>
							<td>:</td>
							<td class="text-capitalize col">
								Dr. {{ $data->dokter->name }}
							</td>
						</tr>
							<tr class="d-flex">
							<td class="col-4">Tanggal Pemeriksaan</td>
								<td>:</td>
								<td class="col">{{ $data->created_at->format('d M Y') }}</td>
							</tr>
						<tr class="d-flex border-transparent">
							<td class="col-4">Alamat Lengkap</td>
							<td>:</td>
							<td class="text-capitalize col">{{ $data->pasien->alamat }}</td>
						</tr>
				</table>
			</div>
		</div>
		<table class="table table-2 table-bordered">
			<thead class="bg-primary text-white">
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
		<div class="">
			<p class="small mb-0"><span class="text-danger">*</span> Menunjukan hasil diatas atau dibawah nilai normal</p>
		</div>
		<div class="d-none">
		<i><p class="small"><span class="text-danger">*</span> Menunjukan hasil diatas atau dibawah nilai normal</p></i>
		<div class="row">
			<div class="col-md-6 offset-md-6 d-flex justify-content-end">
				<div>
					<p class="mb-0">Sukabumi, {{ $data->created_at->format('d M Y') }}</p>
					<br>
					<br>
					<br>
					<p>ATLM</p>
				</div>
			</div>
		</div>
		</div>
</div>
				


            </div>
        </div>
    </div>
</section>
@include('footer')
@endsection