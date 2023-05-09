@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">User</h1>
  </div>
  <br/>
  
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">ID User</th>
        <th scope="col">Nama</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <td>{{$loop -> iteration}}</td>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>
            
            <a href="/dashboard/user/{{$user->id}}" class="badge bg-primary"><span data-feather="eye"></span></a>
            <form action="/dashboard/user/{{$user->id}}/edit" method="GET" class="d-inline">
                @csrf
                <button class=" badge bg-warning border-0"><span data-feather="edit"></span></button>
            </form>
            <form action="{{ route('user.destroy',$user->id) }}" method="POST" class="d-inline">
                @method('DELETE')
                @csrf
                <button class=" badge bg-danger border-0" onclick="return confirm('Hapus user?')"><span data-feather="trash-2"></span></button>
            </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection