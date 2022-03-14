@extends('layouts.app')
@section('content')
@include('modal')
@include('header')
<div class="bg-lab-2 text-white py-5">
  <div class="text-center">
        <h1 class="title-4 text-uppercase fw-bold my-0">Informasi Labora</h1>
        <p>Detail informasi laboratorium</p>
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
								<li class="breadcrumb-item active" aria-current="page">Informasi</li>
							</ol>
						</nav>

            <div>
              <div class="card border-0 bg-light">
                <div class="card-body">
                <table class="table text-secondary line-h-2">
                  <tr>
                    <td class="title-3 fw-bold text-uppercase text-lab">Name Lab</td>
                    <td>:</td>
                    <td class="text-uppercase title-3">{{ $cabang->name }}</td>
                  </tr>
                  <tr>
                    <td class="title-3 fw-bold text-uppercase text-lab">Phone Number</td>
                    <td>:</td>
                    <td>
                      @if($cabang->phone)
                      {{ $cabang->phone }}
                      @else
                      -
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <td class="title-3 fw-bold text-uppercase text-lab">Kota</td>
                    <td>:</td>
                    <td>{{ $cabang->kota }}</td>
                  </tr>
                  <tr class="border-transparent">
                    <td class="title-3 fw-bold text-uppercase text-lab">Alamat</td>
                    <td>:</td>
                    <td>{{ $cabang->alamat }}</td>
                  </tr>
                  </table>
                </div>
              </div>
            </div>

        </div>
      </div>
    </div>
</section>
@include('footer')
@endsection