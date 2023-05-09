use App\Http\Controllers\DashboardEwalletController;

@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Detail Form Validasi (ID: {{$form->id}})</h1>
  </div>

  

  <div class="modal-body row">
    <div class="col-md-6">
        <br/>
        <h5>User</h5>
        <h6><a href="/dashboard/user/{{$form->id_user}}">{{$form->id_user}} - {{$user->name}}</a></h6>

        <br/>
        <h5>Nama Bisnis</h5>
        <h6>{{$form->nama_bisnis}}</h6>

        <br/>
        <h5>Alamat Bisnis</h5>
        <h6>{{$form->alamat_bisnis}}</h6>

        <br/>
        <h5>Nama Pemilik</h5>
        <h6>{{$form->nama_pemilik}}</h6>

        <br/>
        <h5>Nomor KTP</h5>
        <h6>{{$form->no_ktp}}</h6>

        <br/>
        <h5>Alamat Pemilik</h5>
        <h6>{{$form->alamat_pemilik}}</h6>

        <br/>
        <h5>Nomor Telepon Pemilik</h5>
        <h6>{{$form->no_telp_pemilik}}</h6>

        <br/>
        <h5>Email Pemilik</h5>
        <h6>{{$form->email_pemilik}}</h6>

        <br/>
        <h5>Foto KTP</h5>
        <img src="{{ url('storage/'.$form->foto_ktp) }}" class="img-fluid " alt="Foto KTP" style="max-width: 50%; max-height: 50%;">

        <br/><br/>
        <h5>Foto Selfie dengan KTP</h5>
        <img src="{{ url('storage/'.$form->foto_selfie_ktp) }}" class="img-fluid " alt="Foto KTP" style="max-width: 50%; max-height: 50%;">
    </div>

    <div class="col-md-6">
        <br/>
        <h5>Nomor Rekening</h5>
        <h6>{{$form->no_rekening}}</h6>

        <br/>
        <h5>Nama Rekening</h5>
        <h6>{{$form->nama_rekening}}</h6>

        <br/>
        <h5>Nama Bank Rekening</h5>
        <h6>{{$form->bank_rekening}}</h6>

        <br/><br/>
        @if($form->validasi_admin != 1)
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
        @endif
        
    </div>
  </div>


  

  <br/><br/>



@endsection