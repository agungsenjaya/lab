<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
		<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.13.216/pdf_viewer.min.css" integrity="sha512-QgMseQTq9BTHUqgaL1BvhJeR/LzcBL1pqisRRZycVB+wf5yu8Qwl+4Hm0gDBMEc0Iko/rv4YZpfLFH/Vql6h5A==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
		<style>
			.table-1 > tbody > tr > td,
	.table-1 > tbody > tr > th,
	.table-1 > tfoot > tr > td,
	.table-1 > tfoot > tr > th,
	.table-1 > thead > tr > td,
	.table-1 > thead > tr > th {
		border: none;
	}

	thead, tbody, tfoot, tr, td, th {
		border-color: #000;
	}
		</style>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		<!-- <div style="height:100px"></div> -->
		<div class="container">
		<div class="row">
		<div class="col-md-10 offset-md-1">
			<img src="https://dummyimage.com/1349x200" alt="" width="100%">
		<div class="row py-2">
			<div class="col-md-6">
				<table class="table table-1 table-sm">
					<tr class="d-flex">
						<td class="col-4">No Transaksi</td>
						<td>:</td>
						<td class="text-uppercase col">{{ counTing($data->id) . substr($data->kode, 0 ,5) }}</td>
					</tr>
					<tr class="d-flex">
							<td class="col-4">Nama Lengkap</td>
							<td>:</td>
							<td class="text-capitalize col">{{ $data->pasien->name }}</td>
						</tr>
						<tr class="d-flex">
						<td class="col-4">Jenis Kelamin</td>
							<td>:</td>
							<td class="text-capitalize col">{{ $data->pasien->kelamin }}</td>
						</tr>
					<tr class="d-flex">
					<td class="col-4">Usia Pasien</td>
							<td>:</td>
							<td class="text-capitalize col">{{ $data->pasien->tanggal_lahir }} Tahun</td>
						</tr>
				</table>
			</div>
			<div class="col-md-6">
				<table class="table table-1 table-sm">
						<tr class="d-flex">
						<td class="col-4">Status Dokumen</td>
							<td>:</td>
							<td class="text-capitalize col">
								Asli
							</td>
						</tr>
						<tr class="d-flex">
						<td class="col-4">Dokter</td>
							<td>:</td>
							<td class="text-capitalize col">
								Dr. {{ $data->dokter->name }}
							</td>
						</tr>
							<tr class="d-flex">
							<td class="col-4">Tanggal Diagnosa</td>
								<td>:</td>
								<td class="col">{{ $data->created_at->format('d M Y') }}</td>
							</tr>
						<tr class="d-flex">
							<td class="col-4">Alamat Lengkap</td>
							<td>:</td>
							<td class="text-capitalize col">{{ $data->pasien->alamat }}</td>
						</tr>
				</table>
			</div>
		</div>
		<table class="table table-bordered table-2 table-sm">
			<thead class="">
				<tr class="row g-0 text-center">
					<th class="col-md-4">Pemeriksaan</th>
					<th class="col-md-2">Hasil</th>
					<th class="col-md">Nilai Normal</th>
				</tr>
			</thead>
			<tbody>
			@foreach($gas as $ga => $item)
			<tr class="row g-0">
				<td class="text-uppercase col-md-4">
					{{ $ga }}
				</td>
				<td class="col-md-2"></td>
				<td class="col-md"></td>
			</tr>
				@foreach($item as $it)
				<tr class="row g-0">
					<td class="col-md-4">{{ $it->data->judul }}</td>
					<td class="col-md-2 text-center {{ !empty($it->anormali) ? 'text-danger' : '' }}">{{ $it->nilai }}<span class="text-danger">{{ !empty($it->anormali) ? $it->anormali : '' }}</span></td>
					<td class="col-md text-center">{{ $it->data->content }}</td>
				</tr>
				@endforeach
			@endforeach
			</tbody>
		</table>
    <span style="page-break-after:always;"></span>
		<i><p class="small"><span class="text-danger">*</span> Menunjukan hasil diatas atau dibawah nilai normal</p></i>

		<div class="row">
			<div class="col-md-6 offset-md-6 d-flex justify-content-end">
				<div>
					<p class="mb-0">Sukabumi, {{ $data->created_at->format('d M Y') }}</p>
					<br>
					<br>
					<br>
					<p>Analis</p>
				</div>
			</div>
		</div>
		</div>
		</div>
		</div>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.13.216/pdf.min.js" integrity="sha512-IM60GPudO4jk+ZQm3UlJgKHhXQi5pNDM6mP+pLKL968YgkHMc7He3aGJOVHEZ9rJ4vAaEtJ8W6SKa7Qq4inzBA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.13.216/pdf.worker.min.js" integrity="sha512-WuTkCzN6oce7vaBJdmDKrSg3ln8RJ92igsQXBMX0UH2VcJyRhXrqSHjHKlxIIhaqTg7YFWxUd8ytY6iGLWQl5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.13.216/pdf.sandbox.min.js" integrity="sha512-915OIV2kp11phaHQ06n1UGBhlqU3/00Hv5rMDzgpvWJxUsKDM8C8PYjqdVh6rWeeRP46ViJBMCFxk7Y4ctoing==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.13.216/pdf_viewer.min.js" integrity="sha512-YWCuiUotcf13lnMuGZBPeGNZ/qsvbUytwPjNiqi4a158YfLsWqnhPvfSR+zv63BsY1PVPNEyIqVRSxUed09xPw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
    </body>
</html>