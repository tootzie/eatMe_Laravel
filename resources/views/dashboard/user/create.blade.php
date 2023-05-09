@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah User</h1>
  </div>

  <div class="col-lg-8">
    <form  action="/dashboard/user" method="POST">
      @csrf
      <div class="form-group">
        <label for="name">Nama User</label>
        <input type="text" class="form-control" id="name" name="name">
      </div>
      <div class="form-group">
        <label for="email">Email User</label>
        <input type="text" class="form-control" id="email" name="email">
      </div>
      <div class="form-group">
        <label for="rating_user">Rating User</label>
        <input type="number" class="form-control" id="rating_user" name="rating_user">
      </div>
      <div class="form-group">
        <label for="makanan_diselamatkan">Makanan Diselamatkan</label>
        <input type="number" class="form-control" id="makanan_diselamatkan" name="makanan_diselamatkan">
      </div>
      <div class="form-group">
        <label for="saldo_ewallet">Saldo E-Wallet</label>
        <input type="number" class="form-control" id="saldo_ewallet" name="saldo_ewallet">
      </div>
      <br/>
      <button type="submit" class="btn btn-primary">Tambah</button>
    </form>   
  </div>
@endsection