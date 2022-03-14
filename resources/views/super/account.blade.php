@extends('layouts.super')
@section('content')
<section>
    <div class="container">
        <div class="card card-body shadow mb-4">
            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="{{ asset('img/user.png') }}" alt="" width="80%">
                </div>
                <div class="col-md align-self-center">
                    <table class="table line-h-2">
                        <tr>
                            <td class="title-3 text-uppercase">Nama Lengkap</td>
                            <td>:</td>
                            <td class="text-capitalize">{{ Auth::user()->name }}</td>
                        </tr>
                        <tr>
                            <td class="title-3 text-uppercase">Date Reg</td>
                            <td>:</td>
                            <td>{{ Auth::user()->created_at }}</td>
                        </tr>
                        <tr>
                            <td class="title-3 text-uppercase">Role</td>
                            <td>:</td>
                            <td>
                                <span class="badge bg-warn text-lab py-2">
                                    <i class="bi bi-check-circle-fill me-2"></i>{{ Auth::user()->roles[0]->name }}
                                </span>
                            </td>
                        </tr>
                        <tr class="border-transparent">
                            <td class="title-3 text-uppercase">Email Address</td>
                            <td>:</td>
                            <td>{{ Auth::user()->email }}</td>
                        </tr>
                        
                    </table>
                </div>
            </div>
        </div>
        <div>
        <div class="card card-body shadow">

        <h5 class="title-2 mb-4">Update Account</h5>

        <form action="{{ route('super.user_update',['id' => Auth::user() -> id]) }}" method="POST">
      @csrf
      <div class="row">
        <div class="mb-3 col">
          <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="name" placeholder="Masukan nama" required value="{{ Auth::user()->name }}">
        </div>
        <div class="mb-3 col">
          <label class="form-label">Email Address <span class="text-danger">*</span></label>
          <input type="email" class="form-control" name="email" placeholder="Masukan email" required value="{{ Auth::user()->email }}">
        </div>
      </div>
  <div class="row">
    <div class="mb-3 col">
    <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
    <select name="kelamin" class="form-select" required>
        <option value="">-- Select Option --</option>
        <option value="laki-laki" {{ (Auth::user()->kelamin == 'laki-laki') ? 'selected' : '' }}>laki-laki</option>
        <option value="perempuan" {{ (Auth::user()->kelamin == 'perempuan') ? 'selected' : '' }}>perempuan</option>
    </select>
  </div>
  <div class="mb-3 col">
          <label class="form-label">Nomor Telepon <span class="text-danger">*</span></label>
          <div class="input-group">
            <span class="input-group-text" id="basic-addon1">+62</span>
            <input class="form-control" id="number" name="phone" placeholder="Masukan phone" required value="{{ Auth::user()->phone }}">
          </div>
        </div>
  </div>
                        <div class="mb-3">
      <label class="form-label">Alamat Lengkap <span class="text-danger">*</span></label>
      <textarea name="alamat" id="" cols="30" rows="5" class="form-control" placeholder="Masukan alamat" required>{{ Auth::user()->alamat }}</textarea>
  </div>

  <button type="submit" class="btn btn-lab">Update Account</button>
</form>

        </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.2.2/imask.min.js"></script>
<script>
    var masa = document.getElementById('number');
    var maskOptions = {
      mask: Number,
    };
    var mask = IMask(masa, maskOptions);
</script>
@endsection