<?php

namespace App\Http\Controllers;

use App\Models\BisnisKuliner;
use App\Models\PemilikBisnisKuliner;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardBisnisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.bisnis.index', [
            'businesses' => BisnisKuliner::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $pemiliks = PemilikBisnisKuliner::all();
        return view('dashboard.bisnis.create', [
            'pemiliks' => $pemiliks
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bisnis = BisnisKuliner::where(['id_pemilik_bisnis_kuliner' => $request->id_pemilik_bisnis_kuliner]);
        if($bisnis != null){
            return redirect('/dashboard/bisnis/create')->with('failed', 'Pemilik sudah memiliki bisnis kuliner');
        } else {
            $bisnis = BisnisKuliner::create($request->all());
            return redirect('dashboard/bisnis') -> with('success', 'Bisnis berhasil ditambah');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BisnisKuliner  $bisnisKuliner
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $business = BisnisKuliner::find($id);
        $pemilik = PemilikBisnisKuliner::find($business->id_pemilik_bisnis_kuliner);

        $dateAwal = Carbon::parse($business->jam_ambil_awal);
        $dateAkhir = Carbon::parse($business->jam_ambil_akhir);
        $jamAwal = $dateAwal->format('H:i');
        $jamAkhir = $dateAkhir->format('H:i');
        return view('dashboard.bisnis.show', [
            'business' => $business,
            'pemilik' => $pemilik,
            'jamAwal' => $jamAwal,
            'jamAkhir' => $jamAkhir
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BisnisKuliner  $bisnisKuliner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bisnis = BisnisKuliner::find($id);
        return view('dashboard.bisnis.edit', [
            'business' => $bisnis
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BisnisKuliner  $bisnisKuliner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bisnis = BisnisKuliner::find($id);
        $bisnis -> update($request->all());
        return redirect('dashboard/bisnis');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BisnisKuliner  $bisnisKuliner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bisnis = BisnisKuliner::find($id);
        $bisnis->delete();
        return redirect('dashboard/bisnis');
    }
}
