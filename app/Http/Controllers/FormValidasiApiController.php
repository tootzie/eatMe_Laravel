<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormValidasi;

class FormValidasiApiController extends Controller
{
    //Create
    public function store(Request $request)
    {
        $form = new FormValidasi;
        $form->id_user  = $request->id_user;
        $form->nama_bisnis = $request->nama_bisnis;
        $form->alamat_bisnis = $request->alamat_bisnis;
        $form->nama_pemilik = $request->nama_pemilik;
        $form->no_ktp = $request->no_ktp;
        $form->alamat_pemilik = $request->alamat_pemilik;
        $form->no_telp_pemilik = $request->no_telp_pemilik;
        $form->email_pemilik = $request->email_pemilik;
        $form->no_rekening = $request->no_rekening;
        $form->nama_rekening = $request->nama_rekening;
        $form->bank_rekening = $request->bank_rekening;

        
        if($request->hasFile('fotoKTP')){
            $pathFotoKTP = $request->file('fotoKTP')->store('images/form/fotoKTP', ['disk' => 'public']);
            $form->foto_ktp = $pathFotoKTP;
        }
        
        if($request->hasFile('fotoSelfieKTP')){
            $pathfotoSelfieKTP = $request->file('fotoSelfieKTP')->store('images/form/fotoSelfieKTP', ['disk' => 'public']);
            $form->foto_selfie_ktp = $pathfotoSelfieKTP;
        }
        
        $form->save();
        return response()->json(['message' => 'Data Created Successfully', 'data' => $form]);
    }

    //Read
    public function index()
    {   
        $forms = FormValidasi::all();
        return response()->json(['message' => 'Data Read Successfully', 'data' => $forms]);
    }

    //Read Detail
    public function show($id)
    {
        $form = FormValidasi::find($id);
        return response()->json(['message' => 'Data Read Successfully', 'data' => $form]);
    }

    //Update
    public function update(Request $request, $id)
    {
        $form = FormValidasi::find($id);

        $form -> update($request->all());
        return response()->json(['message' => 'Data Updated Successfully', 'data' => $form]);
    }

    //Update With Image
    public function updateWithImage(Request $request, $id)
    {
        $form = FormValidasi::find($id);
        $form->id_user  = $request->id_user;
        $form->nama_bisnis = $request->nama_bisnis;
        $form->alamat_bisnis = $request->alamat_bisnis;
        $form->nama_pemilik = $request->nama_pemilik;
        $form->no_ktp = $request->no_ktp;
        $form->alamat_pemilik = $request->alamat_pemilik;
        $form->no_telp_pemilik = $request->no_telp_pemilik;
        $form->email_pemilik = $request->email_pemilik;
        $form->no_rekening = $request->no_rekening;
        $form->nama_rekening = $request->nama_rekening;
        $form->bank_rekening = $request->bank_rekening;

        if($request->hasFile('fotoKTP')){
            $pathFotoKTP = $request->file('fotoKTP')->store('images/form/fotoKTP', ['disk' => 'public']);
            $form->foto_ktp = $pathFotoKTP;
        }

        if($request->hasFile('fotoSelfieKTP')){
            $pathfotoSelfieKTP = $request->file('fotoSelfieKTP')->store('images/form/fotoSelfieKTP', ['disk' => 'public']);
            $form->foto_selfie_ktp = $pathFotoSelfieKTP;
        }

        $form->save();
        return response()->json(['message' => 'Data Updated Successfully', 'data' => $form]);

    }

    //Delete
    public function destroy($id)
    {
        $form = FormValidasi::find($id);
        $form->delete();
        return response()->json(['message' => 'Data Deleted Successfully', 'data' => null]);
    }
}
