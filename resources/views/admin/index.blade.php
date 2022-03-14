@extends('layouts.app')
@section('content')
@include('modal')
<section class="min-vh-100 bg-lab">
@include('header')
<div class="space-m">
  <div class="container">
    <div class="row">
    <a href="{{ route('admin.pasien') }}" class="col-md-6 mb-4">
      <div class="card card-home">
        <div class="card-body align-items-center h-100 d-flex">
          <div class="media">
          <!-- <i class="ms-Icon ms-Icon--UserEvent mr-3 h2"></i> -->
            <div class="media-body">
            <h5 class="title-3 text-uppercase fw-bold mb-0">Table Pasien</h5>
            <p class="mb-0">Pasien di lab   oratorium</p>
            </div>
          </div>
        </div>
      </div>
</a>
    <a href="{{ route('admin.pasien_new') }}" class="col-md-6 mb-4">
      <div class="card card-home">
        <div class="card-body align-items-center h-100 d-flex">
          <div class="media">
          <!-- <i class="ms-Icon ms-Icon--AddFriend mr-3 h2"></i> -->
            <div class="media-body">
            <h5 class="title-3 text-uppercase fw-bold mb-0">Input Pasien</h5>
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
          <!-- <i class="ms-Icon ms-Icon--UserEvent mr-3 h2"></i> -->
            <div class="media-body">
            <h5 class="title-3 text-uppercase fw-bold mb-0">Nama Dokter</h5>
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
          <!-- <i class="ms-Icon ms-Icon--UserEvent mr-3 h2"></i> -->
            <div class="media-body">
            <h5 class="title-3 text-uppercase fw-bold mb-0">Informasi Lab</h5>
          <p class="mb-0">Detail laboratorium</p>
            </div>
          </div>
        </div>
      </div>
</a>
    </div>
    <p class="text-center text-uppercase title-3 text-white small mb-0">&copy; Copyright {{ date('Y') }} <a href="https://codejira.com/" class="text-white" target="_blank">Codejira</a>.  All rights reserved</p>
  </div>
</div>
</section>
@endsection