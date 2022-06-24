@extends('layouts.app') @section('content') @include('modal') @include('header')
<div class="bg-white p-3 sticky-top shadow pandu d-none">
	<div class="container">
	<div class="row">
		<div class="col fw-bold text-capitalize text-center text-primary">
			<i class="bi bi-activity me-2"></i><span class="a"></span>
		</div>
		<div class="col fw-bold text-capitalize text-center text-primary border-start">
			<i class="bi bi-activity me-2"></i><span class="b"></span>
		</div>
		<div class="col fw-bold text-capitalize text-center text-primary border-start">
			<i class="bi bi-activity me-2"></i><span class="c"></span>
		</div>
		
	</div>
	</div>
</div>
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
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Input pasien</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <form method="POST" action="{{ route('admin.pasien_store') }}" id="formDiag">
                    @csrf
                    <input type="hidden" name="user" value="{{ Auth::user()->id }}" />
                    <div class="swiper slider-1">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide p-1">
                                <div class="row">
                                    <div class="mb-3 col ui-widget">
                                        <label class="form-label" for="">Nomor KTP<span class="ms-2 text-secondary">(Optional)</span> </label>
                                        <input class="form-control kat_val" id="number" aria-describedby="" placeholder="Masukan nomor" name="ktp" />
                                    </div>
                                    <div class="mb-3 col">
                                        <label class="form-label" for="">Nama Lengkap <span class="text-danger">*</span> </label>
                                        <input required type="text" class="form-control" id="" aria-describedby="" placeholder="Masukan nama" name="name" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col">
                                        <label class="form-label" for="">Jenis Kelamin <span class="text-danger">*</span> </label>
                                        <select required class="form-select" name="kelamin">
                                            <option value="" class="text-secondary">Choose Option</option>
                                            <option class="text-secondary" value="laki-laki">Laki-laki</option>
                                            <option class="text-secondary" value="perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col">
                                        <label class="form-label" for="">Usia <span class="text-danger">*</span> </label>
                                        <div class="input-group">
                                            <input required class="form-control kat_val" id="" aria-describedby="" placeholder="Masukan usia" name="tgl" />
                                            <span class="input-group-text bg-primary text-white" id="basic-addon2">Tahun</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="">Alamat <span class="text-danger">*</span> </label>
                                    <textarea id="" cols="20" rows="5" class="form-control" placeholder="Masukan alamat" name="alamat"></textarea>
                                </div>
                                <div class="text-start">
                                    <button type="button" class="next btn btn-primary">Selanjutnya</button>
                                </div>
                            </div>
                            <div class="swiper-slide p-1">
                                <div class="alert alert-primary rounded-0 alert-dismissible fade show text-center" role="alert">
                                    <div class="">
                                        <div>
                                            Pastikan anda memasukan data diagnosa dengan benar, karena data yang sudah masuk tidak dapat diedit atau dihapus, Terima kasih.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-4 col">
                                        <input type="hidden" name="data[]" />
                                        <input type="hidden" name="pembayaran" />
                                        <label class="form-label" for="">Dokter <span class="text-danger">*</span> </label>
                                        <select required class="form-select kat_dd" name="dokter">
                                            <option value="" class="text-secondary">Choose Doctor</option>
                                            @foreach($dokter as $dok)
                                            <option class="text-secondary" value="{{ $dok->id }}">{{ $dok->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-4 col">
                                        <label class="form-label" for="">Item Pemeriksaan</label>
                                        <select id="form-diagnosa" class="form-select kat_dd">
                                            <option>Choose Items</option>
                                            @foreach($formula as $for) @if(!$for->sub_kat)
                                            <option value="{{ $for }}">
                                                @if($for->sub_kat) @php $op = App\Formula::find($for->sub_kat); @endphp
                                                <span>{{ $op->judul }} - </span>
                                                @endif {{ $for->judul }}
                                            </option>
                                            @endif @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div id="diagnosa" class=""></div>
                                <div class="d-flex justify-content-between">
                                    <a href="javascript:void(0)" class="prev btn btn-primary me-2 opacity-0">Kembali</a>
                                    <a href="javascript:void(0)" onCLick="saving()" class="simpan btn btn-primary">Masukan pasien</a>
                                    <button type="submit" id="submit" class="simpan btn btn-primary d-none">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@include('footer') @endsection @section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/7.4.1/swiper-bundle.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
<link rel="stylesheet" href="{{ asset('css/select2-bootstrap-5-theme.css') }}" />
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.rtl.min.css" /> -->
<style>
	.swiper-slide-active {height: auto !important}
</style>
@endsection @section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/7.4.1/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.2.2/imask.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.13.2/underscore-min.js"></script>
<script src="{{ asset('js/diagnosa.js') }}"></script>
<script>

      var formula = <?php echo $formula ?>;
      var nilai = <?php echo $nilai ?>;
	  var kelamin;
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
				// autoHeight: true,
				// setWrapperSize:true,
      			navigation: {
      			nextEl: ".next",
      			prevEl: ".prev",
      			},
      		});

      		$('.next').on('click', function(){
				  $('.pandu').removeClass('d-none');
      			$('.a').text($('input[name="name"]').val());
      			$('.b').text($('select[name="kelamin"]').val());
      			$('.c').text($('input[name="tgl"]').val() + ' Tahun');
			});
			$('.prev').on('click', function(){
				$('.pandu').addClass('d-none');
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
      		function sub(e){
      			var bar = formula.find(element => element.id == e);
      			return ' - ' + bar.judul;
      		}
      		var ber = nilai.find(element => element.formula_id == as.id);
      		if (!bro) {
      			cek_dig[0].data.push({id:as.id,data:as});

    	$('#diagnosa').append(`
      		<div class="row mb-4" data-id="${as.id}">
      								<div class="col-3">
      									<label for="" class="form-label">Diagnosa</label>
      									<input type="text" class="form-control" value="${as.judul}" disabled>
      								</div>
      								<div class="col-3 kat-${as.id}">
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
      								<input type="text" class="form-control normal-${as.id}" value="${(as.content) ? as.content : '-'}" disabled>
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

    						if (ber) {
    							$(`.kat-${as.id}`).after(`	<div class="col-2 col-kategori-${as.id}">
    									<label for="" class="form-label">Kategori</label>
    									<select class="form-select kategori-${as.id}" id="${as.id}" onChange="normal(this)" name="kategori">
    									<option value="">Choose Option</option>
    									</select>
      								</div>`);

    							$.each(nilai, function (inex, vales) {
    						if (as.id == vales.formula_id) {
    								if (vales) {
										var kelamin = $('.b').text();
										if (vales.kelamin == kelamin) {
											$(`.normal-${as.id}`).val(vales.normal);
											$(`.col-kategori-${as.id}`).remove();
										}else if(vales.kelamin == 'all') {
											$(`.normal-${as.id}`).val(vales.normal);
											$(`.col-kategori-${as.id}`).remove();
										}else{
											$(`.kategori-${as.id}`).append(`<option value="${vales.normal}">${vales.kelamin}</option>`);
										}
    								}
    							}
    						});

    						}

      			$.each(formula, function (ine, val) {
      				if (val.sub_kat == as.id) {
    				cek_dig[0].data.push({id:val.id,sub_kat:val.sub_kat,data:val});
      					$('#diagnosa').append(`
      		<div class="row mb-4" data-id="${val.id}">
      								<div class="col-3">
      									<label for="" class="form-label">Diagnosa${sub(val.sub_kat)}</label>
      									<input type="text" class="form-control" value="${val.judul}" disabled>
      								</div>
      								<div class="col-3 kat-${val.id}">
      									<div class="d-flex justify-content-between mb-1">
      										<label for="" class="form-label me-2">Nilai Pemeriksaan</label>
      										<div class="form-check">
      											<input class="form-check-input" type="checkbox" id="flex-${val.id}">
      											<label class="form-check-label" for="flex-${val.id}">Anormali</label>
      										</div>
      									</div>
      									<input type="text" data-nilai="${val.id}" class="form-control">
      								</div>
      								<div class="col">
      								<label for="" class="form-label">Nilai Normal</label>
      								<input type="text" class="form-control normal-${val.id}" value="${(val.content) ? val.content : '-'}" disabled>
      								</div>
    							<div class="col-1">
      									<label for="" class="form-label opacity-0">Remove</label>
      									<div class="align-self-center text-center">
      										<a class="text-secondary">
      											<i class="bi bi-dash-circle-fill h3"></i>
      										</a>
      									</div>
      								</div>
      							</div>
    						`);

    						var bur = nilai.find(element => element.formula_id == val.id);
    						if (bur) {
    							$(`.kat-${val.id}`).after(`	<div class="col-2 col-kategori-${val.id}">
    									<label for="" class="form-label">Kategori</label>
    									<select class="form-select kategori-${val.id}" id="${val.id}" onChange="normal(this)" name="kategori">
    									<option value="">Choose Option</option>
    									</select>
      								</div>`);

    							$.each(nilai, function (inex, vales) {
    						if (val.id == vales.formula_id) {
    								if (vales) {
										var kelamin = $('.b').text();
										if (vales.kelamin == kelamin) {
											$(`.normal-${val.id}`).val(vales.normal);
											$(`.col-kategori-${val.id}`).remove();
										}else if(vales.kelamin == 'all') {
											$(`.normal-${val.id}`).val(vales.normal);
											$(`.col-kategori-${val.id}`).remove();
										}else{
											$(`.kategori-${val.id}`).append(`<option value="${vales.normal}">${vales.kelamin}</option>`);
										}
    								}
    							}
    						});

    						}



      				}
      			});

    		console.log(cek_dig[0].data);
      		}
      	});


    function normal(e){
    	if (e.value) {
    		$(`.normal-${e.id}`).val(e.value);
    		// cek_dig[0].data[0].data.content = e.value;
    	}
    }

      	function remove_dig(e){
    	$("[data-id='" + e + "']").remove();
    	cek_dig[0].data.forEach(function(item, index, object) {
      			if (item.data.id == e) {
      				object.splice(index, 1);
      			}
      		});

    	cek_dig[0].data.forEach(function(item, index, object) {
      			if (item.data.sub_kat == e) {
    			$("[data-id='" + item.data.id + "']").remove();
      			}
      		});

    	cek_dig[0].data.forEach(function(item, index, object) {
      			if (item.data.sub_kat == e) {
    			object.splice(index);
      			}
      		});

    	console.log(cek_dig[0]);
      	}

      	function saving(){
      		var dase = [];
      		var pembayaran = 0;
      		for (let index = 0; index < cek_dig[0].data.length; index++) {
      			const element = cek_dig[0].data[index];
    		const emon = $(`.normal-${cek_dig[0].data[index].data.id}`).val();
    		element.data.content = emon;
    		// console.log(cek_dig[0].data[index].data.id);
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
    			// console.log(cek_dig[0].data);

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
