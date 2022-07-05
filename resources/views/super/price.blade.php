@extends('layouts.super')
@section('content')
<!-- Price Token -->
<section>
<div class="container">
    <div class="card card-body shadow">
		<div class="mb-3">
			<label for="" class="form-label">Select Kategori</label>
			<select name="for_kat" id="" class="form-select" required>
				<option value="">-- Select Option --</option>
				@foreach($for_kat as $for)
					<option value="{{ $for->id }}">{{ $for->judul }}</option>
				@endforeach
			</select>
		</div>
		<div class="row" id="kat"></div>
	</div>
</div>
</section>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.2.2/imask.min.js"></script>
<script>
	// console.log({{ Auth::user()->api_token }})
	$('select[name="for_kat"]').on('change', function(e){
		e.preventDefault();
		$('#kat > div').remove();
		var a = $(this).val();
		$.getJSON(`http://localhost:8000/api/v1/formulas/${a}?cabang_id=${<?php echo Auth::user()->cabang_id ?>}`, function (data) {
			$.each(data.data, function (index, value) {
				var pro = data.price.filter(x => x.formula_id === value.id).map(x => x.pembayaran.replace('.',''));
				if(value.sub_kat){
					$.each(data.data, function (ind, vale) { 
						if (vale.id == value.sub_kat) {
							$('#kat').append(`
							<div class="col-md-6">
								<label class="form-label">${value.judul} - ${vale.judul}</label>
								<div class="input-group mb-3">
								<span class="input-group-text text-white bg-primary" id="basic-addon1">Rp</span>
								<input class="form-control kat_val" id="${value.id}" value="${pro}">
								</div>
							</div>
							`);
							// console.log(vale);
						}
					});
				}else{
					$('#kat').append(`
				<div class="col-md-6">
					<label class="form-label">${value.judul}</label>
					<div class="input-group mb-3">
					<span class="input-group-text text-white bg-primary" id="basic-addon1">Rp</span>
					<input class="form-control kat_val" id="${value.id}" value="${pro}">
					</div>
				</div>
				`);

				}
			});

			var items = document.getElementsByClassName('kat_val');
			var maskOptions = {
				mask: Number,
				thousandsSeparator: '.',
				};
			Array.prototype.forEach.call(items, function(element) {
				var mask = IMask(element, maskOptions);
			});

			$('.kat_val').change(function(e){
				e.preventDefault();
				if (this.value) {
						$.ajax({
							type: "POST",
							url: `http://localhost:8000/api/v1/formulas/price`,
							data: {
								'formula_id' : this.id,
								'cabang_id' : {{ Auth::user()->cabang_id }},
								'user_id' : {{ Auth::user()->id }},
								'pembayaran' : this.value,
							},
							dataType: "JSON",
							success: function (response) {
								console.log(response.data);
								let tar = document.getElementById('ToastPrice');
								if (tar) {
									let toast = new bootstrap.Toast(tar);
									toast.show();
								}
							}
						});
					}

			});
		});
	});
</script>
@endsection