<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <style type="text/css">
            body {
                font-size: 14px !important;
                font-family: Verdana;
            }
            table {
                caption-side: bottom;
                border-collapse: collapse;
            }
            th {
                text-align: inherit;
                text-align: -webkit-match-parent;
            }

            thead,
            tbody,
            tfoot,
            tr,
            td,
            th {
                border-color: inherit;
                border-style: solid;
                border-width: 0;
            }

            .table {
                --bs-table-bg: transparent;
                --bs-table-accent-bg: transparent;
                --bs-table-striped-color: #212529;
                --bs-table-striped-bg: rgba(0, 0, 0, 0.05);
                --bs-table-active-color: #212529;
                --bs-table-active-bg: rgba(0, 0, 0, 0.1);
                --bs-table-hover-color: #212529;
                --bs-table-hover-bg: rgba(0, 0, 0, 0.075);
                width: 100%;
                margin-bottom: 1rem;
                color: #212529;
                vertical-align: top;
                border-color: #dee2e6;
            }
            .table > :not(caption) > * > * {
                padding: 0.5rem 0.5rem;
                background-color: var(--bs-table-bg);
                border-bottom-width: 1px;
                box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
            }
            .table > tbody {
                vertical-align: inherit;
            }
            .table > thead {
                vertical-align: bottom;
            }
            .table > :not(:first-child) {
                border-top: 1px solid currentColor;
            }

            .caption-top {
                caption-side: top;
            }

            .table-sm > :not(caption) > * > * {
                padding: 0.25rem 0.25rem;
            }

            .table-bordered > :not(caption) > * {
                border-width: 1px 0;
            }
            .table-bordered > :not(caption) > * > * {
                border-width: 0 1px;
            }

            .table-borderless > :not(caption) > * > * {
                border-bottom-width: 0;
            }
            .table-borderless > :not(:first-child) {
                border-top-width: 0;
            }

            .table-striped > tbody > tr:nth-of-type(odd) > * {
                --bs-table-accent-bg: var(--bs-table-striped-bg);
                color: var(--bs-table-striped-color);
            }

            .table-active {
                --bs-table-accent-bg: var(--bs-table-active-bg);
                color: var(--bs-table-active-color);
            }

            .table-hover > tbody > tr:hover > * {
                --bs-table-accent-bg: var(--bs-table-hover-bg);
                color: var(--bs-table-hover-color);
            }

            .table-primary {
                --bs-table-bg: #cfe2ff;
                --bs-table-striped-bg: #c5d7f2;
                --bs-table-striped-color: #000;
                --bs-table-active-bg: #bacbe6;
                --bs-table-active-color: #000;
                --bs-table-hover-bg: #bfd1ec;
                --bs-table-hover-color: #000;
                color: #000;
                border-color: #bacbe6;
            }

            .table-secondary {
                --bs-table-bg: #e2e3e5;
                --bs-table-striped-bg: #d7d8da;
                --bs-table-striped-color: #000;
                --bs-table-active-bg: #cbccce;
                --bs-table-active-color: #000;
                --bs-table-hover-bg: #d1d2d4;
                --bs-table-hover-color: #000;
                color: #000;
                border-color: #cbccce;
            }

            .table-success {
                --bs-table-bg: #d1e7dd;
                --bs-table-striped-bg: #c7dbd2;
                --bs-table-striped-color: #000;
                --bs-table-active-bg: #bcd0c7;
                --bs-table-active-color: #000;
                --bs-table-hover-bg: #c1d6cc;
                --bs-table-hover-color: #000;
                color: #000;
                border-color: #bcd0c7;
            }

            .table-info {
                --bs-table-bg: #cff4fc;
                --bs-table-striped-bg: #c5e8ef;
                --bs-table-striped-color: #000;
                --bs-table-active-bg: #badce3;
                --bs-table-active-color: #000;
                --bs-table-hover-bg: #bfe2e9;
                --bs-table-hover-color: #000;
                color: #000;
                border-color: #badce3;
            }

            .table-warning {
                --bs-table-bg: #fff3cd;
                --bs-table-striped-bg: #f2e7c3;
                --bs-table-striped-color: #000;
                --bs-table-active-bg: #e6dbb9;
                --bs-table-active-color: #000;
                --bs-table-hover-bg: #ece1be;
                --bs-table-hover-color: #000;
                color: #000;
                border-color: #e6dbb9;
            }

            .table-danger {
                --bs-table-bg: #f8d7da;
                --bs-table-striped-bg: #eccccf;
                --bs-table-striped-color: #000;
                --bs-table-active-bg: #dfc2c4;
                --bs-table-active-color: #000;
                --bs-table-hover-bg: #e5c7ca;
                --bs-table-hover-color: #000;
                color: #000;
                border-color: #dfc2c4;
            }

            .table-light {
                --bs-table-bg: #f8f9fa;
                --bs-table-striped-bg: #ecedee;
                --bs-table-striped-color: #000;
                --bs-table-active-bg: #dfe0e1;
                --bs-table-active-color: #000;
                --bs-table-hover-bg: #e5e6e7;
                --bs-table-hover-color: #000;
                color: #000;
                border-color: #dfe0e1;
            }

            .table-dark {
                --bs-table-bg: #212529;
                --bs-table-striped-bg: #2c3034;
                --bs-table-striped-color: #fff;
                --bs-table-active-bg: #373b3e;
                --bs-table-active-color: #fff;
                --bs-table-hover-bg: #323539;
                --bs-table-hover-color: #fff;
                color: #fff;
                border-color: #373b3e;
            }

            .table-responsive {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            @media (max-width: 575.98px) {
                .table-responsive-sm {
                    overflow-x: auto;
                    -webkit-overflow-scrolling: touch;
                }
            }
            @media (max-width: 767.98px) {
                .table-responsive-md {
                    overflow-x: auto;
                    -webkit-overflow-scrolling: touch;
                }
            }
            @media (max-width: 991.98px) {
                .table-responsive-lg {
                    overflow-x: auto;
                    -webkit-overflow-scrolling: touch;
                }
            }
            @media (max-width: 1199.98px) {
                .table-responsive-xl {
                    overflow-x: auto;
                    -webkit-overflow-scrolling: touch;
                }
            }
            @media (max-width: 1399.98px) {
                .table-responsive-xxl {
                    overflow-x: auto;
                    -webkit-overflow-scrolling: touch;
                }
            }
            .border-dark {
                border-color: #212529 !important;
            }

            .border-white {
                border-color: #fff !important;
            }

            .bg-primary {
                background-color: #005c45;
            }

            .text-white {
                color: #fff;
            }

            .text-lowercase {
                text-transform: lowercase !important;
            }

            .text-uppercase {
                text-transform: uppercase !important;
            }

            .text-capitalize {
                text-transform: capitalize !important;
            }
            .border-transparent {
                border-color: transparent !important;
            }
            .text-right {
                text-align: right;
            }
            .text-left {
                text-align: left;
            }
            .row {
                --bs-gutter-x: 1.5rem;
                --bs-gutter-y: 0;
                display: flex;
                flex-wrap: wrap;
                margin-top: calc(-1 * var(--bs-gutter-y));
                margin-right: calc(-0.5 * var(--bs-gutter-x));
                margin-left: calc(-0.5 * var(--bs-gutter-x));
            }

            .row > * {
                flex-shrink: 0;
                width: 100%;
                max-width: 100%;
                padding-right: calc(var(--bs-gutter-x) * 0.5);
                padding-left: calc(var(--bs-gutter-x) * 0.5);
                margin-top: var(--bs-gutter-y);
            }

            .col {
                flex: 1 0 0%;
            }

            .row-cols-auto > * {
                flex: 0 0 auto;
                width: auto;
            }

            .row-cols-1 > * {
                flex: 0 0 auto;
                width: 100%;
            }

            .row-cols-2 > * {
                flex: 0 0 auto;
                width: 50%;
            }

            .row-cols-3 > * {
                flex: 0 0 auto;
                width: 33.3333333333%;
            }

            .row-cols-4 > * {
                flex: 0 0 auto;
                width: 25%;
            }

            .row-cols-5 > * {
                flex: 0 0 auto;
                width: 20%;
            }

            .row-cols-6 > * {
                flex: 0 0 auto;
                width: 16.6666666667%;
            }

            .col-auto {
                flex: 0 0 auto;
                width: auto;
            }

            .col-1 {
                flex: 0 0 auto;
                width: 8.33333333%;
            }

            .col-2 {
                flex: 0 0 auto;
                width: 16.66666667%;
            }

            .col-3 {
                flex: 0 0 auto;
                width: 25%;
            }

            .col-4 {
                flex: 0 0 auto;
                width: 33.33333333%;
            }

            .col-5 {
                flex: 0 0 auto;
                width: 41.66666667%;
            }

            .col-6 {
                flex: 0 0 auto;
                width: 50%;
            }

            .col-7 {
                flex: 0 0 auto;
                width: 58.33333333%;
            }

            .col-8 {
                flex: 0 0 auto;
                width: 66.66666667%;
            }

            .col-9 {
                flex: 0 0 auto;
                width: 75%;
            }

            .col-10 {
                flex: 0 0 auto;
                width: 83.33333333%;
            }

            .col-11 {
                flex: 0 0 auto;
                width: 91.66666667%;
            }

            .col-12 {
                flex: 0 0 auto;
                width: 100%;
            }
            .fw-bold {
                font-weight: 700 !important;
            }
            .table-1 tr,
            .table-1 td {
                padding-left: 0 !important;
                padding-right: 0 !important;
            }
            .table-1 {
                border-color: transparent !important;
            }
        </style>
        <body>
            @php
            $cetak = App\Cetak::where('diagnosa_id', $data->id)->count();
            @endphp
            <table class="border-transparent" width="100%">
                <tr>
                    <td valign="top" width="50%">
                        <table class="table table-1 table-sm border-transparent" width="100%">
                            <tr class="row">
                                <td class="col-5 fw-bold">No / Dokumen</td>
                                <td class="col-1 fw-bold">:</td>
                                <td class="text-uppercase col">{{ counTing($data->id) . substr($data->kode, 0 ,5) }} <span class="text-capitalize">/  
                                    @if(Auth::user()->hasRole('admin'))
                                    {{ ($cetak <= 3) ? 'Asli' : 'Copy' }}
                                    @else
                                    {{ 'Asli' }}
                                    @endif
                                </span></td>
                            </tr>
                            <tr class="row">
                                <td class="col-5 fw-bold">Nama Lengkap</td>
                                <td class="col-1 fw-bold">:</td>
                                <td class="text-capitalize col">{{ $data->pasien->name }}</td>
                            </tr>
                            <tr class="row">
                                <td class="col-5 fw-bold">Umur</td>
                                <td class="col-1 fw-bold">:</td>
                                <td class="text-capitalize col">{{ $data->pasien->tanggal_lahir }} Tahun</td>
                            </tr>
                            <tr class="row">
                                <td class="col-5 fw-bold">Jenis Kelamin</td>
                                <td class="col-1 fw-bold">:</td>
                                <td class="text-capitalize col">{{ $data->pasien->kelamin }}</td>
                            </tr>
                        </table>
                    </td>
                    <td valign="top" width="50%">
                        <table class="table table-1 table-sm border-transparent" width="100%">
                            <tr class="row">
                                <td class="col-5 fw-bold">Dokter</td>
                                <td class="col-1 fw-bold">:</td>
                                <td class="text-capitalize col">
                                    {{ $data->dokter->name }}
                                </td>
                            </tr>
                            <tr class="row">
                                <td class="col-5 fw-bold">Tanggal Pemeriksaan</td>
                                <td class="col-1 fw-bold">:</td>
                                <td class="col">{{ $data->created_at->format('d M Y') }}</td>
                            </tr>
                            <tr class="row">
                                <td class="col-5 fw-bold">Alamat Lengkap</td>
                                <td class="col-1 fw-bold">:</td>
                                <td class="text-capitalize col">{{ $data->pasien->alamat }}</td>
                                <!-- <td class="text-capitalize col">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perferendis iste illum sed eum blanditiis</td> -->
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </body>
    </head>
</html>