@extends('layouts.super') @section('content') 
@php
 $url =  $data -> kode;
 $cetak = App\Cetak::where('diagnosa_id', $data->id)->count();
@endphp
<!-- Modal -->
<div class="modal fade" id="modalPrint" tabindex="-1" aria-labelledby="modalPrintLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title fw-bold" id="modalDelLabel"><i class="bi bi-info-circle me-2"></i>Notifications</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p class="mb-0">Apakah anda yakin akan melakukan cetak hasil pemeriksaan? Silahkan klik tombol print di bawah untuk melanjutkan.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="{{ route('super.cetak',['id' => $data -> kode]) }}" target="_blank" class="btn btn-primary">Print</a>
        <!-- <button type="button" class="btn btn-primary btn-cetak">Print</button> -->
      </div>
    </div>
  </div>
</div>
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
                        <div class="ms-3">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPrint"><i class="ms-Icon align-middle ms-Icon--Print me-2"></i>Cetak Pemeriksaan</button>
                            <!-- <a href="{{ route('admin.cetak',['id' => $data -> kode]) }}" target="_blank" class="btn btn-primary"><i class="ms-Icon align-middle ms-Icon--Print me-2"></i>Cetak Pemeriksaan</a> -->
                        </div>
                    </div>
                </div>

                <div class="">
                    <div class="row py-4">
                        <div class="col-md-6">
                            <table class="table table-1">
                                <tr class="d-flex">
                                    <td class="col-4">No / Dokumen</td>
                                    <td>:</td>
                                    <td class="text-uppercase col"><span class="badge alert-primary">{{ counTing($data->id) . substr($data->kode, 0 ,5) }}</span> <span class="text-capitalize">/  {{ ($cetak <= 1) ? 'Asli' : 'Copy ' . $cetak }}</span></td>
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
                            <tr class="row g-0">
                                <td class="col-md-4">{{ $it->data->judul }}</td>
                                <td class="col-md-2 text-center {{ !empty($it->anormali) ? 'text-danger' : '' }}">{{ $it->nilai }}<span class="text-danger">{{ !empty($it->anormali) ? $it->anormali : '' }}</span></td>
                                <td class="col-md text-center">{{ $it->data->content }}</td>
                            </tr>
                            @endforeach @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script>
    var modal = new bootstrap.Modal(document.getElementById('modalPrint'));
    var toast = new bootstrap.Toast(document.getElementById('ToastPrint'));
    $('.btn-cetak').on('click',function(){
        $.ajax({
            type: "POST",
        url: "http://localhost:8000/api/v1/cetak",
        data: {
            'diagnosa_id' : {{ $data->id }},
            'user_id' : {{ Auth::user()->id }},
        },
        dataType: "JSON",
        success: function (response) {
            if(response.code == 200) {
                modal.hide();
                toast.show();
                window.open(`http://localhost:8000/superadmin/cetak/{{ $url }}`);
            }
        }
    });
})
</script>
@endsection
