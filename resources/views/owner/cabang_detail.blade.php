@extends('layouts.owner')
@section('content')
<section>
    <div class="container">
        <div class="card card-body shadow">
        <div class="d-flex justify-content-between mb-4">
					<div></div>
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
        <div class="row">
        <div class="col-md-8">
            <table class="table line-h-2">
                <tr>
                    <td class="title-3 text-uppercase">Nama Cabang</td>
                    <td>:</td>
                    <td class="text-uppercase">{{ $data->name }}</td>
                </tr>
                <tr>
                    <td class="title-3 text-uppercase">Nomor Telepon</td>
                    <td>:</td>
                    <td class="text-capitalize">
                        @if($data->phone)
                        {{ $data->phone }}
                        @else
                        -
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="title-3 text-uppercase">Jumlah Karyawan</td>
                    <td>:</td>
                    <td class="text-capitalize">
                        @php
                        $nan = \App\User::where('cabang_id', $data->id )->get();
                        @endphp
                        {{ counTing(count($nan)) }}
                    </td>
                </tr>
                <tr class="border-transparent">
                    <td class="title-3 text-uppercase">Kota/Kabupaten</td>
                    <td>:</td>
                    <td class="text-capitalize">{{ $data->kota }}</td>
                </tr>
            </table>
        </div>
        <div class="col-md-4">
        <div class="alert alert-success h-100" role="alert">
        <p class="alert-heading title-3 text-uppercase fw-bold"><i class="bi bi-info-circle-fill me-2"></i>Alamat Lengkap</p>
        <!-- <p>{{ $data->alamat }}</p> -->
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, perferendis repellat, nemo ex impedit pariatur rem obcaecati</p>
        </div>
        </div>
        </div>
        </div>
    </div>
</section>
<!-- <section class="space-m">
  <div class="container">
  </div>
</section> -->
<section class="space-m">
    <div class="container">
    <div class="card card-body shadow">

    <h5 class="title-2 mb-4">Table Users</h5>

    @php
    $no = 1;
    $dat = \App\User::where('cabang_id', $data->id)->get();
    @endphp

    <table id="table1" class="table table-striped w-100 table-bordered">
    <thead class="title-3 text-uppercase fw-bold text-lab">
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
          <i class="text-lab bi bi-person-badge me-2"></i>{{ $dat->roles[0]->name }}
          <!-- - -->
        </td>
        <td>
          <a href="{{ route('super.user_edit',['id' => $dat -> id]) }}" class="btn btn-warn w-100 btn-sm">Edit</a>
        </td>
      </tr>
      @endif
      @endforeach
      @endif
    </tbody>
  </table>
        
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