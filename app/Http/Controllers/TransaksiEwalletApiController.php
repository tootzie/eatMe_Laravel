<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiEwalletApiController extends Controller
{
    //Create
    public function store(Request $request)
    {
        $transaction = Transaksi::create($request->all());
        $transaction->id_user = $request->id_user;
        $transaction->id_bisnis_kuliner = $request->id_bisnis_kuliner;
        $transaction->id_nota = $request->id_nota;
        $transaction->jumlah_transaksi = $request->jumlah_transaksi;
        $transaction->tipe_transaksi = $request->tipe_transaksi;
        $transaction->tanggal_transaksi = $request->tanggal_transaksi;
        $transaction->status_topup = $request->status_topup;


        if($request->hasFile('image')){
            $path = $request->file('image')->store('images/buktiTf', ['disk' => 'public']);
            $transaction->bukti_transfer = $path;
        }
        
        $transaction->save();
        return response()->json(['message' => 'Data Created Successfully', 'data' => $transaction]);
    }

    //Read
    public function index()
    {   
        $transactions = Transaksi::all();
        return response()->json(['message' => 'Data Read Successfully', 'data' => $transactions]);
    }

    //Read Detail
    public function show($id)
    {
        $transaction = Transaksi::find($id);
        return response()->json(['message' => 'Data Read Successfully', 'data' => $transaction]);
    }

    //Update
    public function update(Request $request, $id)
    {
        $transaction = Transaksi::find($id);
        $transaction -> update($request->all());
        return response()->json(['message' => 'Data Updated Successfully', 'data' => $transaction]);
    }

    //Delete
    public function destroy($id)
    {
        $transaction = Transaksi::find($id);
        $transaction->delete();
        return response()->json(['message' => 'Data Deleted Successfully', 'data' => null]);
    }
}
