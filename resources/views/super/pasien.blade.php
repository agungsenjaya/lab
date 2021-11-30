@extends('layouts.super')
@section('content')
@php
$no = 1;
@endphp
<section>
  <div class="container">
    <div class="row">
      <div class="col-md-4">

      <div class="position-relative">
  <div class="card shadow bg-lab text-white">
  <div class="card-body z-index-100">
      <h4 class="card-title">Jumlah Pasien</h4>
      <h1 class="text-warn title-2">{{ counTing(count($data)) }}</h1>
      <p class="lead">Total pasien yang telah berobat di laboratorium</p>
    </div>
  </div>
  <div class="d-center text-end d-flex align-items-end">
    <div class="w-100">
      <img src="{{ asset('img/shape-4.svg') }}" alt="" width="80%">
    </div>
  </div>
  </div>

      </div>
    </div>
  </div>
</section>
<section class="space-m">
  <div class="container">
    <div class="card card-body shadow">
    <table id="table1" class="table table-striped w-100 table-bordered">
    <thead class="title-3 text-uppercase fw-bold text-lab">
      <tr>
        <td>No</td>
        <td>Nama</td>
        <td>Diagnosa</td>
        <td>Tgl</td>
        <td>Dokter</td>
        <td>Actions</td>
      </tr>
    </thead>
    <tbody class="text-capitalize">
      @if($data)
      @foreach($data->reverse() as $dat)
      <tr>
        <td>{{ counTing($no++) }}</td>
        <td>{{ $dat->pasien->name }}</td>
        <td>
        <i class="text-lab bi bi-activity me-2"></i>{{ $dat->formula->judul }}
        </td>
        <td>
          {{ $dat->created_at }}
        </td>
        <td>
          <i class="text-lab bi bi-person-badge me-2"></i>{{ $dat->dokter->name }}
        </td>
        <td>
          <a href="{{ route('super.diagnosa',['id' => $dat -> kode]) }}" class="btn btn-warn w-100 btn-sm">Details</a>
        </td>
      </tr>
      @endforeach
      @endif
    </tbody>
  </table>

  </div>
  </div>
</section>
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