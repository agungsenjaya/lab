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
  <div class="card shadow bg-primary text-white">
  <div class="card-body z-index-100">
      <h5 class="card-title">Jumlah Dokter</h5>
      <h1 class="text-warn title-2">{{ counTing(count($data)) }}</h1>
      <p class="">Total dokter laboratorium <span class="text-capitalize">{{ Auth::user()->cabang->name }}</span></p>
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
        <div>
        <table id="table1" class="table table-striped w-100 table-bordered">
    <thead class="title-3 text-uppercase fw-bold text-primary">
      <tr>
        <td>No</td>
        <td>Nama</td>
        <td>Status</td>
        <td>Date Reg</td>
        <td>Actions</td>
      </tr>
    </thead>
    <tbody class="text-capitalize">
          @foreach($data->reverse() as $dat)
          <tr>
            <td>{{ counTing($no++) }}</td>
            <td>{{ $dat->name }}</td>
            <td>
              @if($dat->deleted_at)
              @else
              <span class="badge bg-primary text-uppercae rounded-pill w-100">Aktif</span>
              @endif
            </td>
            <td>
              @if($dat->created_at)
              {{ $dat->created_at }}
              @else
              -
              @endif
            </td>
            <td>
              <a href="{{ route('super.dokter_edit',['id' => $dat -> id]) }}" class="btn btn-warn w-100 btn-sm">Edit</a>
            </td>
          </tr>
          @endforeach
</tbody>
</table>
        </div>
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