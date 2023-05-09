<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Storage;

class MenuApiController extends Controller
{
    //Create
    public function store(Request $request)
    {
        // $menu = Menu::create($request->all());
        $menu = new Menu;
        $menu->id_bisnis_kuliner = $request->id_bisnis_kuliner;
        $menu->isBundle = $request->isBundle;
        $menu->nama_makanan = $request->nama_makanan;
        $menu->harga_makanan = $request->harga_makanan;
        $menu->harga_sebelum_diskon = $request->harga_sebelum_diskon;
        $menu->makanan_tersedia = $request->makanan_tersedia;
        $menu->deskripsi_makanan = $request->deskripsi_makanan;

        if($request->hasFile('image')){
            $path = $request->file('image')->store('images/menu', ['disk' => 'public']);
            $menu->foto_menu = $path;
        }
        
        $menu->save();
        return response()->json(['message' => 'Data Created Successfully', 'data' => $menu]);
    }

    //Read
    public function index()
    {
        $menus = Menu::all();
        return response()->json(['message' => 'Data Read Successfully', 'data' => $menus] );
    }

    //Read Detail
    public function show($id)
    {
        $menu = Menu::find($id);
        return response()->json(['message' => 'Data Read Successfully', 'data' => $menu]);
    }

    //Update
    public function update(Request $request, $id)
    {
        $menu = Menu::find($id);
        $menu -> update($request->all());
        return response()->json(['message' => 'Data Updated Successfully', 'data' => $menu]);
    }

    //Update With Image
    public function updateWithImage(Request $request, $id)
    {
        $menu = Menu::find($id);
        $menu->id_bisnis_kuliner = $request->id_bisnis_kuliner;
        $menu->nama_makanan = $request->nama_makanan;
        $menu->harga_makanan = $request->harga_makanan;
        $menu->harga_sebelum_diskon = $request->harga_sebelum_diskon;
        $menu->deskripsi_makanan = $request->deskripsi_makanan;
        
        
        
        if($request->hasFile('image')){
            $path = $request->file('image')->store('images/menu', ['disk' => 'public']);
            $menu->foto_menu = $path;
        }
        
        $menu->save();
        return response()->json(['message' => 'Data Updated Successfully', 'data' => $menu]);
    }

    //Delete
    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->delete();
        return response()->json(['message' => 'Data Deleted Successfully', 'data' => null]);
    }

}
