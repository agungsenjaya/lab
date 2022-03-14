@extends('layouts.app')
@section('content')
@include('modal')
@include('header')
<div class="bg-lab-2 text-white py-5">
  <div class="text-center">
        <h1 class="title-4 text-uppercase fw-bold my-0">Dokter Labora</h1>
        <p>Berikut dokter pada laboratorium</p>
  </div>
  </div>
<section class="space-m min-vh-100">
    <div class="container">
      <div class="row">
        <div class="col-md-10 offset-md-1">

        <nav aria-label="breadcrumb" class="mb-4">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Dokter</li>
							</ol>
						</nav>

        <div class="row row-cols-1 row-cols-md-3 g-4">
      @foreach($dokter->reverse() as $dok)
  <div class="col text-center">
    <div class="card shadow h-100">
      <img src="{{ asset('img/user.png')}}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title title-3 text-uppercase fw-bold text-lab">{{ $dok->name }}</h5>
        <div class="badge bg-warn py-2 text-lab w-100"><i class="bi bi-activity me-2"></i>{{ $dok->specialist }}</div>
      </div>
      <div class="card-footer d-flex justify-content-between small title-3 text-uppercase border-0">
        <div class="text-lab fw-bold">Cabang</div>
      <div>
          {{ $dok->cabang->name }}
      </div>

      </div>
    </div>
  </div>
  @endforeach
  
</div>

        </div>
      </div>
    </div>
</section>

@include('footer')
@endsection