<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoriteApiController extends Controller
{
    //Create
    public function store(Request $request)
    {
        // $favorite = new \App\Models\favorite();
        // $favorite->id_user = $request->id_user;
        // $favorite->id_bisnis_kuliner = $request->id_bisnis_kuliner;
        // $favorite->save();
        $favorite = Favorite::create($request->all());
        return response()->json(['message' => 'Data Created Successfully', 'data' => $favorite]);
    }

    //Read
    public function index()
    {   
        $favorites = Favorite::all();
        return response()->json(['message' => 'Data Read Successfully', 'data' => $favorites]);
    }

    //Read Detail
    public function show($id)
    {
        $favorite = Favorite::find($id);
        return response()->json(['message' => 'Data Read Successfully', 'data' => $favorite]);
    }

    //Update
    public function update(Request $request, $id)
    {
        $favorite = Favorite::find($id);
        $favorite -> update($request->all());
        return response()->json(['message' => 'Data Updated Successfully', 'data' => $favorite]);
    }

    //Delete
    public function destroy($id)
    {
        $favorite = Favorite::find($id);
        $favorite->delete();
        return response()->json(['message' => 'Data Deleted Successfully', 'data' => null]);
    }
}
