<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komplain;

class KomplainControllerApi extends Controller
{
    //Create
    public function store(Request $request)
    {

        $komplain = new Komplain;
        $komplain->id_nota = $request->id_nota;
        $komplain->deskripsi_komplain = $request->deskripsi_komplain;
        $komplain->sender = $request->sender;

        if($request->hasFile('image')){
            $path = $request->file('image')->store('images/komplain', ['disk' => 'public']);
            $komplain->gambar_komplain = $path;
        }
        
        $komplain->save();
        return response()->json(['message' => 'Data Created Successfully', 'data' => $komplain]);
    }

    //Read
    public function index()
    {
        $komplains = Komplain::all();
        return response()->json(['message' => 'Data Read Successfully', 'data' => $komplains] );
    }

    //Read Detail
    public function show($id)
    {
        $komplain = Komplain::find($id);
        return response()->json(['message' => 'Data Read Successfully', 'data' => $komplain]);
    }

    //Update
    public function update(Request $request, $id)
    {
        $komplain = Komplain::find($id);
        $komplain -> update($request->all());
        return response()->json(['message' => 'Data Updated Successfully', 'data' => $komplain]);
    }

    //Delete
    public function destroy($id)
    {
        $komplain = Komplain::find($id);
        $komplain->delete();
        return response()->json(['message' => 'Data Deleted Successfully', 'data' => null]);
    }
}
