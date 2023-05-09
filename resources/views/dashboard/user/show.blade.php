@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">User #{{$user->id}}</h1>
  </div>

  <br/>
  <h5>User</h5>
  <h6>{{$user->id}} - {{$user->name}}</h6>

  <br/>
  <h5>Email User</h5>
  <h6>{{$user->email}}</h6>

  <br/>
  <h5>Rating User</h5>
  <h6>{{$user->rating_user}}</h6>

  <br/>
  <h5>Saldo E-Wallet</h5>
  <h6>@currency($user->saldo_ewallet)</h6>

  <br/>
  <h5>Jumlah Makanan Diselamatkan</h5>
  <h6>{{$user->makanan_diselamatkan}}</h6>
@endsection