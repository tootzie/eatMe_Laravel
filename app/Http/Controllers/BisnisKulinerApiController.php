<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BisnisKuliner;

class BisnisKulinerApiController extends Controller
{
    //Create
    public function store(Request $request)
    {
        // $business = BisnisKuliner::create($request->all());
        $business = new BisnisKuliner;
        $business->id_pemilik_bisnis_kuliner = $request->id_pemilik_bisnis_kuliner;
        $business->nama_bisnis = $request->nama_bisnis;
        $business->alamat_bisnis = $request->alamat_bisnis;
        $business->no_telp = $request->no_telp;
        $business->kategori_makanan = $request->kategori_makanan;
        $business->jam_ambil_awal = $request->jam_ambil_awal;
        $business->jam_ambil_akhir = $request->jam_ambil_akhir;
        $business->status_validasi = $request->status_validasi;
        $business->status_bisnis = $request->status_bisnis;
        $business->rating_bisnis = $request->rating_bisnis;
        
        if($request->hasFile('image')){
            $path = $request->file('image')->store('images/bisniskuliner', ['disk' => 'public']);
            $business->foto_profil = $path;
        }
        
        $business->save();
        return response()->json(['message' => 'Data Created Successfully', 'data' => $business]);
    }

    //Read
    public function index()
    {   
        $businesses = BisnisKuliner::all();
        return response()->json(['message' => 'Data Read Successfully', 'data' => $businesses]);
    }

    //Read Detail
    public function show($id)
    {
        $business = BisnisKuliner::find($id);
        return response()->json(['message' => 'Data Read Successfully', 'data' => $business]);
    }

    //Update
    public function update(Request $request, $id)
    {
        $business = BisnisKuliner::find($id);

        $business -> update($request->all());
        return response()->json(['message' => 'Data Updated Successfully', 'data' => $business]);
    }

    //Update With Image
    public function updateWithImage(Request $request, $id)
    {
        $business = BisnisKuliner::find($id);
        $business->id_pemilik_bisnis_kuliner = $request->id_pemilik_bisnis_kuliner;
        $business->nama_bisnis = $request->nama_bisnis;
        $business->alamat_bisnis = $request->alamat_bisnis;
        $business->no_telp = $request->no_telp;
        $business->kategori_makanan = $request->kategori_makanan;
        $business->jam_ambil_awal = $request->jam_ambil_awal;
        $business->jam_ambil_akhir = $request->jam_ambil_akhir;
        $business->status_validasi = $request->status_validasi;
        $business->status_bisnis = $request->status_bisnis;
        $business->rating_bisnis = $request->rating_bisnis;

        if($request->hasFile('image')){
            $path = $request->file('image')->store('images/bisniskuliner', ['disk' => 'public']);
            $business->foto_profil = $path;
        }

        $business->save();
        return response()->json(['message' => 'Data Updated Successfully', 'data' => $business]);

    }

    //Delete
    public function destroy($id)
    {
        $business = BisnisKuliner::find($id);
        $business->delete();
        return response()->json(['message' => 'Data Deleted Successfully', 'data' => null]);
    }
}
