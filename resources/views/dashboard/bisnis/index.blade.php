@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Bisnis Kuliner</h1>
  </div>

  @if (\Session::has('success'))
  <div class="alert alert-success">
      <ul>
          <li>{!! \Session::get('success') !!}</li>
      </ul>
  </div>
  @endif
  <br/>

  

  <form action="/dashboard/bisnis/create" method="GET" class="d-inline">
    @csrf
    <button class=" btn btn-success border-0">Tambah Bisnis</button>
  </form>  
  
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">ID Bisnis</th>
        <th scope="col">ID Pemilik Bisnis</th>
        <th scope="col">Nama</th>
        <th scope="col">Alamat</th>
        <th scope="col">Nomor Telp</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($businesses as $business)
      <tr>
        <td>{{$loop -> iteration}}</td>
        <td>{{$business->id}}</td>
        <td>{{$business->id_pemilik_bisnis_kuliner}}</td>
        <td>{{$business->nama_bisnis}}</td>
        <td>{{$business->alamat_bisnis}}</td>
        <td>{{$business->no_telp}}</td>
        <td>
            
            <a href="/dashboard/bisnis/{{$business->id}}" class="badge bg-primary"><span data-feather="eye"></span></a>
            <form action="/dashboard/bisnis/{{$business->id}}/edit" method="GET" class="d-inline">
                @csrf
                <button class=" badge bg-warning border-0"><span data-feather="edit"></span></button>
            </form>
            <form action="{{ route('bisnis.destroy',$business->id) }}" method="POST" class="d-inline">
                @method('DELETE')
                @csrf
                <button class=" badge bg-danger border-0" onclick="return confirm('Hapus bisnis?')"><span data-feather="trash-2"></span></button>
            </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection