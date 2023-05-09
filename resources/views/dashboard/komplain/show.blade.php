

@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Detail Komplain (ID Transaksi (Nota): <a href="/dashboard/transaksi/{{$nota->id}}">{{$nota->id}}</a></h1>
  </div>
  <br/>
  <div class="modal-body row">
    <div class="col-md-6">

        <h3> Pihak User </h3>
        @if($complain_user->count() == 0)
          <br/>
          <h5> User tidak mengajukan komplain </h5>
        @else
          <br/>
          <h5>User</h5>
          <h6><td><a href="/dashboard/user/{{$user->id}}">{{$user->id}} - {{$user->name}}</a></td></h6>

          <br/>
          <h5>Email User</h5>
          <h6>{{$user->email}}</h6>

          <br/>
          <h5>Deskripsi Komplain</h5>
          <h6>{{$complain_user[0]->deskripsi_komplain}}</h6>

          @if($complain_user[0]->gambar_komplain == null)
            <br/>
            <h5>Gambar Komplain</h5>
            <h6>Tidak ada gambar</h6>
          @else
            <br/>
            <h5>Gambar Komplain</h5>
            <img src="{{ url('storage/'.$complain_user[0]->gambar_komplain) }}" class="img-fluid " alt="Foto KTP" style="max-width: 50%; max-height: 50%;">
          @endif
        @endif
    </div>

    <div class="col-md-6">

      <h3> Pihak Bisnis </h3>

      @if($complain_bisnis->count() == 0)
        <br/>
        <h5> Bisnis kuliner tidak mengajukan komplain </h5>
      @else
      
        <br/>
        <h5>Bisnis</h5>
        <h6><a href="/dashboard/bisnis/{{$bisnis->id}}">{{$bisnis->id}} - {{$bisnis->nama_bisnis}}</a></h6>
        
        <br/>
        <h5>Pemilik Bisnis</h5>
        <h6>{{$pemilik_bisnis->id}} - {{$pemilik_bisnis->nama_pemilik}}</h6>
        
        <br/>
        <h5>Email Pemilik</h5>
        <h6>{{$pemilik_bisnis->email_pemilik}}</h6>

        <br/>
        <h5>Deskripsi Komplain</h5>
        <h6>{{$complain_bisnis[0]->deskripsi_komplain}}</h6>

        @if($complain_bisnis[0]->gambar_komplain == null)
          <br/>
          <h5>Gambar Komplain</h5>
          <h6>Tidak ada gambar</h6>
        @else
          <br/>
          <h5>Gambar Komplain</h5>
          <img src="{{ url('storage/'.$complain_bisnis[0]->gambar_komplain) }}" class="img-fluid " alt="Foto KTP" style="max-width: 50%; max-height: 50%;">
        @endif
      @endif

      <br/>
      {{-- Button --}}
      @if($nota->status_komplain == 1)
        <form action="/dashboard/komplain/konfirmasi/{{$nota->id}}" method="POST">
          @method('PUT')
          @csrf
          <button class="btn btn-warning border-0" onclick="return confirm('Tandai komplain sedang diproses?')">Tandai Sedang Diproses</button>
        </form>
      @elseif($nota->status_komplain == 11)
        <form action="/dashboard/komplain/konfirmasi/{{$nota->id}}" method="POST">
          @method('PUT')
          @csrf
          <button class="btn btn-success border-0" onclick="return confirm('Selesaikan komplain?')">Selesaikan Komplain</button>
        </form>
      @endif
    </div>
  </div>

  

  <br/><br/>



@endsection