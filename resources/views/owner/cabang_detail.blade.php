@extends('layouts.owner')
@section('content')
<section>
    <div class="container">
        <div class="card card-body shadow">
        <div class="d-flex justify-content-between mb-4">
					<div class="d-flex">
            <div>
              <a href="{{ route('owner.laporan',['id' => $data -> id]) }}" class="btn btn-primary">Laporan Keuangan</a>
            </div>

            <!-- <div class="ms-3">
          <select name="" id="" class="form-select">
            <option value="">--Select Option--</option>
          </select>
        </div> -->

          </div>
					<div>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('owner.cabang') }}">Cabang</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Detail Cabang</li>
							</ol>
						</nav>
					</div>
				</div>

        <div class="card-deck mb-3">
  <div class="card alert-primary">
    <div class="card-body">
      <h5 class="card-title title-2 text-primary">Jumlah Dokter</h5>
      <h1 class="title-2 text-primary">@php
                        $non = \App\Dokter::where('cabang_id', $data->id )->get();
                        @endphp
                        {{ counTing(count($non)) }}</h1>
      
      
    </div>
  </div>
  <div class="card alert-primary">
    <div class="card-body">
      <h5 class="card-title title-2 text-primary">Jumlah Transaksi</h5>
      <h1 class="title-2 text-primary">
      @php
        $nen = \App\Diagnosa::where('cabang_id', $data->id )->get();
        @endphp
        {{ counTing(count($nen)) }}
      </h1>
      
      
    </div>
  </div>
  <div class="card alert-primary">
    <div class="card-body">
      <h5 class="card-title title-2 text-primary">Transaksi Hari Ini</h5>
      <h1 class="title-2 text-primary">
      @php
        $nen = \App\Diagnosa::where('cabang_id', $data->id )->get();
        @endphp
        {{ counTing($today) }}
      </h1>
      
      
    </div>
  </div>
  <div class="card alert-primary">
    <div class="card-body">
      <h5 class="card-title title-2 text-primary">Jumlah User</h5>
      <h1 class="title-2 text-primary">
      @php
                      $nan = \App\User::where('cabang_id', $data->id )->get();
                      @endphp
                      {{ counTing(count($nan)) }}
      </h1>
      
      
    </div>
  </div>
</div>

        <div class="row">
        <div class="col-md-12">
            <table class="table line-h-2">
                <tr class="row">
                    <td class="title-3 col-4 text-capitalize">Kode Cabang</td>
                    <td class="col-1">:</td>
                    <td class="text-uppercase col">
                      <div class="badge alert-primary">
                        {{ $data->kode }}
                      </div>
                    </td>
                </tr>
                <tr class="row">
                    <td class="title-3 col-4 text-capitalize">Supervisor</td>
                    <td class="col-1">:</td>
                    <td class="text-capitalize col">
                      @php
                      $usr = \App\User::where('cabang_id', $data->id )->get();
                      @endphp
                      @foreach($usr as $us)
                      @if($us->hasRole('superadmin'))
                          {{ $us->name }}
                      @endif
                      @endforeach
                    </td>
                </tr>
                <tr class="row">
                    <td class="title-3 col-4 text-capitalize">Nama Cabang</td>
                    <td class="col-1">:</td>
                    <td class="text-capitalize col">{{ $data->name }}</td>
                </tr>
                <tr class="d-none">
                    <td class="title-3 col-4 text-capitalize">Nomor Telepon</td>
                    <td class="col-1">:</td>
                    <td class="text-capitalize col">
                        @if($data->phone)
                        {{ $data->phone }}
                        @else
                        -
                        @endif
                    </td>
                </tr>
                <tr class="row">
                    <td class="title-3 col-4 text-capitalize">Kota/Kabupaten</td>
                    <td class="col-1">:</td>
                    <td class="text-capitalize col">{{ $data->kota }}</td>
                </tr>
                <tr class="border-transparent row">
                    <td class="title-3 col-4 text-capitalize">Alamat</td>
                    <td class="col-1">:</td>
                    <td class="text-capitalize col">{{ $data->alamat }}</td>
                </tr>
            </table>
        </div>
        </div>
        </div>
    </div>
</section>
<section class="space-m">
    <div class="container">
    <div class="card shadow">
      <div class="card-header">
        <h5 class="title-2 mb-0">Table Users</h5>
      </div>
    <div class="card-body">


    @php
    $no = 1;
    $dat = \App\User::where('cabang_id', $data->id)->get();
    @endphp

    <table id="table1" class="table table-striped w-100 table-bordered">
    <thead class="title-3 fw-bold bg-primary text-white">
      <tr>
        <td>No</td>
        <td>Nama</td>
        <td>Email</td>
        <td>Date Reg</td>
        <td>Role</td>
        <td>Actions</td>
      </tr>
    </thead>
    <tbody class="text-capitalize">
      @if($dat)
      @foreach($dat->reverse() as $dat)
      @if($dat->hasRole('admin') || $dat->hasRole('superadmin'))
      <tr>
        <td>{{ counTing($no++) }}</td>
        <td>{{ $dat->name }}</td>
        <td class="text-lowercase">{{ $dat->email }}</td>
        <td>
          {{ $dat->created_at }}
        </td>
        <td>
          <i class="text-primary bi bi-person-badge me-2"></i>{{ $dat->roles[0]->name }}
          <!-- - -->
        </td>
        <td>
          <a href="{{ route('owner.user_edit',['id' => $dat -> id]) }}" class="btn btn-warn w-100 btn-sm">Edit</a>
        </td>
      </tr>
      @endif
      @endforeach
      @endif
    </tbody>
  </table>
        
    </div>
    </div>
    </div>
</section>
@endsection
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection
@section('js')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script>
  $(document).ready(function() {
    $('#table1').DataTable();
  });

</script>
@endsection