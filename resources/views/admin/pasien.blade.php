@php
$no = 1;
@endphp
@extends('layouts.app')
@section('content')
@include('modal')
@include('header')
<section class="space-m min-vh-100">
	<div class="container">
		<div class="card shadow">
			<div class="card-body">
				<div class="d-flex justify-content-between mb-4">
					<div>
						<h5 class="title-3 fw-bold mb-0 text-lab">Table Pasien</h5>
						<p class="mb-0 text-secondary">Riwayat pasien laboratorium</p>
					</div>
					<div>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Pasien</li>
							</ol>
						</nav>
					</div>
				</div>
				<table id="table1" class="table table-striped w-100 table-bordered">
						<thead class="bg-primary text-white">
							<tr>
								<th scope="col" class="border-top-0 py-2">#</th>
								<th scope="col" class="border-top-0 py-2">Nama Lengkap</th>
								<th scope="col" class="border-top-0 py-2">Dokter Pemeriksa</th>
								<th scope="col" class="border-top-0 py-2">Kode Transaksi</th>
								<th scope="col" class="border-top-0 py-2">Tgl Berobat</th>
								<th scope="col" class="border-top-0 py-2">Actions</th>
							</tr>
						</thead>
						<tbody class="font-size-1 text-capitalize">@foreach($pasien->reverse() as $pas)
							<tr>
								<td>{{ counTing($no++) }}</td>
								<td>{{ $pas->pasien->name }}</td>
								<td><i class="text-primary bi bi-person-badge me-2"></i>{{ $pas->dokter->name }}</td>
								<td class="text-uppercase">{{ counTing($pas->id) . substr($pas->kode, 0 ,5) }}</td>
								<td>{{ $pas->created_at }}</td>
								<td><a href="{{ route('admin.diagnosa',['id' => $pas -> kode]) }}" class="btn btn-sm w-100 btn-warn">Detail</a>
								</td>
							</tr>@endforeach</tbody>
					</table>
			</div>
		</div>
	</div>
</section>
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