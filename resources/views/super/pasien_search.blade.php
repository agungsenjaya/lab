@extends('layouts.super')
@section('content')
@php
$no = 1;
@endphp
<section>
    <div class="container">
    <div class="card shadow">
		<div class="card-body">

        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  
</svg>

        <div class="alert alert-primary d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
            <div>
                Fitur untuk mencari pasien diseluruh cabang laboratorium
            </div>
        </div>

        <table id="table1" class="table table-striped w-100 table-bordered">
            <thead class="title-3 text-uppercase text-primary">
                <tr>
                    <th scope="col" class="border-top-0 py-2">#</th>
                    <th scope="col" class="border-top-0 py-2">Nama Lengkap</th>
                    <th scope="col" class="border-top-0 py-2">Ktp</th>
                    <th scope="col" class="border-top-0 py-2">JML Berobat</th>
                    <th scope="col" class="border-top-0 py-2">Date Reg</th>
                    <th scope="col" class="border-top-0 py-2">Actions</th>
                </tr>
            </thead>
            <tbody class="font-size-1 text-capitalize">@foreach($pasien->reverse() as $pas)
                <tr>
                    <td>{{ counTing($no++) }}</td>
                    <td>{{ $pas->name }}</td>
                    <td>{{ $pas->ktp }}</td>
                    @php
                    $data = \App\Diagnosa::where('pasien_id', $pas->id)->get();
                    @endphp
                    <td class="text-uppercase">{{ counTing(count($data)) }}</td>
                    <td>{{ $pas->created_at }}</td>
                    <td><a href="{{ route('super.pasien_detail',['id' => $pas -> id]) }}" class="btn btn-sm w-100 btn-warn">Detail</a>
                    </td>
                </tr>@endforeach</tbody>
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
<script src="https://htmlstream.com/preview/nova-v1.2.2/assets/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
<!-- <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> -->
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script>
    $('#table1').DataTable();
</script>
@endsection