@extends('layouts.super')
@section('content')
@php
$no = 1;
@endphp
<section>
    <div class="container">
    <div class="card shadow">
		<div class="card-body">

        <table id="table1" class="table table-striped w-100 table-bordered">
            <thead class="title-3 text-uppercase text-lab">
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