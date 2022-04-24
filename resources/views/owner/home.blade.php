@extends('layouts.owner')
@section('content')
@php
$sat = array();
for ($i=0; $i < count($user); $i++) { 
  $em = $user[$i];
    if($em->hasRole('superadmin')){
      array_push($sat,$em);
    }
  }

$sit = array();
for ($i=0; $i < count($user); $i++) { 
  $em = $user[$i];
    if($em->hasRole('admin')){
      array_push($sit,$em);
    }
  }
@endphp
<section>
<div class="row row-cols-1 row-cols-md-3 g-4 text-white">
  <div class="col">
    <div class="position-relative">
  <div class="card shadow bg-primary">
    <div class="card-body z-index-100">
      <h5 class="card-title">Jumlah Dokter</h5>
      <h1 class="text-warn title-2">{{ counTing(count($dokter)) }}</h1>
      <p class="">Kalkulasi semua cabang</p>
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
  <div class="card shadow bg-primary">
  <div class="card-body z-index-100">
      <h5 class="card-title">Pasien Hari Ini</h5>
      <h1 class="text-warn title-2">{{ counTing(count($pasien)) }}</h1>
      <p class="">Kalkulasi pasien cabang</p>
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
  <div class="card shadow bg-primary">
  <div class="card-body z-index-100">
      <h5 class="card-title">Pendapatan Hari Ini</h5>
      <h1 class="text-warn title-2">Rp <span id="pr-1"></span></h1>
      <p class="">Kalkulasi semua cabang</p>
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
<section class="space-m">
  <div class="row">
    <div class="col-md text-white">
      <div class="card shadow bg-primary">
      <div class="card-body">
        <div class="media">
          <img src="{{ asset('img/logo.svg') }}" alt="" width="80" class="me-2">
          <div class="media-body align-self-center">
            <p class="mb-0 text-capitalize">Kalkuasi Total Pendapatan</p>
            <h5 class="text-capitalize text-warn title-2">Rp <span id="pr-2"></span></h5>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md">
    <div class="card shadow h-100">
      <div class="card-body">
        <div class="media ">
          <img src="data:image/svg+xml,%3Csvg width='104' height='104' viewBox='0 0 104 104' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath fill-rule='evenodd' clip-rule='evenodd' d='M20.8 54.4965C20.8 58.8879 20.8 62.3155 20.9874 65.0811C21.1777 67.89 21.5699 70.2045 22.4469 72.3366C24.6429 77.6753 28.8575 81.9225 34.1693 84.1381C36.2926 85.0238 38.5969 85.4193 41.3894 85.6112C44.1376 85.8 47.543 85.8 51.9023 85.8H52.0978C56.4571 85.8 59.8625 85.8 62.6107 85.6112C65.4032 85.4193 67.7075 85.0238 69.8308 84.1381C75.1426 81.9225 79.3572 77.6753 81.5532 72.3366C82.4302 70.2045 82.8224 67.89 83.0127 65.0811C83.2001 62.3155 83.2001 58.8879 83.2001 54.4965V54.3317C83.2001 51.6921 83.2001 49.403 83.1601 47.4H77.9591H26.041H20.84C20.8 49.4031 20.8 51.6924 20.8 54.3322V54.4965ZM65.78 65C63.9133 65 62.4001 66.5133 62.4001 68.38V69.42C62.4001 71.2867 63.9133 72.8 65.78 72.8H66.8201C68.6868 72.8 70.2001 71.2867 70.2001 69.42V68.38C70.2001 66.5133 68.6868 65 66.8201 65H65.78Z' fill='%23005C45'/%3E%3Cpath d='M42.6834 23.1154V21.3958C42.6834 19.6308 41.2526 18.2 39.4876 18.2C37.7225 18.2 36.2917 19.6308 36.2917 21.3958V23.9479C35.5587 24.1412 34.8549 24.3759 34.1693 24.6619C28.8575 26.8775 24.6429 31.1247 22.4469 36.4634C21.7344 38.1954 21.3408 40.0521 21.1164 42.2H26.3502H77.6499H82.8837C82.6593 40.0521 82.2657 38.1954 81.5532 36.4634C79.3572 31.1247 75.1426 26.8775 69.8308 24.6619C69.5654 24.5511 69.2971 24.4481 69.0255 24.3521C68.5957 24.2003 68.1575 24.0663 67.7084 23.9479V21.3958C67.7084 19.6308 66.2776 18.2 64.5126 18.2C62.7475 18.2 61.3167 19.6308 61.3167 21.3958V23.1154C60.7565 23.0896 60.1711 23.0695 59.5583 23.054C57.438 22.9999 55.0032 22.9999 52.1699 23L51.8908 23C48.1997 23 45.1909 22.9999 42.6834 23.1154Z' fill='%23005C45'/%3E%3C/svg%3E%0A" alt="" width="80" class="me-2">
          <div class="media-body align-self-center">
            <h5 class="text-primary title-2">{{ date('d M Y') }}</h5>
            <p class="mb-0">You current location <span class="">Indonesia</span></p>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section>
    <div class="container">
    <!-- <h5 class="title-2">Detail Sistem</h5> -->
    <div class="card-group">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title title-2 text-primary">Total Cabang</h5>
      <h1 class="text-primary title-2">{{ counTing(count($cabang)) }}</h1>
      <p class="card-text"><small class="text-muted"><i class="bi bi-activity me-2 text-primary"></i>Data Sistem</small></p>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title title-2 text-primary">Total Supervisor</h5>
      <h1 class="text-primary title-2">{{ counTing(count($sat)) }}</h1>
      <p class="card-text"><small class="text-muted"><i class="bi bi-activity me-2 text-primary"></i>Data Sistem</small></p>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title title-2 text-primary">Total Admin</h5>
      <h1 class="text-primary title-2">{{ counTing(count($sit)) }}</h1>
      <p class="card-text"><small class="text-muted"><i class="bi bi-activity me-2 text-primary"></i>Data Sistem</small></p>
    </div>
  </div>
</div>
    </div>
</section>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/autonumeric@4.1.0"></script>
<script>
  var aa = new AutoNumeric('#pr-1', <?php echo $totall ?>, {
    digitGroupSeparator : ',',
    allowDecimalPadding: false,
  });
  
  var bb = new AutoNumeric('#pr-2', <?php echo $total ?>, {
    digitGroupSeparator : ',',
    allowDecimalPadding: false,
  });
</script>
@endsection