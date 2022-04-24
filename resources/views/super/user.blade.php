@extends('layouts.super')
@section('content')
@php
$no = 1;
@endphp
<section>
  <div class="container">
    <div class="card card-body shadow">
    <table id="table1" class="table table-striped w-100 table-bordered">
    <thead class="title-3 fw-bold bg-primary text-white">
      <tr>
        <td>No</td>
        <td>Nama</td>
        <td>Email</td>
        <td>Status</td>
        <td>Cabang</td>
        <td>Role</td>
        <td>Actions</td>
      </tr>
    </thead>
    <tbody class="text-capitalize">
      @if($data)
      @foreach($data->reverse() as $dat)
      @if($dat->hasRole('admin') || $dat->hasRole('superadmin'))
      <tr>
        <td>{{ counTing($no++) }}</td>
        <td class="text-capitalize">{{ $dat->name }}</td>
        <td class="text-lowercase">{{ $dat->email }}</td>
        <td>
            @if($dat->deleted_at)
            <span class="badge alert-secondary w-100">Deactive</span>
            @else
            <span class="badge alert-primary text-uppercase w-100">Aktif</span>
            @endif
        </td>
        <td>
          {{ ($dat->cabang) ? $dat->cabang->name : '-' }}
        </td>
        <td>
          <i class="text-primary bi bi-person-badge me-2"></i>{{ $dat->roles[0]->name }}
        </td>
        <td>
          <a href="{{ route('super.user_edit',['id' => $dat -> id]) }}" class="btn btn-warn w-100 btn-sm">Edit</a>
        </td>
      </tr>
      @endif
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