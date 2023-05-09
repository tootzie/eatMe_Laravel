@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Transaksi</h1>
  </div>

  

  <div class="my-2">
    <form action="/dashboard/transaksi" method="GET">
      @csrf
        <div class="input-group mb-3">
            <input type="date" class="form-control" name="start_date" value={{$tanggal_awal}}>
            <input type="date" class="form-control" name="end_date" value={{$tanggal_akhir}}>
        </div>
        <div class="input-group mb-3">
          <input type="number" class="form-control" id="id_user" name="id_user" placeholder="ID User" value={{$id_user}}>
          <input type="number," class="form-control" id="id_bisnis" name="id_bisnis" placeholder="ID Bisnis" value={{$id_bisnis}}>
        </div>
        <button class="btn btn-primary" type="submit">FILTER</button>
    </form>
  </div>

  <br/>
  @if($transactions == 'Not Found')
    <h5>Data Tidak Ditemukan</h5>
  @else
      <br/>
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">ID Transaksi (Nota)</th>
            <th scope="col">ID User</th>
            <th scope="col">ID Bisnis Kuliner</th>
            <th scope="col">Total Item</th>
            <th scope="col">Total Harga</th>
            <th scope="col">Tanggal Pengambilan</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($transactions as $transaction)
          <tr>
            <td>{{$loop -> iteration}}</td>
            <td>{{$transaction->id}}</td>
            <td><a href="/dashboard/user/{{$transaction->id_user}}">{{$transaction->id_user}}</a></td>
            <td><a href="/dashboard/bisnis/{{$transaction->id_bisnis_kuliner}}">{{$transaction->id_bisnis_kuliner}}</a></td>
            <td>{{$transaction->total_item}}</td>
            <td>@currency($transaction->total_harga)</td>
            <td>{{$transaction->tanggal_pengambilan}}</td>
            
            <td>
                <a href="/dashboard/transaksi/{{$transaction->id}}" class="badge bg-primary"><span data-feather="eye"></span></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
  @endif
@endsection