@extends('layouts.app')
@section('content')
@include('modal')
@include('header')
<section class="min-vh-100 space-m">
    <div class="container">
    <div class="card col-md-10 offset-md-1 mb-4">
      <div class="card-body">
      <div class="d-flex justify-content-between mb-4">
					<div>
						<h5 class="title-3 fw-bold mb-0">Detail Informasi</h5>
						<p class="mb-0 text-secondary">Informasi detail laboratorium</p>
					</div>
					<div>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Informasi</li>
							</ol>
						</nav>
					</div>
				</div>

        <table class="table line-h-2">
            <tr>
                    <td class="title-3 text-capitalize">Kode Cabang</td>
                    <td>:</td>
                    <td class="text-uppercase">
                      <div class="badge alert-primary">
                        {{ Auth::user()->cabang->kode }}
                      </div>
                    </td>
                </tr>
                <tr>
                    <td class="title-3 ">Nama Cabang</td>
                    <td>:</td>
                    <td class="text-capitalize">{{ Auth::user()->cabang->name }}</td>
                </tr>
                <tr class="d-none">
                    <td class="title-3 ">Nomor Telepon</td>
                    <td>:</td>
                    <td class="text-capitalize">
                        @if(Auth::user()->cabang->phone)
                        {{ Auth::user()->cabang->phone }}
                        @else
                        -
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="title-3 ">Jumlah Karyawan</td>
                    <td>:</td>
                    <td class="text-capitalize">
                        @php
                        $nan = \App\User::where('cabang_id', Auth::user()->cabang->id )->get();
                        @endphp
                        {{ counTing(count($nan)) }}
                    </td>
                </tr>
                <tr class="border-transparent">
                    <td class="title-3 ">Kota/Kabupaten</td>
                    <td>:</td>
                    <td class="text-capitalize">{{ Auth::user()->cabang->kota }}</td>
                </tr>
            </table>

</div>
</div>
<div class="text-center">
    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Back Home</a>
</div>
</div>
</section>
@include('footer')
@endsection