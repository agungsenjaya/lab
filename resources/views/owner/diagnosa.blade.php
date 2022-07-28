@extends('layouts.owner') @section('content') 
@php
 $url =  $data -> kode;
 $cetak = App\Cetak::where('diagnosa_id', $data->id)->count();
@endphp
<section>
    <div class="container">
        <div class="card shadow">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5 class="title-3 fw-bold mb-0">Hasil Pemeriksaan Pasien</h5>
                        <p class="mb-0 text-secondary">Informasi hasil pemeriksaan pasien</p>
                    </div>
                    <div class="d-flex align-self-center">
                        <nav aria-label="breadcrumb" class="align-self-center">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('super.pasien') }}">Pasien</a></li>
                                <!-- <li class="breadcrumb-item"><a href="{{ route('admin.pasien_detail',['id' =>$data ->pasien_id]) }}">Detail pasien</a></li> -->
                                <li class="breadcrumb-item active" aria-current="page">Diagnosa pasien</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="pt-4">
                    <div class="alert alert-primary rounded-0 text-center">
                        <span class="text-uppercase fw-bold">{{ $data->cabang->name }}</span><br>{{ $data->cabang->alamat }}
                    </div>
                </div>
                <div class="">
                    <div class="row py-4">
                        <div class="col-md-6">
                            <table class="table table-1">
                                <tr class="d-flex">
                                    <td class="col-4">No / Dokumen</td>
                                    <td>:</td>
                                    <td class="text-uppercase col"><span class="badge alert-primary">{{ counTing($data->id) . substr($data->kode, 0 ,5) }}</span> <span class="text-capitalize">/  {{ ($cetak <= 3) ? 'Asli' : 'Copy' }}</span></td>
                                </tr>
                                <tr class="d-flex">
                                    <td class="col-4">Nama Lengkap</td>
                                    <td>:</td>
                                    <td class="text-capitalize col">{{ $data->pasien->name }}</td>
                                </tr>
                                <tr class="d-flex">
                                    <td class="col-4">Umur</td>
                                    <td>:</td>
                                    <td class="text-capitalize col">{{ $data->pasien->tanggal_lahir }} Tahun</td>
                                </tr>
                                <tr class="d-flex border-transparent">
                                    <td class="col-4">Jenis Kelamin</td>
                                    <td>:</td>
                                    <td class="text-capitalize col">{{ $data->pasien->kelamin }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-1">
                                <tr class="d-flex">
                                    <td class="col-4">User</td>
                                    <td>:</td>
                                    <td class="text-capitalize col">
                                        {{ $data->user->name }}
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
                                    <td class="col-4">Tanggal Pemeriksaan</td>
                                    <td>:</td>
                                    <td class="col">{{ $data->created_at->format('d M Y') }}</td>
                                </tr>
                                <tr class="d-flex border-transparent">
                                    <td class="col-4">Alamat Lengkap</td>
                                    <td>:</td>
                                    <td class="text-capitalize col">{{ $data->pasien->alamat }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="alert alert-primary rounded-0 d-none">
                        <p class="small mb-0 text-center"><span class="">*</span> Menunjukan hasil diatas atau dibawah nilai normal</p>
                    </div>

                    <table class="table table-bordered border-dark">
                        <thead class="bg-primary text-white">
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
                            @php
                            $dat = App\Formula::find($it->data->id);
                            $space = 0;
                            if($dat->formula_kat_id && $dat->formula_sub_id && $dat->sub_kat){
                                $space += 6;
                            }else if($dat->formula_kat_id && $dat->formula_sub_id){
                                $space += 4;
                            }else if($dat->formula_kat_id && $dat->sub_kat){
                                $space += 4;
                            }else if($dat->formula_kat_id){
                                $space += 2;
                            }
                            @endphp
                            <tr class="row g-0">
                                <td class="col-md-4">
                                    @if($space > 0)
                                    @for($i = 0; $i < $space; $i++)
                                    &nbsp;
                                    @endfor
                                    @endif
                                    {{ $it->data->judul }}</td>
                                <td class="col-md-2 text-center {{ !empty($it->anormali) ? 'text-danger' : '' }}">{{ ($it->nilai == "-") ? '' : $it->nilai }}<span class="text-danger">{{ !empty($it->anormali) ? $it->anormali : '' }}</span></td>
                                <td class="col-md text-center">
                                    {{ ($it->data->content_ori == "-") ? '' : $it->data->content_ori  }}
                                </td>
                            </tr>
                            @endforeach 
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection