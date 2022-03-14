@extends('layouts.super')
@section('content')
<!-- Price Token -->
{{--<section>
  <div class="container">
    <div class="card card-body shadow">
    @php
	$ez = \App\Formula::all()->keyBy('id')->groupBy('formula_kat_id', true);
	$stun = $ez;
	$no = 1;
	@endphp
	<div class="accordion accordion-flush" id="accordionPrice">
	@foreach ($stun as $bo => $ez)
	@php
	$stan = \App\Formula_kat::where('id', $bo)->first();
	@endphp
  <div class="accordion-item">
    <h2 class="accordion-header" id="">
      <button class="accordion-button btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-{{ str_replace(' ','',$stan->judul) }}" aria-expanded="false" aria-controls="flush-{{ str_replace(' ','',$stan->judul) }}">
         <span class="me-3">{{ $no++ }}.</span>{{ $stan->judul }}
      </button>
    </h2>
    <div id="flush-{{ str_replace(' ','',$stan->judul) }}" class="accordion-collapse collapse" aria-labelledby="" data-bs-parent="#accordionPrice">
      <div class="accordion-body">

	  <ul id="diagnosa" class="ps-0 list-no">
				@foreach ($ez as $zi)
				@if($zi->sub_kat)
				<ul class="ps-0">
					<li> 
						<div class="mb-3">
							<label for="" class="form-label">{{ $zi->judul }}</label>
							<input type="text" class="form-control" id="{{ $zi->id }}">
						</div>
					</li>
				</ul>
				@else
				<li>
				<div class="mb-3">
							<label for="" class="form-label">{{ $zi->judul }}</label>
							<input type="text" class="form-control" id="{{ $zi->id }}">
						</div>
				</li>
				@endif
				@endforeach
			</ul>

	  </div>
    </div>
  </div>
  @endforeach
  
</div>
    </div>
  </div>
</section>--}}
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
<script>
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	$('select[name="for_kat"]').on('change', function(e){
		e.preventDefault();
		$('#kat > div').remove();
		var a = $(this).val();
		$.getJSON(`http://localhost:8000/api/v1/formulas/${a}`, function (data) {
			$.each(data.data, function (index, value) {
				$('#kat').append(`
				<div class="col-md-6">
					<label class="form-label">${value.judul}</label>
					<div class="input-group mb-3">
					<span class="input-group-text" id="basic-addon1">Rp</span>
					<input class="form-control kat_val" id="${value.id}">
					</div>
				</div>
				`);
			});
			$('.kat_val').change(function(e){
				e.preventDefault();
				$.ajax({
					type: "POST",
					url: `http://localhost:8000/api/v1/formulas/price`,
					data: {
						'formula_id' : this.id,
						'cabang_id' : {{ Auth::user()->cabang_id }},
						'user_id' : {{ Auth::user()->cabang_id }},
						'pembayaran' : this.value,
					},
					dataType: "JSON",
					success: function (response) {
						// console.log(response.data);
					}
				});
			});
		});
	});
</script>
@endsection