@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit User</h1>
  </div>

  <div class="col-lg-8">
    <form  action="/dashboard/bisnis/{{$business->id}}" method="POST">
      @method('PUT')
      @csrf
      <div class="form-group">
        <label for="nama_bisnis">Nama Bisnis</label>
        <input type="text" class="form-control" id="nama_bisnis" name="nama_bisnis" value="{{$business->nama_bisnis}}">
      </div>
      <div class="form-group">
        <label for="alamat_bisnis">Alamat Bisnis</label>
        <input type="text" class="form-control" id="alamat_bisnis" name="alamat_bisnis" value="{{$business->alamat_bisnis}}">
      </div>
      <div class="form-group">
        <label for="no_telp">Nomor Telepon</label>
        <input type="number" class="form-control" id="no_telp" name="no_telp" value="{{$business->no_telp}}">
      </div>
      <div class="form-group">
        <label for="kategori_makanan">Kategori Makanan</label>
        <select class="form-control" id="kategori_makanan" name="kategori_makanan">
          <option value="Nasi" <?php echo $business->kategori_makanan == "Nasi" ? "selected" : "" ?>>Nasi</option>
          <option value="Makanan ringan" <?php echo $business->kategori_makanan == "Makanan ringan" ? "selected" : "" ?>>Makanan ringan</option>
          <option value="Roti/kue" <?php echo $business->kategori_makanan == "Roti/kue" ? "selected" : "" ?>>Roti/kue</option>
          <option value="Chinese food" <?php echo $business->kategori_makanan == "Chinese food" ? "selected" : "" ?>>Chinese food</option>
          <option value="Korean food" <?php echo $business->kategori_makanan == "Korean food" ? "selected" : "" ?>>Korean food</option>
          <option value="Japanese food" <?php echo $business->kategori_makanan == "Japanese food" ? "selected" : "" ?>>Japanese food</option>
          <option value="Western food" <?php echo $business->kategori_makanan == "Western food" ? "selected" : "" ?>>Western food</option>
          <option value="Minuman" <?php echo $business->kategori_makanan == "Minuman" ? "selected" : "" ?>>Minuman</option>
          <option value="Makanan penutup" <?php echo $business->kategori_makanan == "Makanan penutup" ? "selected" : "" ?>>Makanan penutup</option>
        </select>
      </div>
      <br/>
      <button type="submit" class="btn btn-primary">Edit</button>
    </form>   
  </div>
@endsection