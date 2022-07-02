@extends('layouts.owner')
@section('content')
<section>
    <div class="container">
        <div class="card card-body shadow">
        <div class="d-flex justify-content-between">
					<div>
						
					</div>
					<div>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('owner.user') }}">Cabang</a>
								</li>
								<li class="breadcrumb-item"><a href="{{ route('owner.cabang_detail',['id' => $cab -> id]) }}">Cabang Detail</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Laporan Keuangan</li>
							</ol>
						</nav>
					</div>
				</div>
                <div class="card-deck mb-3">
                    <div class="card border-0">
                        <div class="card-body">
                            <table class="table">
                                <tr class="row">
                                    <td class="col-4">Kode Cabang</td>
                                    <td class="col-1">:</td>
                                    <td class="col">
                                        <div class="badge alert-primary text-uppercase">
                                            {{ $cab->kode }}
                                        </div>
                                    </td>
                                </tr>
                    <tr class="row">
                        <td class="title-3 col-4 text-capitalize">Supervisor</td>
                        <td class="col-1">:</td>
                        <td class="text-uppercase col">
                        @php
                        $usr = \App\User::where('cabang_id', $cab->id )->get();
                        @endphp
                        @foreach($usr as $us)
                        @if($us->hasRole('superadmin'))
                            {{ $us->name }}
                        @endif
                        @endforeach
                        </td>
                    </tr>
                    <tr class="row">
                        <td class="col-4">Nama Cabang</td>
                        <td class="col-1">:</td>
                        <td class="col text-capitalize">
                                {{ $cab->name }}
                        </td>
                    </tr>
                    <tr class="row border-transparent">
                        <td class="col-4">Alamat</td>
                        <td class="col-1">:</td>
                        <td class="col text-capitalize">
                                {{ $cab->alamat }}
                        </td>
                    </tr>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <p class="mb-0 title-2">
                                Total Invoice
                            </p>
                        </div>
                        <div>
                            <p class="mb-0">
                                Periode : <span id="priode">-</span>
                            </p>
                        </div>
                        </div>
                        <div class="card-body align-self-center text-center">
                            <h1 class="mb-0 title-2 display-6">Rp <span id="price">-</span></h1>
                            <p>Jumlah Transaksi <span id="trans">-</span></p>
                        </div>
                    </div>
                </div>
            <form id="satu">
                @csrf
                <input type="hidden" name="total">
                <input type="hidden" name="cabang_name" value="{{ $cab->name }}">
                <input type="hidden" name="cabang_id" value="{{ $cab->id }}">
                <div class="row mb-3">
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
                <button type="submit" class="btn btn-primary">View Laporan</button>
            </form>
        </div>
    </div>
</section>
<section class="pt-4 d-none" id="lpr">
    <div class="container">
        <div class="card">
        <div class="card-header">
            <p class="mb-0 title-2">Download Laporan</p>
            </div>
            <div class="card-body">
                <div>
                    <a id="cetak_klinik" target="_blank" class="btn btn-primary me-2"><i class="bi-file-pdf-fill me-2"></i>PDF</a>
                    <a id="excel_klinik" target="_blank" class="btn btn-outline-primary"><i class="bi-file-earmark-excel-fill me-2"></i>Excel</a>
                </div>
                <div class="row mt-3" id="dokter">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="pt-4 d-none" id="psn">
    <div class="container">
        <div class="card">
            <div class="card-header">
            <p class="mb-0 title-2">Table Pasien</p>
            </div>
            <div class="card-body">

            <table id="table1" class="table table-striped w-100 table-bordered">
                <thead class="title-3 fw-bold bg-primary text-white">
                <tr>
                    <th scope="col" class="border-top-0 py-2">#</th>
                    <th scope="col" class="border-top-0 py-2">Tgl Pemeriksaan</th>
                    <th scope="col" class="border-top-0 py-2">Nama Lengkap</th>
                    <th scope="col" class="border-top-0 py-2">Dokter</th>
                    <th scope="col" class="border-top-0 py-2">Jenis Pemeriksaan</th>
                    <th scope="col" class="border-top-0 py-2">Jml Pembayaran</th>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/canvas2image@1.0.5/canvas2image.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.8/FileSaver.min.js"></script>
