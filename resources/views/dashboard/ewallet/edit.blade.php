@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit E-Wallet</h1>
  </div>

  <br/>
  <h5>User</h5>
  <h6> {{$user->id}} - {{$user->name}} </h6>
  <div class="col-lg-8">
    <form  action="/dashboard/validasibisnis/updatemanual/{{$user->id}}" method="POST">
      @method('PUT')
      @csrf
      <div class="form-group">
        <label for="saldo_ewallet">Jumlah Saldo</label>
        <input type="number" class="form-control" id="saldo_ewallet" name="saldo_ewallet" placeholder="50000" value="{{$user->saldo_ewallet}}">
      </div>
      <br/>
      <button type="submit" class="btn btn-primary">Edit</button>
    </form>   
  </div>
@endsection