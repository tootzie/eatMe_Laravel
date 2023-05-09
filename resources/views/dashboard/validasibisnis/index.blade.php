

@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Validasi Bisnis Kuliner</h1>
  </div>

  <br/>
  <h4>Perlu Validasi</h4>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">ID Form</th>
        <th scope="col">ID User</th>
        <th scope="col">Nama Bisnis</th>
        <th scope="col">Nama Pemilik</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($forms_unvalidated as $form)
      <tr>
        <td>{{$loop -> iteration}}</td>
        <td>{{$form->id}}</td>
        <td><a href="/dashboard/user/{{$form->id_user}}">{{$form->id_user}}</a></td>
        <td>{{$form->nama_bisnis}}</td>
        <td>{{$form->nama_pemilik}}</td>
        <td>
            <a href="/dashboard/validasibisnis/{{$form->id}}" class="badge bg-primary"><span data-feather="eye"></span></a>
            <form action="/dashboard/validasibisnis/konfirmasi/{{$form->id}}" method="POST" class="d-inline">
                @method('PUT')
                @csrf
                <button class=" badge bg-success border-0" onclick="return confirm('Validasi sekarang?')" title="validasi"><span data-feather="check"></span></button>
            </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <br/>
  
  <h4>Sudah Tervalidasi </h4>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">ID Form</th>
        <th scope="col">ID User</th>
        <th scope="col">Nama Bisnis</th>
        <th scope="col">Nama Pemilik</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($forms_validated as $form)
      <tr>
        <td>{{$loop -> iteration}}</td>
        <td>{{$form->id}}</td>
        <td><a href="/dashboard/user/{{$form->id_user}}">{{$form->id_user}}</a></td>
        <td>{{$form->nama_bisnis}}</td>
        <td>{{$form->nama_pemilik}}</td>
        <td>
            
            <a href="/dashboard/validasibisnis/{{$form->id}}" class="badge bg-primary"><span data-feather="eye"></span></a>
            <form action="/dashboard/validasibisnis/konfirmasi/{{$form->id}}" method="POST" class="d-inline">
                @method('PUT')
                @csrf
                <button class=" badge bg-danger border-0" onclick="return confirm('Batalkan validasi?')" title="batalkan validasi"><span data-feather="x-circle"></span></button>
            </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

@endsection