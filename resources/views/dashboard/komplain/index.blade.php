@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Komplain</h1>
  </div>

  <br/>
  <h4>Belum Diproses</h4>

  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">ID Transaksi (Nota)</th>
        <th scope="col">ID User (Konsumen)</th>
        <th scope="col">ID Bisnis Kuliner</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($complains_belumproses as $complain)
      <tr>
        <td>{{$loop -> iteration}}</td>
        <td><a href="/dashboard/transaksi/{{$complain->id}}">{{$complain->id}}</a></td>
        <td><a href="/dashboard/user/{{$complain->id_user}}">{{$complain->id_user}}</a></td>
        <td><a href="/dashboard/bisnis/{{$complain->id_bisnis_kuliner}}">{{$complain->id_bisnis_kuliner}}</a></td>
        
        <td>
            <a href="/dashboard/komplain/{{$complain->id}}" class="badge bg-primary"><span data-feather="eye"></span></a>
            <form action="/dashboard/komplain/konfirmasi/{{$complain->id}}" method="POST" class="d-inline">
              @method('PUT')
              @csrf
              <button class="badge bg-warning border-0" onclick="return confirm('Tandai komplain sedang diproses?')"><span data-feather="check"></span></button>
            </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <br/>
  <h4>Sedang Diproses</h4>

  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">ID Transaksi (Nota)</th>
        <th scope="col">ID User (Konsumen)</th>
        <th scope="col">ID Bisnis Kuliner</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($complains_sedangproses as $complain)
      <tr>
        <td>{{$loop -> iteration}}</td>
        <td><a href="/dashboard/transaksi/{{$complain->id}}">{{$complain->id}}</a></td>
        <td><a href="/dashboard/user/{{$complain->id_user}}">{{$complain->id_user}}</a></td>
        <td><a href="/dashboard/bisnis/{{$complain->id_bisnis_kuliner}}">{{$complain->id_bisnis_kuliner}}</a></td>
        
        <td>
            <a href="/dashboard/komplain/{{$complain->id}}" class="badge bg-primary"><span data-feather="eye"></span></a>
            <form action="/dashboard/komplain/konfirmasi/{{$complain->id}}" method="POST" class="d-inline">
              @method('PUT')
              @csrf
              <button class="badge bg-success border-0" onclick="return confirm('Selesaikan komplain?')"><span data-feather="check"></span></button>
            </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <br/>
  <h4>Komplain Selesai</h4>

  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">ID Transaksi (Nota)</th>
        <th scope="col">ID User (Konsumen)</th>
        <th scope="col">ID Bisnis Kuliner</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($complains_selesai as $complain)
      <tr>
        <td>{{$loop -> iteration}}</td>
        <td><a href="/dashboard/transaksi/{{$complain->id}}">{{$complain->id}}</a></td>
        <td><a href="/dashboard/user/{{$complain->id_user}}">{{$complain->id_user}}</a></td>
        <td><a href="/dashboard/bisnis/{{$complain->id_bisnis_kuliner}}">{{$complain->id_bisnis_kuliner}}</a></td>
        
        <td>
            <a href="/dashboard/komplain/{{$complain->id}}" class="badge bg-primary"><span data-feather="eye"></span></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection