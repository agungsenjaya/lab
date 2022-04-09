@extends('layouts.app')
@section('content')
@include('modal')
@include('header')
<section class="space-m">
	<div class="container">
		<div class="card shadow">
			<div class="card-body">
				<div class="d-flex justify-content-between mb-4">
					<div>
						<h5 class="title-3 fw-bold mb-0">Input Pasien</h5>
						<p class="mb-0 text-secondary">Input data pasien baru</p>
					</div>
					<div>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Input pasien</li>
							</ol>
						</nav>
					</div>
				</div>

				<form method="POST" action="{{ route('admin.pasien_store') }}" id="formDiag">
					@csrf
				<input type="hidden" name="user" value="{{ Auth::user()->id }}">
				<div class="swiper slider-1">
				<div class="swiper-wrapper">
					<div class="swiper-slide p-1">
					<div class="row">
						<div class="mb-3 col ui-widget">
							<label class="form-label" for="">Nomor KTP<span class="ms-2 text-secondary">(Optional)</span>
							</label>
							<input class="form-control kat_val" id="number" aria-describedby="" placeholder="Masukan nomor" name="ktp">
						</div>
						<div class="mb-3 col">
							<label class="form-label" for="">Nama Lengkap <span class="text-danger">*</span>
							</label>
							<input required type="text" class="form-control" id="" aria-describedby="" placeholder="Masukan nama" name="name">
						</div>
					</div>
					<div class="row">
						<div class="mb-3 col">
							<label class="form-label" for="">Jenis Kelamin <span class="text-danger">*</span>
							</label>
							<select required class="form-select" name="kelamin">
								<option class="text-secondary">Chose Option</option>
								<option class="text-secondary" value="laki-laki">Laki-laki</option>
								<option class="text-secondary" value="perempuan">Perempuan</option>
							</select>
						</div>
						<div class="mb-3 col">
							<label class="form-label" for="">Usia <span class="text-danger">*</span>
						</label>
						<div class="input-group">
								<input required class="form-control kat_val" id="" aria-describedby="" placeholder="Masukan usia" name="tgl">
								<span class="input-group-text bg-primary text-white" id="basic-addon2">Tahun</span>
							</div>
						</div>
					</div>
					<div class="mb-4">
						<label class="form-label" for="">Alamat <span class="text-danger">*</span>
						</label>
						<textarea id="" cols="20" rows="5" class="form-control" placeholder="Masukan alamat" name="alamat"></textarea>
					</div>
					<div class="text-start">
						<button type="button" class="next btn btn-primary ">Selanjutnya</button>
					</div>
					</div>
					<div class="swiper-slide p-1">
					<div class="bg-light">
						<table class="table table-striped w-100 table-bordered">
							<thead class="text-white bg-primary">
								<th scope="col" class="border-top-0">Nama Lengkap</th>
								<th scope="col" class="border-top-0">Jenis Kelamin</th>
								<th scope="col" class="border-top-0">Usia</th>
							</thead>
							<tbody>
								<tr class="border-transparent">
									<td>
										<span class="text-capitalize a1">-</span>
									</td>
									<td>
										<span class="text-capitalize a2">-</span>
									</td>
									<td>
										<span class="text-capitalize a3">-</span>
									</td>
								</tr>
							</tbody>
							
						</table>
					</div>
							
						
						<div class="alert alert-primary rounded-0 alert-dismissible fade show text-center h-100" role="alert">
								<div class="">
									<!-- <p class="fw-bold">
										<i class="bi bi-info-circle-fill"></i>
										Perhatian
									</p> -->
									<div>
										Pastikan anda memasukan data diagnosa dengan benar, karena data yang sudah masuk tidak dapat diedit atau dihapus, Terima kasih.
									</div>
								</div>
							</div>
					<div class="row">
					<div class="mb-4 col">
						<input type="hidden" name="data[]">
						<input type="hidden" name="pembayaran">
							<label class="form-label" for="">Dokter <span class="text-danger">*</span>
							</label>
							<select required class="form-select kat_dd" name="dokter">
								<option class="text-secondary">Chose Doctor</option>
								@foreach($dokter as $dok)
								<option class="text-secondary" value="{{ $dok->id }}">{{ $dok->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="mb-4 col">
							<label class="form-label" for="">Tambah Diagnosa</label>
							<select id="form-diagnosa" class="form-select kat_dd">
								<option>Chose Diagnosa</option>
								@foreach($formula as $for)
								<option value="{{ $for }}">
									@if($for->sub_kat)
									@php
									$op = App\Formula::find($for->sub_kat);
									@endphp
									<span>{{ $op->judul }} - </span>
									@endif
									{{ $for->judul }}</option>
								@endforeach
							</select>
						</div>
						</div>
						<div id="diagnosa" class="">
						</div>
						<div class="d-flex justify-content-between">
							<a href="javascript:void(0)" class="prev btn btn-primary  me-2">Kembali</a>
							<a href="javascript:void(0)" onCLick="saving()" class="simpan btn btn-primary">Masukan pasien</a>
							<button type="submit" id="submit"  class="simpan btn btn-primary d-none">Submit</button>
						</div>
					</div>
				</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</section>
@include('footer')
@endsection
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/7.4.1/swiper-bundle.min.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
<link rel="stylesheet" href="{{ asset('css/select2-bootstrap-5-theme.css') }}" />
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.rtl.min.css" /> -->
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/7.4.1/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.2.2/imask.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.13.2/underscore-min.js"></script>
<script src="{{ asset('js/diagnosa.js') }}"></script>
<script>

var formula = <?php echo $formula ?>;
// var bar = formula.find(element => element.id == 1);
// if (bar) {
// 	console.log(bar.judul);
// }

var modalLoad = new bootstrap.Modal(document.getElementById('modalLoad'));

var items = document.getElementsByClassName('kat_val');
var maskOptions = {
	mask: Number,
	};
Array.prototype.forEach.call(items, function(element) {
	var mask = IMask(element, maskOptions);
});

// $( "#number" ).keyup(function() {
$( "#number" ).change(function() {
		var bos = $(this).val();
		$.getJSON(`http://localhost:8000/api/v1/pasiens/${bos}`,
		function (res) {
			if (res.data) {
				$('input[name="name"]').val(res.data.name);
				$('select[name="kelamin"]').val(res.data.kelamin);
				$('input[name="tgl"]').val(res.data.tanggal_lahir);
				$('textarea[name="alamat"]').val(res.data.alamat);
			}
		});
	});

	var swiper = new Swiper(".slider-1", {
			allowTouchMove: false,
			speed: 1,
			navigation: {
			nextEl: ".next",
			prevEl: ".prev",
			},
		});

		$('.next').on('click', function(){
			$('.a1').text($('input[name="name"]').val());
			$('.a2').text($('select[name="kelamin"]').val());
			$('.a3').text($('input[name="tgl"]').val() + ' Tahun');
		});

		var items = document.getElementsByClassName('kat_dd');
		Array.prototype.forEach.call(items, function(element) {
			$(element).select2({
				theme: "bootstrap-5",
				width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
				placeholder: $( this ).data( 'placeholder' ),
			});
	});

	var cek_dig = [{
		data: [],
	}];

	$("#form-diagnosa").on('change', function(){
		var as = JSON.parse(this.value);
		var bro = cek_dig[0].data.find(element => element.id == as.id);
		var bar = formula.find(element => element.id == as.sub_kat);
		if (!bro) {
			cek_dig[0].data.push({id:as.id,data:as});
			$('#diagnosa').append(`
		<div class="row mb-4" data-id="${as.id}">
								<div class="col-2">
									<label for="" class="form-label">Diagnosa</label>
									<input type="text" class="form-control" value="${(bar) ? bar.judul + ' - ' : ''}${as.judul}" disabled>
								</div>
								<div class="col-3">
									<div class="d-flex justify-content-between mb-1">
										<label for="" class="form-label me-2">Nilai Pemeriksaan</label>
										<div class="form-check">
											<input class="form-check-input" type="checkbox" id="flex-${as.id}">
											<label class="form-check-label" for="flex-${as.id}">Anormali</label>
										</div>
									</div>
									<input type="text" data-nilai="${as.id}" class="form-control">
								</div>
								<div class="col">
								<label for="" class="form-label">Nilai Normal</label>
								<input type="text" class="form-control" value="${(as.content) ? as.content : '-'}" disabled>
								</div>
							<div class="col-1">
									<label for="" class="form-label opacity-0">Remove</label>
									<div class="align-self-center text-center">
										<a href="javascript:void(0)" onClick="remove_dig(${as.id})" class="text-danger">
											<i class="bi bi-dash-circle-fill h3"></i>
										</a>
									</div>
								</div>
							</div>
		`);
		}
	});

	function remove_dig(e){
		$("[data-id='" + e + "']").remove();
		cek_dig[0].data.forEach(function(item, index, object) {
			if (item.data.id == e) {
				object.splice(index, 1);
			}
		});
		console.log(cek_dig[0])
	}

	function saving() {
		var dase = [];
		var pembayaran = 0;
		for (let index = 0; index < cek_dig[0].data.length; index++) {
			const element = cek_dig[0].data[index];
			dase.push(element.id);
		}
		if (cek_dig[0].data.length) {

			$.ajax({
			type: "POST",
			url: "http://localhost:8000/api/v1/formulas/price_check",
			data: 
				{
					id : dase,
					cabang_id : {{ Auth::user()->cabang_id }},
				}
			,
			success: function (response) {
				for (let index = 0; index < cek_dig[0].data.length; index++) {
					const element = cek_dig[0].data[index];
					element.nilai = ($("[data-nilai='" + element.id + "']").val()) ? $("[data-nilai='" + element.id + "']").val() : '-';
					element.price = (response.data[index].price) ? response.data[index].price : 0;
					if($(`#flex-${element.id}`).is(':checked')) {
						element.anormali = '*'
					}
				}

				for (let index = 0; index < cek_dig[0].data.length; index++) {
					const element = cek_dig[0].data[index].price.replace('.','');
					pembayaran += parseInt(element);
				}

				$('input[name="data[]"]').val(JSON.stringify(cek_dig[0].data));
				let cal = pembayaran.toLocaleString("id", {style:"currency", currency:"IDR"});
				let man = cal.replace(',00','').replace('Rp','').replace(' ','');
				$('input[name="pembayaran"]').val(man);

				$( "#submit" ).trigger( "click" );

				$("#formDiag").on("submit", function(){
					modalLoad.show();
				});
			}
		});


		}else{
			alert('Data diagnosa kosong');
		}
	}

</script>
@endsection