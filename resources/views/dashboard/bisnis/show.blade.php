@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Bisnis #{{$business->id}}</h1>
  </div>

  

  <div class="modal-body row">
    <div class="col-md-6">
        <br/>
        <h5>Bisnis</h5>
        <h6>{{$business->id}} - {{$business->nama_bisnis}}</h6>

        <br/>
        <h5>Foto Bisnis</h5>
        @if($business->foto_profil != null)
            <img src="{{ url('storage/'.$business->foto_profil) }}" class="img-fluid " alt="Foto Profil Bisnis" style="max-width: 50%; max-height: 50%;">
        @else 
            <h6>Tidak ada foto</h6>
        @endif

        <br/>
        <h5>Alamat Bisnis</h5>
        <h6>{{$business->alamat_bisnis}}</h6>
        
        <br/>
        <h5>Nomor Telepon</h5>
        <h6>{{$business->no_telp}}</h6>
        
        <br/>
        <h5>Kategori Makanan</h5>
        <h6>{{$business->kategori_makanan}}</h6>
        
        <br/>
        <h5>Jam Pengambilan</h5>
        <h6>{{$jamAwal}} - {{$jamAkhir}}</h6>
        
        <br/>
        <h5>Status Validasi</h5>
        @if ( $business->status_validasi == 1 )
            <h6> Bisnis tervalidasi </h6>
        @else 
            <h6> Bisnis belum tervalidasi </h6>
        @endif
        
        <br/>
        <h5>Status Bisnis</h5>
        @if($business->status_bisnis == 1)
            <h6> Buka </h6>
        @else 
            <h6> Tutup </h6>
        @endif

        <br/>
        <h5>Rating Bisnis</h5>
        <h6>{{$business->rating_bisnis}}</h6>
        
    </div>

    <div class="col-md-6">
        
        <br/>
        <h5>Pemilik</h5>
        <h6>{{$pemilik->id}} - {{$pemilik->nama_pemilik}}</h6>
        
        <br/>
        <h5>ID User</h5>
        <h6><a href="/dashboard/user/{{$pemilik->id_user}}">{{$pemilik->id_user}}</a></h6>
        
        <br/>
        <h5>No KTP</h5>
        <h6>{{$pemilik->no_ktp}}</h6>

        <br/>
        <h5>Alamat Pemilik</h5>
        <h6>{{$pemilik->alamat_pemilik}}</h6>
        
        <br/>
        <h5>No Telp</h5>
        <h6>{{$pemilik->no_telp}}</h6>

        <br/>
        <h5>Email Pemilik</h5>
        <h6>{{$pemilik->email_pemilik}}</h6>

        <br/>
        <h5>No Rekening</h5>
        <h6>{{$pemilik->no_rekening}}</h6>

        <br/>
        <h5>Nama Rekening</h5>
        <h6>{{$pemilik->nama_rekening}}</h6>

        <br/>
        <h5>Bank Rekening</h5>
        <h6>{{$pemilik->bank_rekening}}</h6>

        <br/><br/>
        {{-- @if($form->validasi_admin != 1)
            <form action="/dashboard/validasibisnis/konfirmasi/{{$form->id}}" method="POST">
                @method('PUT')
                @csrf
                <button class="btn btn-success border-0" onclick="return confirm('Validasi sekarang?')">Validasi Sekarang</button>
            </form>
        @else
        <form action="/dashboard/validasibisnis/konfirmasi/{{$form->id}}" method="POST">
            @method('PUT')
            @csrf
            <button class="btn btn-danger border-0" onclick="return confirm('Batalkan validasi?')">Batalkan Validasi</button>
        </form>
        @endif --}}
        
    </div>
  </div>


  

  <br/><br/>



@endsection