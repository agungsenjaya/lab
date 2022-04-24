<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ public_path('css/pdf.min.css') }}">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <title>Table</title>
    <style type="text/css">
        body {
        font-size: 12px !important;
        font-family: Verdana;
    }
    /* @page {
            header: page-header;
            footer: page-footer;
        } */
        /* table {
            line-height:1.5;
        }
        header {
				border: none;
				background-color: #3456D8;

			}
        table, tr, td, th {
				padding: 3px;
                border: 0.1px solid black !important;
				border-collapse: collapse;
			}
			table { 
                width: 100%; 
                margin-top:300pt;
                margin-bottom:300pt;
            }
			td { 
                vertical-align: top; 
            } */
    </style>
</head>
<body>
<!-- <htmlpageheader name="page-header">
    <header id="header">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque nostrum magnam reprehenderit! Consequuntur sapiente natus reprehenderit, tempora consectetur laborum quisquam aut dolor recusandae molestias aliquam reiciendis? Quo in aspernatur nihil.
    </header>
</htmlpageheader> -->
        <table class="table table-bordered border-dark">
            <thead >
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Email</th>
                    <th scope="col">Perusahaan</th>
                </tr>
            </thead>
            <tbody class="small">
                @foreach ($dataDummy as $data)
                    <tr>
                        <th class="text-center">{{ $data->id+1 }}</th>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->address }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->company }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- <htmlpagefooter name="page-footer">
	Your Footer Content
</htmlpagefooter> -->
</body>
</html>