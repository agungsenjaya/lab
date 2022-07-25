@extends('layouts.owner')
@section('content')
@php
$no = 1;
@endphp
<section class="">
  <div class="container">
    <div class="card card-body shadow">
    <table id="table1" class="table table-striped w-100 table-bordered">
    <thead class="title-3 fw-bold bg-primary text-white">
      <tr>
        <th>No</th>
        <th>Jenis Pemeriksaan</th>
        <th>Nilai Normal</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody class="text-capitalize">
    @if($nilai)
      @foreach($nilai as $nil => $item)
      <tr>
        <td>{{ counTing($no++) }}</td>
        <td>
          @php
          $dot  = App\Formula::find($nil);
          @endphp
          {{ $dot->judul }}
        </td>
        <td>
        @for($i = 0; $i < count($item); $i++)
    @php
    $lat = json_encode($item[$i]);
    $lot = json_decode($lat);
    @endphp
    @if($lot->kelamin == "laki-laki")
      L : {{ $lot->normal }}
    @elseif($lot->kelamin == "perempuan")
     P : {{ $lot->normal }}
     @else
     {{ $lot->normal }}
     @endif
    @endfor
        </td>
        <td>
          <a href="{{ route('owner.nilai_edit',[ 'id' => $nil ]) }}" class="btn btn-warn btn-sm w-100">Edit</a>
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