@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Detail Transaksi (ID: {{$transaction->id}})</h1>
  </div>

  <br/>
  <h6>User: <a href="/dashboard/user/{{$user->id}}">{{$user->id}} - {{$user->name}}</a></h6>
  <h6>Bisnis Kuliner: <a href="/dashboard/bisnis/{{$bisniskuliner->id}}">{{$bisniskuliner->id}} - {{$bisniskuliner->nama_bisnis}}</a></h6>

  <br/><br/>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">ID Menu</th>
        <th scope="col">Nama Menu</th>
        <th scope="col">Harga Menu</th>
        <th scope="col">Jumlah Makanan</th>
        <th scope="col">Catatan Makanan</th>
        <th scope="col">Harga Total</th>
        <th scope="col">Tanggal Pemesanan</th>
        
      </tr>
    </thead>
    <tbody>
      @foreach ($orders as $order)
      <tr>
        <td>{{$loop -> iteration}}</td>
        <td>{{$order->id_menu}}</td>
        <td>{{$order->nama_makanan}}</td>
        <td>@currency($order->harga_makanan)</td>
        <td>{{$order->jumlah_makanan}}</td>
        <td>{{$order->catatan_makanan}}</td>
        <td>@currency($order->jumlah_makanan*$order->harga_makanan)</td>
        <td>{{$order->tanggal_pemesanan}}</td>
        {{-- <td>
            <a href="/dashboard/transaksi/{{$transaction->id}}" class="badge bg-primary"><span data-feather="eye"></span></a>
        </td> --}}
      </tr>
      @endforeach
    </tbody>
  </table>
  <br/>
  <h6>Total Transaksi: @currency($transaction->total_harga) </h6>
      
    @endsection