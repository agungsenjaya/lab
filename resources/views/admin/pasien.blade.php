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
						<h4 class="title-3 text-uppercase fw-bold mb-0 text-lab">Pencarian Pasien</h4>
						<p class="mb-0 text-secondary">List nama pasien</p>
					</div>
					<div>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Pencarian pasien</li>
							</ol>
						</nav>
					</div>
				</div>
				<div class="table-responsive-md datatable">
					<table class="js-datatable table mb-5 table-striped table-bordered" id="example">
						<thead class="title-3 text-uppercase">
							<tr>
								<th scope="col" class="border-top-0 py-2">#</th>
								<th scope="col" class="border-top-0 py-2">Nama Lengkap</th>
								<th scope="col" class="border-top-0 py-2">KTP</th>
								<th scope="col" class="border-top-0 py-2">Jml Berobat</th>
								<th scope="col" class="border-top-0 py-2">Actions</th>
							</tr>
						</thead>
						<tbody class="font-size-1 text-secondary text-capitalize">@foreach($pasien as $pas)
							<tr>
								<td>{{ counTing($no++) }}</td>
								<td>{{ $pas->name }}</td>
								<td>{{ $pas->ktp }}</td>
								<td>@php $data = \App\Diagnosa::where('pasien_id', $pas->id)->get(); @endphp @if($data) {{ counTing(count($data)) }} @endif</td>
								<td><a href="{{ route('admin.pasien_detail',['id' => $pas -> id]) }}" class="btn btn-sm w-100 btn-lab">Detail</a>
								</td>
							</tr>@endforeach</tbody>
					</table>
				</div>
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
    $('#example').DataTable();
</script>
@endsection