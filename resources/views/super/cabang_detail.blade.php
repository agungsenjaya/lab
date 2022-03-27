@extends('layouts.super')
@section('content')
<section>
    <div class="container">
        <div class="card card-body shadow">
        <div class="row">
        <div class="col-md-8">
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
        <div class="col-md-4">
        <div class="alert alert-primary h-100" role="alert">
        <p class="alert-heading fw-bold"><i class="bi bi-info-circle-fill me-2"></i>Alamat Cabang</p>
        <p class="text-capitalize">{{ Auth::user()->cabang->alamat }}</p>
        </div>
        </div>
        </div>
        </div>
    </div>
</section>
@endsection