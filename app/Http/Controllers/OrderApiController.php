<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderApiController extends Controller
{
    //Create
    public function store(Request $request)
    {
        $order = Order::create($request->all());
        return response()->json(['message' => 'Data Created Successfully', 'data' => $order]);
    }

    //Read
    public function index()
    {   
        $orders = Order::all();
        return response()->json(['message' => 'Data Read Successfully', 'data' => $orders]);
    }

    //Read Detail
    public function show($id)
    {
        $order = Order::find($id);
        return response()->json(['message' => 'Data Read Successfully', 'data' => $order]);
    }

    //Update
    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $order -> update($request->all());
        return response()->json(['message' => 'Data Updated Successfully', 'data' => $order]);
    }

    //Delete
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        return response()->json(['message' => 'Data Deleted Successfully', 'data' => null]);
    }
}
