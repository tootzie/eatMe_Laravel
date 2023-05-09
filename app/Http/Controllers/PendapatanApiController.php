<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendapatan;

class PendapatanApiController extends Controller
{
    //Create
    public function store(Request $request)
    {
        $income = Pendapatan::create($request->all());
        return response()->json(['message' => 'Data Created Successfully', 'data' => $income]);
    }

    //Read
    public function index()
    {   
        $incomes = Pendapatan::all();
        return response()->json(['message' => 'Data Read Successfully', 'data' => $incomes]);
    }

    //Read Detail
    public function show($id)
    {
        $income = Pendapatan::find($id);
        return response()->json(['message' => 'Data Read Successfully', 'data' => $income]);
    }

    //Update
    public function update(Request $request, $id)
    {
        $income = Pendapatan::find($id);
        $income -> update($request->all());
        return response()->json(['message' => 'Data Updated Successfully', 'data' => $income]);
    }

    //Delete
    public function destroy($id)
    {
        $income = Pendapatan::find($id);
        $income->delete();
        return response()->json(['message' => 'Data Deleted Successfully', 'data' => null]);
    }
}
