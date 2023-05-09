<?php

namespace App\Http\Controllers;

use App\Models\FormValidasi;
use App\Models\User;
use App\Models\PemilikBisnisKuliner;
use App\Models\BisnisKuliner;
use Illuminate\Http\Request;

class DashboardValidasiBisnisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.validasibisnis.index', [
            'forms_unvalidated' => FormValidasi::where('validasi_admin', 0)->get(),
            'forms_validated' => FormValidasi::where('validasi_admin', 1)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FormValidasi  $formValidasi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $form = FormValidasi::find($id);
        $user = User::find($form->id_user);
        return view('dashboard.validasibisnis.show',[
            'form' => $form,
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FormValidasi  $formValidasi
     * @return \Illuminate\Http\Response
     */
    public function edit(FormValidasi $formValidasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FormValidasi  $formValidasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FormValidasi $formValidasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FormValidasi  $formValidasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormValidasi $formValidasi)
    {
        //
    }

    public function validasiForm($id)
    {
       $form = FormValidasi::find($id);
        
       //Ganti Status
       if($form->validasi_admin == 1){
            $form->validasi_admin = 0;
       } else {
            $form->validasi_admin = 1;
            //Daftarkan ke tabel pemilik bisnis
            $pemilik = new PemilikBisnisKuliner;
            $pemilik->id_user = $form->id_user;
            $pemilik->nama_pemilik = $form->nama_pemilik;
            $pemilik->no_ktp = $form->no_ktp;
            $pemilik->alamat_pemilik = $form->alamat_pemilik;
            $pemilik->no_telp = $form->no_telp_pemilik;
            $pemilik->email_pemilik = $form->email_pemilik;
            $pemilik->no_rekening = $form->no_rekening;
            $pemilik->nama_rekening = $form->nama_rekening;
            $pemilik->bank_rekening = $form->bank_rekening;

            $pemilik->save();

            //Daftarkan bisnis ke tabel bisnis
            $bisnis = new BisnisKuliner;
            $bisnis->id_pemilik_bisnis_kuliner = $pemilik->id;
            $bisnis->nama_bisnis = $form->nama_bisnis;
            $bisnis->alamat_bisnis = $form->alamat_bisnis;
            $bisnis->no_telp = $form->no_telp_pemilik;
            $bisnis->save();
       }
       
       $form->save();

       

       return redirect('/dashboard/validasibisnis');
    }
}
