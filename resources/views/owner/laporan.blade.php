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
            <form>
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
                        <input type="date" name="end" class="form-control">
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
<section class="pt-4 d-none" id="laporan">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 class="title-2 mb-0">Total Penagihan</h5>
            </div>
            <div class="card-body oko bg-white" id="capture">
            <div id="img-out">
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
                        <td class="col-4">Nama Cabang</td>
                        <td class="col-1">:</td>
                        <td class="text-capitalize col">{{ $cab->name }}</td>
                    </tr>
                    <tr class="row">
                        <td class="col-4">Jumlah Transaksi</td>
                        <td class="col-1">:</td>
                        <td class="col"><span id="trans">-</span></td>
                    </tr>
                    <tr class="row">
                        <td class="col-4">Periode Tanggal</td>
                        <td class="col-1">:</td>
                        <td class="col"><span id="priode">-</span></td>
                    </tr>
                    <tr class="row border-transparent">
                        <td class="col-4">Total Penagihan</td>
                        <td class="col-1">:</td>
                        <th class="col">Rp <span id="price">-</span> </th>
                    </tr>
                </table>
            </div>
            </div>
            <div class="card-footer">
                <a href="javascript:viod(0)" id="snap" class="btn btn-primary"> <i class="bi bi-download me-2"></i>Download Image</a>
            </div>
        </div>
    </div>
</section>
<section class=" pt-4 d-none">
    <div class="container">
        <div class="card">
            <div class="card-header">
            <h5 class="title-2 mb-0">Table Pasien</h5>
            </div>
            <div class="card-body">
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/canvas2image@1.0.5/canvas2image.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.8/FileSaver.min.js"></script>
<script src="{{ asset('js/canvas-toBlob.js') }}"></script>
<script src="{{ asset('js/Blob.js') }}"></script>
<script>
    $('form').submit(function (stay) {
        var formdata = $(this).serializeArray();
        $.ajax({
            type: "POST",
            url: "http://localhost:8000/api/v1/laporan_keuangan",
            data: formdata,
            success: function (response) {
                if (response.data.length > 0) {
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
                    console.log(response);
                }else{
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