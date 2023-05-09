@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">E-Wallet</h1>
  </div>

  <br/>
  <h4>Permintaan Top-Up</h4>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">ID Top-Up</th>
        <th scope="col">ID User</th>
        <th scope="col">Jumlah Transaksi</th>
        <th scope="col">Tanggal Permintaan Top-Up</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($ewallets_topup as $ewallet)
      <tr>
        <td>{{$loop -> iteration}}</td>
        <td>{{$ewallet->id}}</td>
        <td><a href="/dashboard/user/{{$ewallet->id_user}}">{{$ewallet->id_user}}</a></td>
        <td>@currency($ewallet->jumlah_transaksi)</td>
        <td>{{$ewallet->tanggal_transaksi}}</td>
        <td>
            <a href="/dashboard/ewallet/{{$ewallet->id}}" class="badge bg-primary"><span data-feather="eye"></span></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <br/>
  <h4>Riwayat Top-Up</h4>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">ID Top-Up</th>
        <th scope="col">ID User</th>
        <th scope="col">Jumlah Transaksi</th>
        <th scope="col">Tanggal Permintaan Top-Up</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($ewallets_history as $ewallet)
      <tr>
        <td>{{$loop -> iteration}}</td>
        <td>{{$ewallet->id}}</td>
        <td><a href="/dashboard/user/{{$ewallet->id_user}}">{{$ewallet->id_user}}</a></td>
        <td>@currency($ewallet->jumlah_transaksi)</td>
        <td>{{$ewallet->tanggal_transaksi}}</td>
        <td>
            <a href="/dashboard/ewallet/{{$ewallet->id}}" class="badge bg-primary"><span data-feather="eye"></span></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <br/>
  <h4>Saldo User</h4>
  <form action="/dashboard/ewallet/create" method="GET" class="d-inline">
    @csrf
    <button class=" btn btn-primary border-0">Tambah/Kurang Saldo</button>
  </form>
  <br/><br/>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">ID User</th>
        <th scope="col">Nama</th>
        <th scope="col">Saldo E-Wallet</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <td>{{$loop -> iteration}}</td>
        <td><a href="/dashboard/user/{{$user->id}}">{{$user->id}}</a></td>
        <td>{{$user->name}}</td>
        <td>@currency($user->saldo_ewallet)</td>
        <td>
            {{-- <a href="/dashboard/ewallet/{{$ewallet->id}}" class="badge bg-info"><span data-feather="eye"></span></a> --}}
            <a href="/dashboard/ewallet/{{$user->id}}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

@endsection