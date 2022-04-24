<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html mozdisallowselectionprint>
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" href="{{ public_path('css/pdf.min.css') }}" />
        <style>
            * {
                font-family: Verdana, Arial, sans-serif;
				font-size: x-small;
                /* letter-spacing: 1px */
            }
            table {
                font-size: x-small;
                /* font-size: small; */
            }
			.table-1 {
				line-height:1.6;
			}
			.table-1 > :not(caption) > * > * {
				padding: 0.2rem 0;
			}
            .table-1 > tbody > tr > td,
            .table-1 > tbody > tr > th,
            .table-1 > tfoot > tr > td,
            .table-1 > tfoot > tr > th,
            .table-1 > thead > tr > td,
            .table-1 > thead > tr > th {
                border: none;
            }

            /* thead, tbody, tfoot, tr, td, th {
		border-color: #000;
	} */
        </style>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- <div style="height: 100px;"></div> -->
		<table width="100%">
			<tr>
			<td align="left" width="50%">
				<table class="table table-1" width="100%">
					<tr class="row">
						<td class="col-5 fw-bold">No Transaksi / Dokumen</td>
						<td class="col-1">:</td>
						<td class="text-uppercase col">{{ counTing($data->id) . substr($data->kode, 0 ,5) }}</td>
					</tr>
					<tr class="row">
							<td class="col-5 fw-bold">Nama Lengkap</td>
							<td class="col-1">:</td>
							<td class="text-capitalize col">{{ $data->pasien->name }}</td>
						</tr>
						<tr class="row">
							<td class="col-5 fw-bold">Umur</td>
							<td class="col-1">:</td>
							<td class="text-capitalize col">{{ $data->pasien->tanggal_lahir }} Tahun</td>
						</tr>
						<tr class="row">
						<td class="col-5 fw-bold">Jenis Kelamin</td>
							<td class="col-1">:</td>
							<td class="text-capitalize col">{{ $data->pasien->kelamin }}</td>
						</tr>
				</table>
</td>
			<td valign="top" width="50%">
				<table class="table table-1" width="100%">
						<tr class="row">
						<td class="col-5 fw-bold">Dokter</td>
							<td class="col-1">:</td>
							<td class="text-capitalize col">
								Dr. {{ $data->dokter->name }}
							</td>
						</tr>
							<tr class="row">
							<td class="col-5 fw-bold">Tanggal Pemeriksaan</td>
								<td class="col-1">:</td>
								<td class="col">{{ $data->created_at->format('d M Y') }}</td>
							</tr>
						<tr class="row">
							<td class="col-5 fw-bold">Alamat Lengkap</td>
							<td class="col-1">:</td>
							<!-- <td class="text-capitalize col">{{ $data->pasien->alamat }}</td> -->
							<td class="text-capitalize col">-</td>
						</tr>
				</table>
</td>
			</tr>
		</table>

        <table class="table table-bordered border-dark">
            <thead class="">
                <tr class="text-center">
                    <th scope="col">Pemeriksaan</th>
                    <th scope="col">Hasil</th>
                    <th scope="col">Nilai Normal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($gas as $ga => $item)
                <tr>
                    <td class="text-uppercase">
                        {{ $ga }}
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                @foreach($item as $it)
                <tr>
                    <td class="">{{ $it->data->judul }}</td>
                    <td class="text-center {{ !empty($it->anormali) ? 'text-danger' : '' }}">{{ $it->nilai }}<span class="text-danger">{{ !empty($it->anormali) ? $it->anormali : '' }}</span></td>
                    <td class="text-center">{{ $it->data->content }}</td>
                </tr>
                @endforeach @endforeach
            </tbody>
        </table>
        <!-- <span style="page-break-after:always;"></span>
		<i><p class="small"><span class="text-danger">*</span> Menunjukan hasil diatas atau dibawah nilai normal</p></i> -->

		<div class="row">
			<div class="col-md-6 offset-md-6 d-flex justify-content-end">
				<div>
					<p class="mb-0">Sukabumi, {{ $data->created_at->format('d M Y') }}</p>
					<br>
					<br>
					<br>
					<p>ATLM</p>
				</div>
			</div>
		</div>
    </body>
</html>
