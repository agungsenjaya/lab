<!-- Price Token -->
<section>
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
</section>