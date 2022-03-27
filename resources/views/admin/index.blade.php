@extends('layouts.app')
@section('content')
@include('modal')
@include('header')
<section class="min-vh-100 bg-primary">
<div class="space-m">
  <div class="container">
  <div class="row">
  <div class="col-md-8 offset-md-2">
    <div class="card mb-4 text-center">
      <div class="card-body">
        <div class="row">
          <div class="col-md">
            <p class="mb-0 small">Kode Cabang</p>
            <h5 class=" fw-bold text-primary text-uppercase">{{ Auth::user()->cabang->kode }}</h5>
          </div>
          <div class="col-md border-start">
            <p class="mb-0 small">Tanggal</p>
            <h5 class=" fw-bold text-primary">{{ date('d M Y') }}</h5>
          </div>
          <div class="col-md border-start">
          <p class="mb-0 small">Total Pasien</p>
            <h5 class=" fw-bold text-primary">{{ counTing(count($data)) }}</h5>
          </div>
        </div>
      </div>
    </div>
  <div class="row">
    <a href="{{ route('admin.pasien') }}" class="col-md-6 mb-4">
      <div class="card card-home">
        <div class="card-body align-items-center h-100 d-flex">
          <div class="media">
          <i class="text-warn bi bi-archive me-3 h3 mb-0"></i>
            <div class="media-body">
            <h5 class="title-3 text-capitalize fw-bold mb-0">Table Pasien</h5>
            <p class="mb-0">Pasien di laboratorium</p>
            </div>
          </div>
        </div>
      </div>
</a>
    <a href="{{ route('admin.pasien_new') }}" class="col-md-6 mb-4">
      <div class="card card-home">
        <div class="card-body align-items-center h-100 d-flex">
          <div class="media">
          <i class="text-warn bi bi-card-list me-3 h3 mb-0"></i>
            <div class="media-body">
            <h5 class="title-3 text-capitalize fw-bold mb-0">Input Pasien</h5>
            <p class="mb-0">Input data pasien baru</p>
            </div>
          </div>
        </div>
      </div>
</a>
    <a href="{{ route('admin.dokter') }}" class="col-md-6 mb-4">  
      <div class="card card-home">
        <div class="card-body align-items-center h-100 d-flex">
          <div class="media">
          <i class="text-warn bi bi-person me-3 h3 mb-0"></i>
            <div class="media-body">
            <h5 class="title-3 text-capitalize fw-bold mb-0">Nama Dokter</h5>
          <p class="mb-0">Daftar list dokter</p>
            </div>
          </div>
        </div>
      </div>
</a>
    <a href="{{ route('admin.info') }}" class="col-md-6 mb-4">
      <div class="card card-home">
        <div class="card-body align-items-center h-100 d-flex">
          <div class="media">
          <i class="text-warn bi bi-info-circle me-3 h3 mb-0"></i>
            <div class="media-body">
            <h5 class="title-3 text-capitalize fw-bold mb-0">Informasi Lab</h5>
          <p class="mb-0">Detail laboratorium</p>
            </div>
          </div>
        </div>
      </div>
</a>
    </div>
    <br>
    <br>
    <p class="text-white small text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla, et quam. Quisquam laboriosam, fuga illo ipsam nisi recusandae officiis a ducimus debitis officia, nam ab non. Soluta distinctio ullam doloremque? Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla, et quam. Quisquam laboriosam, fuga illo ipsam nisi recusandae officiis a ducimus debitis officia, nam ab non. Soluta distinctio ullam doloremque?</p>
    </div>
    </div>
    <!-- <p class="text-center text-uppercase title-3 text-white small mb-0">&copy; Copyright {{ date('Y') }} <a href="https://codejira.com/" class="text-white" target="_blank">Codejira</a>.  All rights reserved</p> -->
  </div>
</div>
</section>
@endsection