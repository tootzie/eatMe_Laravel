@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit User</h1>
  </div>

  <div class="col-lg-8">
    <form  action="/dashboard/user/{{$user->id}}" method="POST">
      @method('PUT')
      @csrf
      <div class="form-group">
        <label for="name">Nama User</label>
        <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
      </div>
      <div class="form-group">
        <label for="email">Email User</label>
        <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
      </div>
      <div class="form-group">
        <label for="rating_user">Rating User</label>
        <input type="number" class="form-control" id="rating_user" name="rating_user" value="{{$user->rating_user}}">
      </div>
      <div class="form-group">
        <label for="makanan_diselamatkan">Makanan Diselamatkan</label>
        <input type="number" class="form-control" id="makanan_diselamatkan" name="makanan_diselamatkan" value="{{$user->makanan_diselamatkan}}">
      </div>
      <div class="form-group">
        <label for="saldo_ewallet">Saldo E-Wallet</label>
        <input type="number" class="form-control" id="saldo_ewallet" name="saldo_ewallet" value="{{$user->saldo_ewallet}}">
      </div>
      <br/>
      <button type="submit" class="btn btn-primary">Edit</button>
    </form>   
  </div>
@endsection