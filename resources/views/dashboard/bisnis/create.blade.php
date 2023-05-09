@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Bisnis</h1>
  </div>

  @if (\Session::has('failed'))
  <div class="alert alert-danger">
      <ul>
          <li>{!! \Session::get('failed') !!}</li>
      </ul>
  </div>
  @endif

  <div class="col-lg-8">
    <form  action="/dashboard/bisnis" method="POST">
        @csrf
        <div class="form-group">
          <label for="nama_bisnis">Nama Bisnis</label>
          <input type="text" class="form-control" id="nama_bisnis" name="nama_bisnis">
        </div>
        <div class="form-group">
            <label for="id_pemilik_bisnis_kuliner">ID Pemilik</label>
            <select class="form-control" id="id_pemilik_bisnis_kuliner" name="id_pemilik_bisnis_kuliner">
              @foreach ($pemiliks as $pemilik)
                <option value={{$pemilik->id}}>{{$pemilik->id}} - {{$pemilik->nama_pemilik}}</option>
              @endforeach
              
            </select>
          </div>
        <div class="form-group">
          <label for="alamat_bisnis">Alamat Bisnis</label>
          <input type="text" class="form-control" id="alamat_bisnis" name="alamat_bisnis">
        </div>
        <div class="form-group">
          <label for="no_telp">Nomor Telepon</label>
          <input type="number" class="form-control" id="no_telp" name="no_telp">
        </div>
        <div class="form-group">
          <label for="kategori_makanan">Kategori Makanan</label>
          <select class="form-control" id="kategori_makanan" name="kategori_makanan">
            <option value="Nasi">Nasi</option>
            <option value="Makanan ringan">Makanan ringan</option>
            <option value="Roti/kue">Roti/kue</option>
            <option value="Chinese food">Chinese food</option>
            <option value="Korean food">Korean food</option>
            <option value="Japanese food">Japanese food</option>
            <option value="Western food">Western food</option>
            <option value="Minuman">Minuman</option>
            <option value="Makanan penutup">Makanan penutup</option>
          </select>
        </div>
        <br/>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </form>     
  </div>
@endsection