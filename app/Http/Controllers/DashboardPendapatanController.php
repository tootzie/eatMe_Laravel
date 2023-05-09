<?php

namespace App\Http\Controllers;

use App\Models\Pendapatan;
use App\Models\BisnisKuliner;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class DashboardPendapatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //Tanggal only
        if($request->start_date != null && $request->end_date != null && $request->id_bisnis == '') {
            $start_date = Carbon::parse(request()->start_date)->toDateString();
            $end_date = Carbon::parse(request()->end_date)->toDateString();
            $data_notf = DB::table('pendapatan')
                        ->select("*")
                        ->where(function($query) use ($request, $start_date, $end_date){
                            $query->whereBetween('tanggal_pendapatan',[$start_date,$end_date])
                                ->where(['status_transfer'=>'0']);
                        })
                        ->get();
            $data_history = DB::table('pendapatan')
                        ->select("*")
                        ->where(function($query) use ($request, $start_date, $end_date){
                            $query->whereBetween('tanggal_pendapatan',[$start_date,$end_date])
                                ->where(['status_transfer'=>'1']);
                        })
                        ->get();

            if($data_notf->count() == 0){
                $data_notf = 'Not Found';
            } 
            if($data_history->count() == 0){
                $data_history = 'Not Found';
            } 


            $tanggal_awal = $start_date;
            $tanggal_akhir = $end_date;
            $id_bisnis = '';

        }  
        //Tanggal + id bisnis
        else if($request->start_date != null && $request->end_date != null && $request->id_bisnis != ''){
            $start_date = Carbon::parse(request()->start_date)->toDateString();
            $end_date = Carbon::parse(request()->end_date)->toDateString();
            // $data = Nota::whereBetween('tanggal_pendapatan',[$start_date,$end_date])->get();
            $data_notf = DB::table('pendapatan')
                    ->select("*")
                    ->where(function($query) use ($request, $start_date, $end_date){
                        $query->whereBetween('tanggal_pendapatan',[$start_date,$end_date])
                              ->where(['id_bisnis_kuliner'=>$request->id_bisnis, 'status_transfer'=>'0']);
                    })
                    ->get();
            $data_history = DB::table('pendapatan')
                    ->select("*")
                    ->where(function($query) use ($request, $start_date, $end_date){
                        $query->whereBetween('tanggal_pendapatan',[$start_date,$end_date])
                              ->where(['id_bisnis_kuliner'=>$request->id_bisnis, 'status_transfer'=>'1']);
                    })
                    ->get();

            if($data_notf->count() == 0){
                $data_notf = 'Not Found';
            } 
            if($data_history->count() == 0){
                $data_history = 'Not Found';
            } 
            $tanggal_awal = $start_date;
            $tanggal_akhir =  $end_date;
            $id_bisnis = $request->id_bisnis;
        } 
        //ID bisnis only
        else if($request->start_date == null && $request->end_date == null && $request->id_bisnis != ''){
            $data_notf = Pendapatan::where(['id_bisnis_kuliner'=>$request->id_bisnis, 'status_transfer'=>'0'])->get();
            $data_history = Pendapatan::where(['id_bisnis_kuliner'=>$request->id_bisnis, 'status_transfer'=>'1'])->get();

            if($data_notf->count() == 0){
                $data_notf = 'Not Found';
            } 
            if($data_history->count() == 0){
                $data_history = 'Not Found';
            } 
            $tanggal_awal = null;
            $tanggal_akhir =  null;
            $id_bisnis = $request->id_bisnis;
        } 
        else {
            $data_notf = Pendapatan::where(['status_transfer'=>'0'])->get();
            $data_history = Pendapatan::where(['status_transfer'=>'1'])->get();
            $tanggal_awal = null;
            $tanggal_akhir = null;
            $id_bisnis = '';
            dd($data_notf);
        }

        return view('dashboard.pendapatan.index', [
            'incomes_notf' => $data_notf,
            'incomes_history' => $data_history,
            'businesses' => BisnisKuliner::all(),
            'tanggal_awal' => $tanggal_awal,
            'tanggal_akhir' => $tanggal_akhir,
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
     * @param  \App\Models\Pendapatan  $pendapatan
     * @return \Illuminate\Http\Response
     */
    public function show(Pendapatan $pendapatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendapatan  $pendapatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendapatan $pendapatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pendapatan  $pendapatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pendapatan $pendapatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendapatan  $pendapatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendapatan $pendapatan)
    {
        //
    }

    public function validasiTransfer($id)
    {
        $pendapatan = Pendapatan::find($id);
        if($pendapatan->status_transfer == 0){
            $pendapatan->status_transfer = 1;
        } else {
            $pendapatan->status_transfer = 0;
        }

        $pendapatan -> save();
        return redirect('/dashboard/pendapatan');
    }
}
