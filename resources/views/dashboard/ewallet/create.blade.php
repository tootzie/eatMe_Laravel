

@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"> Penambahan/Pengurangan Saldo E-Wallet</h1>
  </div>

  <div class="col-lg-8">
    <form method="POST" action="/dashboard/ewallet">
      @csrf
      <div class="form-group">
          <label for="id">Select ID User</label>
          <select class="form-control" id="id" name="id">
              @foreach ($users as $user)
            <option>{{$user->id}} - {{$user->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="tipe">Tipe Transaksi</label>
          <select class="form-control" id="tipe" name="tipe">
            <option>Penambahan</option>
            <option>Pengurangan</option>
          </select>
        </div>
      <div class="form-group">
        <label for="saldo_ewallet">Jumlah Penambahan Saldo</label>
        <input type="number" class="form-control" id="saldo_ewallet" name="saldo_ewallet" placeholder="50000">
      </div>
      <br/>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>   
  </div>
  <br/><br/>
@endsection