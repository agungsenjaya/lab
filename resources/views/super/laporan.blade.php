@extends('layouts.super')
@section('content')
@php
$no = 1;
@endphp
<section class="mb-4">
<!-- <h5 class="title-2 mb-4">Laporan Laboratorium</h5> -->
<div class="row row-cols-1 row-cols-md-3 g-4 text-white">
  <div class="col">
    <div class="position-relative">
  <div class="card shadow bg-lab">
    <div class="card-body z-index-100">
      <h5 class="card-title">Jumlah Dokter</h5>
      <h1 class="text-warn title-2">{{ counTing(count($dokter)) }}</h1>
      <p class="">Total dokter laboratorium <span class="text-capitalize">{{ Auth::user()->cabang->name }}</span></p>
    </div>
  </div>
  <div class="d-center text-end d-flex align-items-end">
    <div class="w-100">
      <img src="{{ asset('img/shape-5.svg') }}" alt="" width="80%">
    </div>
  </div>
  </div>
  </div>
  <div class="col">
    <div class="position-relative">
  <div class="card shadow bg-lab">
  <div class="card-body z-index-100">
      <h5 class="card-title">Jumlah Pasien</h5>
      <h1 class="text-warn title-2">{{ counTing(count($data)) }}</h1>
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
  <div class="col">
    <div class="position-relative">
  <div class="card shadow bg-lab">
  <div class="card-body z-index-100">
      <h5 class="card-title">Total Pendapatan</h5>
      <h1 class="text-warn title-2">Rp<span id="pr"></span></h1>
      <p class="">Total pendapatan hari ini</p>
    </div>
  </div>
  <div class="d-center text-end d-flex align-items-end">
    <div class="w-100">
      <img src="{{ asset('img/shape-5.svg') }}" alt="" width="80%">
    </div>
  </div>
  </div>
  
</div>
</div>
</section>

<section class="space-mb">
  <div class="container">
    <div class="card card-body shadow">
      <h5 class="title-2 mb-4">Table Pasien</h5>

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
    <thead class="title-3 text-uppercase fw-bold text-primary">
      <tr>
        <td>No</td>
        <td>Nama</td>
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
          {{ $dat->created_at->format('Y/m/d') }}
        </td>
        <td>
          <i class="text-primary bi bi-person-badge me-2"></i>{{ $dat->dokter->name }}
        </td>
        <td>
          <a href="javascript:void(0)" class="btn btn-warn w-100 btn-sm">Details</a>
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
        var date = new Date( data[3] );
 
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
        format: 'MMMM Do YYYY'
    });
    maxDate = new DateTime($('#max'), {
        format: 'MMMM Do YYYY'
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

  var an = new AutoNumeric('#pr', <?php echo $total ?>, {
    digitGroupSeparator : ',',
    allowDecimalPadding: false,
  });

</script>
@endsection
