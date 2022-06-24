@extends('layouts.app')
@section('content')
@include('modal')
@include('header')
@php
$no = 1;
@endphp
<section class="min-vh-100 space-m">
    <div class="container">
    <div class="card col-md-10 offset-md-1">
      <div class="card-body">
      <div class="d-flex justify-content-between mb-4">
					<div>
						<h5 class="title-3 fw-bold mb-0">Daftar Dokter</h5>
						<p class="mb-0 text-secondary">Informasi dokter laboratorium</p>
					</div>
					<div>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Dokter</li>
							</ol>
						</nav>
					</div>
				</div>
      <table id="table1" class="table table-striped w-100 table-bordered">
    <thead class="bg-primary text-white">
      <tr>
        <th>No</th>
        <th>Nama Dokter</th>
        <!-- <th>Jml Pemeriksaan</th> -->
        <th>Date Reg</th>
      </tr>
    </thead>
    <tbody class="text-capitalize">
      @if($dokter)
      @foreach($dokter->reverse() as $dat)
      <tr>
        <td>{{ counTing($no++) }}</td>
        <td>{{ $dat->name }}</td>
        <!-- <td>
          @php
          $data = App\Diagnosa::where('dokter_id', $dat->id)->count();
          echo counTing($data);
          @endphp
        </td> -->
        <td>
          @if($dat->created_at)
          {{ $dat->created_at }}
          @else
          -
          @endif
        </td>
      </tr>
      @endforeach
      @endif
    </tbody>
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
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script>
  $(document).ready(function() {
    $('#table1').DataTable();
  });

</script>
@endsection