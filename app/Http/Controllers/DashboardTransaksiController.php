<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\Order;
use App\Models\BisnisKuliner;
use App\Models\User;
use Illuminate\Http\Request;

use Carbon\Carbon;
use DB;

class DashboardTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        //Tanggal only
        if($request->start_date != null && $request->end_date != null && $request->id_user == '' && $request->id_bisnis == '') {
            $start_date = Carbon::parse(request()->start_date)->toDateString();
            $end_date = Carbon::parse(request()->end_date)->toDateString();
            $data = Nota::whereBetween('tanggal_pengambilan',[$start_date,$end_date])->get();

            if($data->count() == 0){
                $data = 'Not Found';
            } 
            $tanggal_awal = $start_date;
            $tanggal_akhir = $end_date;
            $id_user = '';
            $id_bisnis = '';

        } 
        //Tanggal start only 
        // else if($request->start_date != null && $request->end_date == null && $request->id_user == '' && $request->id_bisnis == '' || $request->start_date == $request->end_date) {
        //     $start_date = Carbon::parse(request()->start_date)->toDateString();
        //     $data = Nota::whereDate('tanggal_pengambilan','=', $start_date)->get();

        //     if($data->count() == 0){
        //         $data = 'Not Found';
        //     } 
        //     $tanggal_awal = $tanggal_awal;
        //     $tanggal_akhir = '';
        //     $id_user = '';
        //     $id_bisnis = '';

        // } 
        //Tanggal + id user
        else if($request->start_date != null && $request->end_date != null && $request->id_user!='' && $request->id_bisnis == ''){
            $start_date = Carbon::parse(request()->start_date)->toDateString();
            $end_date = Carbon::parse(request()->end_date)->toDateString();
            // $data = Nota::whereBetween('tanggal_pengambilan',[$start_date,$end_date])->get();
            $data = DB::table('nota')
                    ->select("*")
                    ->where(function($query) use ($request, $start_date, $end_date){
                        $query->whereBetween('tanggal_pengambilan',[$start_date,$end_date])
                              ->where(['id_user'=>$request->id_user]);
                    })
                    ->get();

            if($data->count() == 0){
                $data = 'Not Found';
            }
            $tanggal_awal = $start_date;
            $tanggal_akhir =  $end_date;
            $id_user = $request->id_user;
            $id_bisnis = '';
        } 
        //Tanggal + id bisnis
        else if($request->start_date != null && $request->end_date != null && $request->id_user=='' && $request->id_bisnis != ''){
            $start_date = Carbon::parse(request()->start_date)->toDateString();
            $end_date = Carbon::parse(request()->end_date)->toDateString();
            // $data = Nota::whereBetween('tanggal_pengambilan',[$start_date,$end_date])->get();
            $data = DB::table('nota')
                    ->select("*")
                    ->where(function($query) use ($request, $start_date, $end_date){
                        $query->whereBetween('tanggal_pengambilan',[$start_date,$end_date])
                              ->where(['id_bisnis_kuliner'=>$request->id_bisnis]);
                    })
                    ->get();

            if($data->count() == 0){
                $data = 'Not Found';
            }
            $tanggal_awal = $start_date;
            $tanggal_akhir =  $end_date;
            $id_user = '';
            $id_bisnis = $request->id_bisnis;
        } 
        //Filter Lengkap
        else if($request->start_date != null && $request->end_date != null && $request->id_user!='' && $request->id_bisnis != ''){
            $start_date = Carbon::parse(request()->start_date)->toDateString();
            $end_date = Carbon::parse(request()->end_date)->toDateString();
            // $data = Nota::whereBetween('tanggal_pengambilan',[$start_date,$end_date])->get();
            $data = DB::table('nota')
                    ->select("*")
                    ->where(function($query) use ($request, $start_date, $end_date){
                        $query->whereBetween('tanggal_pengambilan',[$start_date,$end_date])
                              ->where(['id_bisnis_kuliner'=>$request->id_bisnis, 'id_user'=>$request->id_user]);
                    })
                    ->get();

            if($data->count() == 0){
                $data = 'Not Found';
            }
            $tanggal_awal = $start_date;
            $tanggal_akhir =  $end_date;
            $id_user =  $request->id_user;
            $id_bisnis = $request->id_bisnis;
        } 
        //ID user only
        else if($request->start_date == null && $request->end_date == null && $request->id_user!='' && $request->id_bisnis == ''){
            $data = Nota::where(['id_user'=>$request->id_user])->get();

            if($data->count() == 0){
                $data = 'Not Found';
            }
            $tanggal_awal = null;
            $tanggal_akhir =  null;
            $id_user =  $request->id_user;
            $id_bisnis = '';
        } 
        //ID bisnis only
        else if($request->start_date == null && $request->end_date == null && $request->id_user=='' && $request->id_bisnis != ''){
            $data = Nota::where(['id_bisnis_kuliner'=>$request->id_bisnis])->get();

            if($data->count() == 0){
                $data = 'Not Found';
            }
            $tanggal_awal = null;
            $tanggal_akhir =  null;
            $id_user =  '';
            $id_bisnis = $request->id_bisnis;
        } 
        //ID bisnis & ID user only
        else if($request->start_date == null && $request->end_date == null && $request->id_user!='' && $request->id_bisnis != ''){
            $data = Nota::where(['id_bisnis_kuliner'=>$request->id_bisnis, 'id_user'=>$request->id_user])->get();

            if($data->count() == 0){
                $data = 'Not Found';
            }
            $tanggal_awal = null;
            $tanggal_akhir =  null;
            $id_user =  $request->id_user;
            $id_bisnis = $request->id_bisnis;
        } 
        else {
            $data = Nota::all();
            $tanggal_awal = null;
            $tanggal_akhir = null;
            $id_user = '';
            $id_bisnis = '';
        }

        return view('dashboard.transaksi.index',[
            'transactions' => $data,
            'tanggal_awal' => $tanggal_awal,
            'tanggal_akhir' => $tanggal_akhir,
            'id_user'=>$id_user,
            'id_bisnis'=>$id_bisnis

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nota = Nota::find($id);
        $orders = DB::table('orders')
        ->select('orders.id', 'orders.id_menu', 'orders.id_nota','orders.jumlah_makanan', 'orders.catatan_makanan', 'orders.tanggal_pemesanan', 'menus.nama_makanan', 'menus.harga_makanan')
        ->join('menus', 'menus.id', '=', 'orders.id_menu')
        ->where(['orders.id_nota' => $nota->id])
        ->get();
        return view('dashboard.transaksi.show', [
            'transaction' => $nota,
            'orders' => $orders,
            'user' => User::find($nota->id_user),
            'bisniskuliner' => BisnisKuliner::find($nota->id_bisnis_kuliner)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function edit(Nota $nota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nota $nota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nota $nota)
    {
        //
    }
}
