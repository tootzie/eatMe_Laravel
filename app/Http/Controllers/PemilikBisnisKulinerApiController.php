<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemilikBisnisKuliner;

class PemilikBisnisKulinerApiController extends Controller
{
    //Create
    public function store(Request $request)
    {
        $owner = PemilikBisnisKuliner::create($request->all());
        return response()->json(['message' => 'Data Created Successfully', 'data' => $owner]);
    }

    //Read
    public function index()
    {   
        $owners = PemilikBisnisKuliner::all();
        return response()->json(['message' => 'Data Read Successfully', 'data' => $owners]);
    }

    //Read Detail
    public function show($id)
    {
        $owner = PemilikBisnisKuliner::find($id);
        return response()->json(['message' => 'Data Read Successfully', 'data' => $owner]);
    }

    //Update
    public function update(Request $request, $id)
    {
        $owner = PemilikBisnisKuliner::find($id);
        $owner -> update($request->all());
        return response()->json(['message' => 'Data Updated Successfully', 'data' => $owner]);
    }

    //Delete
    public function destroy($id)
    {
        $owner = PemilikBisnisKuliner::find($id);
        $owner->delete();
        return response()->json(['message' => 'Data Deleted Successfully', 'data' => null]);
    }
}
