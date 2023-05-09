<?php

namespace App\Http\Controllers;

use App\Models\DetailBundle;
use Illuminate\Http\Request;

class DetailBundleApiController extends Controller
{
    //Create
    public function store(Request $request)
    {
        $bundle = DetailBundle::create($request->all());
        return response()->json(['message' => 'Data Created Successfully', 'data' => $bundle]);
    }

    //Read
    public function index()
    {   
        $bundles = DetailBundle::all();
        return response()->json(['message' => 'Data Read Successfully', 'data' => $bundles]);
    }

    //Read Detail
    public function show($id)
    {
        $bundle = DetailBundle::find($id);
        return response()->json(['message' => 'Data Read Successfully', 'data' => $bundle]);
    }

    //Update
    public function update(Request $request, $id)
    {
        $bundle = DetailBundle::find($id);
        $bundle -> update($request->all());
        return response()->json(['message' => 'Data Updated Successfully', 'data' => $bundle]);
    }

    //Delete
    public function destroy($id)
    {
        $bundle = DetailBundle::find($id);
        $bundle->delete();
        return response()->json(['message' => 'Data Deleted Successfully', 'data' => null]);
    }
}
