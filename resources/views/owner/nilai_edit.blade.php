@extends('layouts.owner')
@section('content')
<section>
    <div class="container">
        <div class="card">
            <div class="card-body">
<div class="d-flex justify-content-end">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('owner.nilai') }}">Nilai Normal</a></li>
								<li class="breadcrumb-item active" aria-current="page">Edit</li>
							</ol>
						</nav>
                    </div>
                    <form id="form-1" action="{{ route('owner.nilai_update',['id' => $formula -> id]) }}" method="POST">
                @csrf
                <div class="row mb-3"> 
                    @foreach($nilai as $nin)
                    @php
                    $a;
                    if($nin->kelamin == "laki-laki"){
                        $a = $nin->normal;
                    }elseif($nin->kelamin == "perempuan"){
                        $a =  $nin->normal;
                    }else{
                        $a = $nin->normal;
                    }
                    @endphp
                    <input type="hidden" class="same_id" value="{{ $nin->id }}">
                    <div class="col">
                        <label for="" class="form-label text-capitalize">Kategori {{ $nin->kelamin }}</label>
                        <input type="text" class="form-control same" name="{{ $nin->kelamin }}" value="{{ $a }}" required>
                    </div>
                    @endforeach
                </div>
                <div class="mb-3 d-none">
                    <label for="" class="form-label">Content</label>
                    <input class="form-control" name="nilai_data">
                    <input type="text" class="form-control" name="formula_content">
                    <input class="form-control" name="nilai_id">
                </div>
                <!-- {{ $formula }} -->
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script>
    $('#form-1').submit(function () {
        let a = $('.same');
        let b = $('.same_id');
        let data = [];
        let dataa = [];
        let data_id = [];
        $.each(a, function (i, v) { 
            let kel = $(this).attr("name");
            if (kel == 'laki-laki') {
                $asa = "L :" + $(this).val();
                dataa.push($asa);
            }else if(kel == 'perempuan'){
                $asa = "P :" + $(this).val();
                dataa.push($asa);
            }else{
                dataa.push($(this).val());
            }
            data.push($(this).val());
        });
        
        $.each(b, function (i, v) { 
            data_id.push(parseInt($(this).val()));
        });

        $('input[name="nilai_data"]').val(JSON.stringify(data));
        $('input[name="formula_content"]').val(dataa.join(' '));
        $('input[name="nilai_id"]').val(JSON.stringify(data_id));
        
        return true
    });
</script>
@endsection