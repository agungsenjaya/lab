@php
            $start = date_format(date_create(Request::get('start_date')),"d M Y");
            $end = date_format(date_create(Request::get('end_date')),"d M Y");
            @endphp
            <div class="text-center text-uppercase">
                <h3>Laporan pemeriksaan laboratorium {{ Request::get('cabang_name') }}</h3>
                <h3>Periode {{  $start . ' - ' . $end }}</h3>
            </div>
            <br>
<table class="table table-bordered border-dark">
                <thead class="bg-light">
                    <tr class="text-center">
                        <th scope="col">Tanggal</th>
                        <th scope="col">Nama Pasien</th>
                        <th scope="col">Dokter</th>
                        <th scope="col">Biaya Pemeriksaan</th>
                        <th scope="col">Jenis Pemeriksaan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataa as $d)
                    <tr>
                        <td>
                            {{ $d->created_at->format('d-m-Y') }}
                        </td>
                        <td class="text-capitalize">{{ $d->pasien_id }}</td>
                        <td class="text-capitalize">{{ $d->dokter_id }}</td>
                        <td>Rp {{ $d->pembayaran }}</td>
                        <td>
                            @php
                            $dat = json_decode($d->data);
                            $obat = array();
                            $i = 0;
                            $c = count($obat);
                            @endphp
                            @foreach($dat as $da)
                            @php
                            $det = json_decode($da);
                            @endphp
                            <!-- {{ json_encode($det[0]->data) }} -->
                            @foreach($det as $dud)
                            @if(!$dud->data->sub_kat)
                            @php 
                            array_push($obat, $dud->data->judul)
                            @endphp
                            @endif
                            @endforeach
                            @foreach($obat as $o)
                                {{ $o }}{{ ($o == end($obat)) ? '' : ',' }}
                            @endforeach
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th scope="col"></th>
                        <td scope="col"></td>
                        <td scope="col"></td>
                        <th class="text-left" scope="col"></th>
                        <td scope="col"></td>
                    </tr>
                    <tr>
                        <th scope="col" >Jumlah</th>
                        <td scope="col"></td>
                        <td scope="col"></td>
                        <th class="text-left" scope="col">Rp {{ str_replace(',','.',Request::get('total')) }}</th>
                        <td scope="col"></td>
                    </tr>
                </tfoot>
            </table>
            <table width="100%" class="border-transparent table-1">
                <tbody>
                    <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                    <td valign="top" class="text-right">
                    <div>
                        <p class="mb-0"><span>Sukabumi,</span> {{ date('d M Y') }}</p>
                                            <br />
                                            <br />
                                            <br />
                                            <br />
                                            <br />
                                            <p>ATLM</p>
                                        </div>
                    </td>
                </tr>
                </tbody>
            </table>