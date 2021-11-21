@extends('layouts.app')
@section('content')
@include('modal')
@include('header')
<section class="min-vh-100 space-m">
    <div class="container">
        <div class="card shadow">
            <div class="card-body">
            <div class="d-flex justify-content-between mb-4">
					<div>
						<h4 class="title-3 text-uppercase text-lab fw-bold mb-0">Diagnosa Pasien</h4>
						<p class="mb-0 text-secondary">Informasi diagnosa pasien</p>
					</div>
					<div>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
								</li>
								<li class="breadcrumb-item"><a href="{{ route('admin.pasien_detail',['id' =>$data ->pasien_id]) }}">Detail pasien</a></li>
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
						<tr>
							<td>No. Transaksi</td>
							<td>:</td>
							<td class="text-uppercase">{{ counTing($data->id) . substr($data->kode, 0 ,5) }}</td>
						</tr>
						<tr>
							<td>Nama Lengkap</td>
							<td>:</td>
							<td>{{ $data->pasien->name }}</td>
						</tr>
						<tr>
							<td>Dokter Pemeriksa</td>
							<td>:</td>
							<td>
								<!-- <span class="badge badge-warning badge-pill px-3"></span> -->
									{{ $data->dokter->name }}
							</td>
						</tr>
						<tr>
							<td>TGL Berobat</td>
							<td>:</td>
							<td>{{ $data->created_at }}</td>
						</tr>
						<tr>
							<td>Cabang</td>
							<td>:</td>
							<td>{{ $data->cabang->kota }}</td>
						</tr>
						<tr>
							<td>Hasil Diagnosa</td>
							<td>:</td>
							<td>{{ $data->formula->judul }}</td>
						</tr>
					</tbody>
				</table>
					</div>
					<div class="card-footer bg-transparent border-0 d-flex justify-content-between">
							<div>Total Pembayaran</div>
							<div class="text-capitalize title-2 text-lab">
								{{ 'Rp ' . $data->pembayaran }}
							</div>
						</div>
					</div>
					</div>
					<div class="col-md-6">
						<div class="bg-light rounded" style="height:50vh"></div>
						<div class="mt-4 text-center">
							<a href="javascript:void(0)" class="btn btn-lab"><i class="ms-Icon align-middle ms-Icon--Print me-2"></i>Cetak pembayaran</a>
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
</section>
@include('alert')
@include('footer')
@endsection