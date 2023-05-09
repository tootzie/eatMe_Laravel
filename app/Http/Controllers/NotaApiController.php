<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;use App\Models\Nota;

class NotaApiController extends Controller
{
    //Create
    public function store(Request $request)
    {
        $bill = Nota::create($request->all());
        return response()->json(['message' => 'Data Created Successfully', 'data' => $bill]);
    }

    //Read
    public function index()
    {   
        $bills = Nota::all();
        return response()->json(['message' => 'Data Read Successfully', 'data' => $bills]);
    }

    //Read Detail
    public function show($id)
    {
        $bill = Nota::find($id);
        return response()->json(['message' => 'Data Read Successfully', 'data' => $bill]);
    }

    //Update
    public function update(Request $request, $id)
    {
        $bill = Nota::find($id);
        $bill -> update($request->all());
        return response()->json(['message' => 'Data Updated Successfully', 'data' => $bill]);
    }

    //Delete
    public function destroy($id)
    {
        $bill = Nota::find($id);
        $bill->delete();
        return response()->json(['message' => 'Data Deleted Successfully', 'data' => null]);
    }
}
