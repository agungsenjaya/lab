@extends('layouts.owner')
@section('content')
@php
$no = 1;
@endphp
<section class="">
  <div class="container">
    <div class="card card-body shadow">
    <table id="table1" class="table table-striped w-100 table-bordered">
    <thead class="title-3 text-uppercase fw-bold text-lab">
      <tr>
        <td>No</td>
        <td>Nama</td>
        <td>Karyawan</td>
        <td>Date Reg</td>
        <td>Cabang</td>
        <td>Actions</td>
      </tr>
    </thead>
    <tbody class="text-capitalize">
      @if($cabang)
      @foreach($cabang->reverse() as $cab)
      <tr>
        <td>{{ counTing($no++) }}</td>
        <td>{{ $cab->name }}</td>
        <td>
        <i class="text-lab bi bi-person-badge me-2"></i>
        @php
        $nan = \App\User::where('cabang_id', $cab->id )->get();
        @endphp
        {{ counTing(count($nan)) }}
        </td>
        <td>
          @if($cab->created_at)
          {{ $cab->created_at }}
          @else
          -
          @endif
        </td>
        {{--<td>
            @foreach($nan as $na)
            @if($na->hasRole('superadmin'))
            {{ $na->name }}
            @endif
            @endforeach
        </td>--}}
        <td>{{ $cab->kota }}</td>
        <td>
          <a href="{{ route('owner.cabang_detail',['id' => $cab -> id]) }}" class="btn btn-warn btn-sm">Details</a>
          <a href="{{ route('owner.cabang_edit',['id' => $cab -> id]) }}" class="btn btn-warn btn-sm"> <i class="bi bi-pencil-square"></i> </a>
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