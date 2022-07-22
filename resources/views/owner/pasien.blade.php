@extends('layouts.owner')
@section('content')
@php
$no = 1;
@endphp
<section>
    <div class="container">
        <div class="card card-body shadow">
        <div class="d-flex justify-content-between">
					<div>
						
					</div>
					<div>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('dashboard.owner') }}">Dashboard</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Pasien</li>
							</ol>
						</nav>
					</div>
				</div>
                <form id="satu">
                @csrf
                <div class="row mb-3">
                    <div class="col">
                        <label for="" class="form-label">Cabang</label>
                        <select name="cabang_id" id="" class="form-select" required>
                            <option value="">--Select Option--</option>
                            @foreach($cabang as $cab)
                            <option value="{{ $cab->id }}">{{ $cab->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="" class="form-label">Start Date</label>
                        <div class="input-group">
                            <input type="date" name="start" class="form-control" required>
                            <!-- <button class="btn btn-primary px-3" type="button" id="button-1"> <i class="bi bi-x-circle-fill"></i> </button> -->
                        </div>
                    </div>
                    <div class="col">
                        <label for="" class="form-label">End Date</label>
                        <div class="input-group">
                            <input type="date" name="end" class="form-control" required>
                            <!-- <button class="btn btn-primary px-3" type="button" id="button-2"> <i class="bi bi-x-circle-fill"></i> </button> -->
                        </div>
                    </div>
                </div>
                <a href="javascript:void(0)" onCLick="window.location.reload()" class="btn btn-secondary me-2"><i class="bi bi-arrow-clockwise me-2"></i>Reset</a>
                <button type="submit" class="btn btn-primary">View Pasien</button>
            </form>
        </div>
    </div>
</section>
<section class="pt-4" id="psn">
    <div class="container">
        <div class="card">
            <div class="card-header">
            <p class="mb-0 title-2">Table Pasien</p>
            </div>
            <div class="card-body">

            <table id="table1" class="table table-striped w-100 table-bordered">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col" class="border-top-0 py-2">#</th>
                    <th scope="col" class="border-top-0 py-2">Nama Lengkap</th>
                    <th scope="col" class="border-top-0 py-2">Dokter</th>
                    <th scope="col" class="border-top-0 py-2">User</th>
                    <th scope="col" class="border-top-0 py-2">Kode Transaksi</th>
                    <th scope="col" class="border-top-0 py-2">Tgl Pemeriksaan</th>
                    <th scope="col" class="border-top-0 py-2">Actions</th>
                </tr>
            </thead>
                <tbody class="text-capitalize" id="pasien">
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
    function counTing(e) {
        let len = e;
        switch (len) {
            case len:
                if (len < 10) {
                    return '0' + e;
                }else {
                    return e;
                }
                break;
        }
    }
    let table = $('#table1').DataTable();
    let cetak_klinik,excel_klinik;
    let no = 1;
    $('#satu').submit(function (stay) {
        var formdata = $(this).serializeArray();
        $.ajax({
            type: "POST",
            url: "http://localhost:8000/api/v1/pasien_cabang",
            data: formdata,
            success: function (response) {
                table.clear().draw();
                if (response.data.length > 0) {
                    for (let index = 0; index < response.data.length; index++) {
                        const element = response.data[index];
                        let ids = counTing(element.id) + element.kode.substring(0,5);
                        table.row.add([no++,element.pasien_id,element.dokter_id,element.user_id, ids.toUpperCase(),element.ctd, `<a href="http://localhost:8000/owner/diagnosa/${element.kode}" target="_blank" class="btn btn-sm w-100 btn-warn">Detail</a>`]).draw(false);
                    }
                    console.log(response);
                }else{
                    // $('#lpr, #psn').addClass('d-none');
                    alert('Tanggal laporan kosong');
                }
            }
        });
        stay.preventDefault(); 
    });
</script>
@endsection