@extends('layouts.super')
@section('content')
<section>
    <div class="container">
        <div class="card card-body shadow">
        <div class="d-flex justify-content-between mb-4">
					<div>
						
					</div>
					<div>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('super.dokter') }}">Dokter</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Detail dokter</li>
							</ol>
						</nav>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						
					</div>
				</div>

				<!-- <div class="media">
					<img src="{{ asset('img/user.png') }}" alt="" width="80" class="me-2">
					<div class="media-body">
						<h5 class="text-uppercase title-3 text-lab fw-bold">{{ $data->name }}</h5>
						<span class="badge bg-lab w-100">Aktif</span>
					</div>
				</div> -->

        </div>
    </div>
</section>
@endsection