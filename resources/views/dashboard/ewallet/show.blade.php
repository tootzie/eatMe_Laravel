@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Detail Top-Up</h1>
  </div>

  <br/>
  <h6>User          : <a href="/dashboard/user/{{$ewallet->id_user}}">{{$ewallet->id_user}} - {{$user->name}}</a></h6>
  <h6>Jumlah top-up : @currency($ewallet->jumlah_transaksi)</h6>
  <h6>Bukti Transfer</h6>
  <img src="{{ url('storage/'.$ewallet->bukti_transfer) }}" class="img-fluid " alt="Bukti Transfer" style="max-width: 50%; max-height: 50%;">

  <br/><br/>

  @if($ewallet->status_topup == 0)
    <form action="/dashboard/ewallet/{{$ewallet->id}}" method="POST">
        @method('PUT')
        @csrf
        <button class="btn btn-success border-0" onclick="return confirm('Top-up sebesar @currency($ewallet->jumlah_transaksi) kepada {{$user->name}}?')">Top-up Sekarang</button>
    </form>
  @else
    <h5>TOP-UP BERHASIL</h5>
  @endif
  


@endsection