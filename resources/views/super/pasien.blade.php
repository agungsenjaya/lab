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
      <h5 class="card-title">Jumlah Pasien</h5>
      <h1 class="text-warn title-2">{{ counTing(count($month)) }}</h1>
      <p class="">Total pasien 3 bulan terakhir</p>
    </div>
  </div>
  <div class="d-center text-end d-flex align-items-end">
    <div class="w-100">
      <img src="{{ asset('img/shape-4.svg') }}" alt="" width="80%">
    </div>
  </div>
  </div>

      </div>
      <div class="col-md-4">

      <div class="position-relative">
  <div class="card shadow bg-primary text-white">
  <div class="card-body z-index-100">
      <h5 class="card-title">Pasien Hari Ini</h5>
      <h1 class="text-warn title-2">{{ counTing(count($today)) }}</h1>
      <p class="">Total pasien hari ini</p>
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
    <div class="alert alert-primary rounded-0">* Laporan pasien bisa dilihat maksimal 3 bulan ke belakang</div>
    <div class="row mb-4">
      <div class="col">
        <!-- <label for="" class="form-label">Minimun Date</label> -->
        <input id="min" class="form-control" name="min" placeholder="Minimum Date">
      </div>
      <div class="col">
        <!-- <label for="" class="form-label">Maximum Date</label> -->
        <input id="max" class="form-control" name="max" placeholder="Maximum Date">
      </div>
    </div>

				<table id="table1" class="table table-striped w-100 table-bordered">
						<thead class="bg-primary text-white">
							<tr>
								<th scope="col" class="border-top-0 py-2">#</th>
								<th scope="col" class="border-top-0 py-2">Nama Lengkap</th>
								<th scope="col" class="border-top-0 py-2">Dokter</th>
                <th scope="col" class="border-top-0 py-2">User</th>
								<th scope="col" class="border-top-0 py-2">Kode Transaksi</th>
								<th scope="col" class="border-top-0 py-2">Tgl Pemeriksaan</th>
								<th scope="col" class="border-top-0 py-2">Actions</th>
							</tr>
						</thead>
						<tbody class="font-size-1 text-capitalize">@foreach($month->reverse() as $pas)
							<tr>
								<td>{{ counTing($no++) }}</td>
								<td>{{ $pas->pasien->name }}</td>
								<td><i class="text-primary bi bi-person-badge me-2"></i>{{ $pas->dokter->name }}</td>
                <td>{{ $pas->user->name }}</td>
								<td class="text-uppercase">{{ counTing($pas->id) . substr($pas->kode, 0 ,5) }}</td>
								<td>{{ $pas->created_at->format('Y/m/d') }}</td>
								<td><a href="{{ route('super.diagnosa',['id' => $pas -> kode]) }}" class="btn btn-sm w-100 btn-warn">Detail</a>
								</td>
							</tr>@endforeach</tbody>
					</table>

  </div>
  </div>
</section>
@endsection
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.1/css/dataTables.dateTime.min.css">
@endsection
@section('js')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/autonumeric@4.1.0"></script>

<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js"></script>

<script>
    var table = $('#table1').DataTable({
      "info": true,
      "paging": true,
      dom: 'lBfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
    });

    var minDate, maxDate;
 
// Custom filtering function which will search data in column four between two values
$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = minDate.val();
        var max = maxDate.val();
        var date = new Date( data[5] );
 
        if (
            ( min === null && max === null ) ||
            ( min === null && date <= max ) ||
            ( min <= date   && max === null ) ||
            ( min <= date   && date <= max )
        ) {
            return true;
        }
        return false;
    }
);
 
$(document).ready(function() {
    // Create date inputs
    minDate = new DateTime($('#min'), {
        format: 'YYYY/MM/DD'
    });
    maxDate = new DateTime($('#max'), {
        format: 'YYYY/MM/DD'
    });
 
    // // DataTables initialisation
    // var table = $('#example').DataTable();
 
    // Refilter the table
    $('#min, #max').on('change', function () {
        table.draw();
    });
});

    $('#table1_length').addClass('mb-3')
    $('#table1_filter input').addClass('form-control')
    // $('#table1_length select').addClass('custom-select custom-select-sm')
    $('.dt-button').removeClass('dt-button').addClass('mb-3 btn btn-warn text-primary me-2');
    // $('#table1_paginate').addClass('btn btn-sm btn-success');
    // $('#table1_paginate > .paginate_button').addClass('text-white mx-2');

</script>
@endsection