<script src="{{ asset('js/canvas-toBlob.js') }}"></script>
<script src="{{ asset('js/Blob.js') }}"></script>
<script>
    let table = $('#table1').DataTable();
    let cetak_klinik,excel_klinik;
    $('#satu').submit(function (stay) {
        var formdata = $(this).serializeArray();
        $.ajax({
            type: "POST",
            url: "http://localhost:8000/api/v1/laporan_keuangan",
            data: formdata,
            success: function (response) {
                table.clear().draw();
                if (response.data.length > 0) {
                    $('#lpr, #psn').removeClass('d-none');
                    cetak_klinik = null;
                    excel_klinik = null;
                    $('#laporan').removeClass('d-none');
                    $('#trans').text((response.data.length <= 9) ? '0' + response.data.length : response.data.length);
                    $('#priode').text(response.periode);
                    var price = $('#price');
                    var total = 0;
                    for (let index = 0; index < response.data.length; index++) {
                        const element = response.data[index];
                        total += parseInt(element.pembayaran.replace('.',''));
                    }
                    price.text(total.toLocaleString());
                    $('input[name="total"]').val(total.toLocaleString());
                    for (let index = 0; index < response.dia.length; index++) {
                        const element = response.dia[index];
                        let jenis = [];
                        let pmr = JSON.parse(response.data[index].data);
                        let rpm = JSON.parse(pmr[0]);
                        for (let ind = 0; ind < rpm.length; ind++) {
                            const elen = rpm[ind];
                            if (!elen.data.sub_kat) {
                                jenis.push(elen.data.judul);
                            }
                        }
                        table.row.add([index+1,element.ctd,element.pasien_id,element.dokter_id,jenis,'Rp ' + element.pembayaran]).draw(false);
                    }
                    $('#dokter').empty();
                    for (const key of Object.keys(response.dk)) {
                        $.getJSON(`http://localhost:8000/api/v1/dokter_detail/${key}`, function (data) {
                            var tot = 0;
                            for (let index = 0; index < response.dk[key].length; index++) {
                                const element = response.dk[key][index];
                                tot += parseInt(element.pembayaran.replace('.',''));
                            }
                            $('#dokter').append(`<div class="col-md-4 mb-3">
                            <div class="card">
                            <div class="card-body">
                                <h4 class="title-2 mb-0">Rp <span>${tot.toLocaleString()}</span></h4>
                                <p class="card-title fw-semibold mb-0 text-capitalize">${data.data.name}</p>
                            </div>
                            <div class="card-footer">
                                <a target="_blank" href="http://localhost:8000/owner/cetak/dokter?start_date=${$('input[name="start"]').val()}&end_date=${$('input[name="end"]').val()}&cabang_id=${<?php echo $cab->id; ?>}&cabang_name=${$('input[name="cabang_name"]').val()}&total=${tot.toLocaleString()}&dokter_id=${data.data.id}&dokter_name=${data.data.name}" class="me-2"><i class="bi-file-pdf-fill me-2"></i>PDF</a>
                                <a target="_blank" href="http://localhost:8000/owner/excel/dokter?start_date=${$('input[name="start"]').val()}&end_date=${$('input[name="end"]').val()}&cabang_id=${<?php echo $cab->id; ?>}&cabang_name=${$('input[name="cabang_name"]').val()}&total=${tot.toLocaleString()}&dokter_id=${data.data.id}&dokter_name=${data.data.name}" class=""><i class="bi-file-earmark-excel-fill me-2"></i>Excel</a>
                            </div>
                            </div>
                            </div>`);
                        });
                        // console.log(key, response.dk[key]);
                    }

                    if ($('input[name="start"]').val() && $('input[name="end"]').val()) {
                        cetak_klinik = `http://localhost:8000/owner/cetak/klinik?start_date=${$('input[name="start"]').val()}&end_date=${$('input[name="end"]').val()}&cabang_id=${<?php echo $cab->id; ?>}&cabang_name=${$('input[name="cabang_name"]').val()}&total=${$('input[name="total"]').val()}`;
                        excel_klinik = `http://localhost:8000/owner/excel/klinik?start_date=${$('input[name="start"]').val()}&end_date=${$('input[name="end"]').val()}&cabang_id=${<?php echo $cab->id; ?>}&cabang_name=${$('input[name="cabang_name"]').val()}&total=${$('input[name="total"]').val()}`;
                    }else if ($('input[name="start"]').val()) {
                        cetak_klinik = `http://localhost:8000/owner/cetak/klinik?start_date=${$('input[name="start"]').val()}&cabang_id=${<?php echo $cab->id; ?>}`;
                        excel_klinik = `http://localhost:8000/owner/excel/klinik?start_date=${$('input[name="start"]').val()}&cabang_id=${<?php echo $cab->id; ?>}`;
                    }
                    $('#cetak_klinik').attr('href',cetak_klinik);
                    $('#excel_klinik').attr('href',excel_klinik);

                    let pmr = JSON.parse(response.data[0].data);
                    let rpm = JSON.parse(pmr[0]);
                    console.log(rpm);
                    console.log(response);
                }else{
                    $('#dokter').empty();
                    $('#price, #priode, #trans').text('-');
                    $('#cetak_klinik, #excel_klinik').removeAttr('href');
                    $('#lpr, #psn').addClass('d-none');
                    alert('Tanggal laporan kosong');
                }
            }
        });
        stay.preventDefault(); 
    });

    var kode = `<?php echo $cab->kode ?>`;
    var name = `<?php echo $cab->name ?>`;
    var date = `{{ date('d M Y') }}`;

    $('#snap').on('click',function(e){
			e.preventDefault()
	    	// $('.oko').css('display', 'block');
	    	html2canvas($("#capture"), {
                dpi: 144,
                useCORS: true,
                onrendered: function (canvas) {
                    theCanvas = canvas;
                    document.getElementById('img-out').appendChild(canvas);
                    canvas.toBlob(function (blob) {
                        // saveAs(blob, variable +" - "+{{ time() }}+".jpg");
                        // saveAs(blob,{{ time() }}+".jpg");
                        saveAs(blob, kode.toUpperCase() + " - " + name.toUpperCase() + " - " + date.toUpperCase()  +".jpg");
                    });
                    document.getElementById('img-out').removeChild(canvas);
                    // $('.oko').css('display', 'none');
                }
            });
	    });
</script>
@endsection