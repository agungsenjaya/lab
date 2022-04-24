@extends('layouts.owner')
@section('content')
@php
$no = 1;
@endphp
<section class="">
  <div class="container">
    <div class="card card-body shadow">

    <table id="table1" class="table table-striped w-100 table-bordered">
    <thead class="title-3 fw-bold bg-primary text-white">
      <tr>
        <td>No</td>
        <td>Cabang</td>
        <td>Status</td>
        <td>Actions</td>
      </tr>
    </thead>
    <tbody class="text-capitalize">
      @if($cabang)
      @foreach($cabang->reverse() as $dat)
      <tr>
        <td>{{ counTing($no++) }}</td>
        <td class="text-capitalize">{{ $dat->name }}</td>
        <td>
          @php
          $pr = App\Pricing::where('cabang_id',$dat->id)->first();
          @endphp
          <select name="status" class="form-select" id="{{ $dat->id }}">
            <option value="0" {{ ($pr->status == '0') ? 'selected' : '' }}>Deactive</option>
            <option value="1" {{ ($pr->status == '1') ? 'selected' : '' }}>Active</option>
          </select>
        </td>
        <td>
          <a href="{{ route('owner.cabang_detail',['id' => $dat -> id]) }}" class="btn btn-warn btn-sm w-100">Detail Cabang</a>
        </td>
      </tr>
      @endforeach
      @endif
    </tbody>
  </table>

</div>
</div>
</section>
@endsection
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection
@section('js')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script>
  $(document).ready(function() {
    $('#table1').DataTable();
  });
  $("select[name='status']").on('change', function (e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      data: {
        'id' : this.id,
        'status' : this.value,
      },
      url: "http://localhost:8000/api/v1/pricing",
      success: function (response) {
       console.log(response.data);
       let tar = document.getElementById('ToastStatus');
        if (tar) {
          let toast = new bootstrap.Toast(tar);
          toast.show();
        }
    }
    });
  });
</script>
@endsection