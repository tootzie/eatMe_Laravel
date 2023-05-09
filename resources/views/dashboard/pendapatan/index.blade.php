@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Pendapatan</h1>
  </div>

  <div class="my-2">
    <form action="/dashboard/pendapatan" method="GET">
      @csrf
        <div class="input-group mb-3">
            <input type="date" class="form-control" name="start_date" value="{{$tanggal_awal}}">
            <input type="date" class="form-control" name="end_date" value="{{$tanggal_akhir}}">
        </div>
        <div class="input-group mb-3">
          <input type="number," class="form-control" id="id_bisnis" name="id_bisnis" placeholder="ID Bisnis" value={{$id_bisnis}}>
        </div>
        <button class="btn btn-primary" type="submit">FILTER</button>
    </form>
  </div>

  <br/>
  <h4>Belum Transfer</h4>
  @if($incomes_notf == 'Not Found')
    <h5>Data Tidak Ditemukan</h5>
  @else
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">ID Pendapatan</th>
          <th scope="col">ID Bisnis Kuliner</th>
          <th scope="col">ID Transaksi (Nota)</th>
          <th scope="col">Total Transaksi</th>
          <th scope="col">Komisi</th>
          <th scope="col">Pendapatan Bersih</th>
          <th scope="col">Tanggal Transaksi</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($incomes_notf as $income)
        <tr>
          <td>{{$loop -> iteration}}</td>
          <td>{{$income->id}}</td>
          <td><a href="/dashboard/bisnis/{{$income->id_bisnis_kuliner}}">{{$income->id_bisnis_kuliner}}</a></td>
          <td><a href="/dashboard/transaksi/{{$income->id_nota}}">{{$income->id_nota}}</a></td>
          <td>@currency($income->total_harga)</td>
          <td>@currency($income->komisi)</td>
          <td>@currency($income->pendapatan_bersih)</td>
          <td>{{$income->tanggal_pendapatan}}</td>
          
          <td>
              <form action="/dashboard/pendapatan/konfirmasi/{{$income->id}}" method="POST" class="d-inline">
                  @method('PUT')
                  @csrf
                  <button class=" badge bg-success border-0" onclick="return confirm('Tandai sudah di transfer? Bisnis kuliner akan mendapatkan data dana yang sudah ditransfer')" title="sudah ditransfer"><span data-feather="check"></span></button>
              </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  @endif

  <br/>
  <h4>Riwayat Transfer</h4>
  @if($incomes_history == 'Not Found')
    <h5>Data Tidak Ditemukan</h5>
  @else
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">ID Pendapatan</th>
          <th scope="col">ID Bisnis Kuliner</th>
          <th scope="col">ID Transaksi (Nota)</th>
          <th scope="col">Total Transaksi</th>
          <th scope="col">Komisi</th>
          <th scope="col">Pendapatan Bersih</th>
          <th scope="col">Tanggal Transaksi</th>
          {{-- <th scope="col">Action</th> --}}
        </tr>
      </thead>
      <tbody>
        @foreach ($incomes_history as $income)
        <tr>
          <td>{{$loop -> iteration}}</td>
          <td>{{$income->id}}</td>
          <td><a href="/dashboard/bisnis/{{$income->id_bisnis_kuliner}}">{{$income->id_bisnis_kuliner}}</a></td>
          <td><a href="/dashboard/transaksi/{{$income->id_nota}}">{{$income->id_nota}}</a></td>
          <td>@currency($income->total_harga)</td>
          <td>@currency($income->komisi)</td>
          <td>@currency($income->pendapatan_bersih)</td>
          <td>{{$income->tanggal_pendapatan}}</td>
          
          <td>
              {{-- <a href="#" class="badge bg-primary"><span data-feather="eye"></span></a> --}}
              <form action="/dashboard/pendapatan/konfirmasi/{{$income->id}}" method="POST" class="d-inline">
                  @method('PUT')
                  @csrf
                  <button class=" badge bg-danger border-0" onclick="return confirm('Kembalikan ke daftar belum transfer?')" title="kembalikan ke daftar belum transfer"><span data-feather="x-circle"></span></button>
              </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  @endif

@endsection