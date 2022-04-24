@extends('layouts.super')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
            <div class="card card-body shadow">
            <table class="table line-h-2">
            <tr class="row">
                    <td class="title-3 col-6 text-capitalize">Kode Cabang</td>
                    <td class="col-1">:</td>
                    <td class="text-uppercase col">
                      <div class="badge alert-primary">
                        {{ Auth::user()->cabang->kode }}
                      </div>
                    </td>
                </tr>
                <tr class="row">
                    <td class="title-3 col-6 ">Nama Cabang</td>
                    <td class="col-1">:</td>
                    <td class="text-capitalize col">{{ Auth::user()->cabang->name }}</td>
                </tr>
                <tr class="d-none row">
                    <td class="title-3 col-6 ">Nomor Telepon</td>
                    <td class="col-1">:</td>
                    <td class="text-capitalize col">
                        @if(Auth::user()->cabang->phone)
                        {{ Auth::user()->cabang->phone }}
                        @else
                        -
                        @endif
                    </td>
                </tr>
                <tr class="row">
                    <td class="title-3 col-6 ">Jumlah Karyawan</td>
                    <td class="col-1">:</td>
                    <td class="text-capitalize col">
                        @php
                        $nan = \App\User::where('cabang_id', Auth::user()->cabang->id )->get();
                        @endphp
                        {{ counTing(count($nan)) }}
                    </td>
                </tr>
                <tr class="row">
                    <td class="title-3 col-6">Kota/Kabupaten</td>
                    <td class="col-1">:</td>
                    <td class="text-capitalize col">{{ Auth::user()->cabang->kota }}</td>
                </tr>
                <tr class="border-transparent row">
                    <td class="title-3 col-6">Alamat</td>
                    <td class="col-1">:</td>
                    <td class="text-capitalize col">{{ Auth::user()->cabang->alamat }}</td>
                </tr>
            </table>
        </div>
        <!-- <div class="alert alert-primary" role="alert">
        <p class="alert-heading fw-bold"><i class="bi bi-info-circle-fill me-2"></i>Alamat Cabang</p>
        <p class="text-capitalize">{{ Auth::user()->cabang->alamat }}</p>
        </div> -->
        </div>
        </div>
    </div>
</section>
@endsection