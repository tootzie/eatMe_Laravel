<?php

namespace App\Http\Controllers;

use App\Models\Komplain;
use App\Models\Nota;
use App\Models\User;
use App\Models\BisnisKuliner;
use App\Models\PemilikBisnisKuliner;
use Illuminate\Http\Request;
use DB;

class DashboardKomplainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.komplain.index',[
            'complains_belumproses' => Nota::where(['status_komplain' => '1'])->get(),
            'complains_sedangproses' => Nota::where(['status_komplain' => '11'])->get(),
            'complains_selesai' => Nota::where(['status_komplain' => '2'])->get(),
            
            
            // 'complains_selesai' => DB::table('form_komplain')
            // ->select('form_komplain.id','form_komplain.id_nota', 'form_komplain.deskripsi_komplain', 'form_komplain.gambar_komplain', 'form_komplain.sender', 'nota.status_komplain', 'nota.id_user', 'nota.id_bisnis_kuliner')
            // ->join('nota', 'nota.id', '=', 'form_komplain.id_nota')
            // ->where(['nota.status_komplain' => '2'])
            // ->get(),
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
     * @param  \App\Models\Komplain  $komplain
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nota = Nota::find($id);
        $user = User::find($nota->id_user);
        $bisnis = BisnisKuliner::find($nota->id_bisnis_kuliner);
        $pemilik_bisnis = PemilikBisnisKuliner::find($bisnis->id_pemilik_bisnis_kuliner);
        // $complain_user = Komplain::where(['id_nota' => $nota->id, 'sender' => 'user'])->get();
        // return $complain_user;

        
        return view('dashboard.komplain.show', [
            'complain_user' => Komplain::where(['id_nota' => $nota->id, 'sender' => 'user'])->get(),
            'complain_bisnis' => Komplain::where(['id_nota' => $nota->id, 'sender' => 'bisnis'])->get(),
            'user' => $user,
            'bisnis' => $bisnis,
            'pemilik_bisnis' => $pemilik_bisnis,
            'nota' => $nota
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Komplain  $komplain
     * @return \Illuminate\Http\Response
     */
    public function edit(Komplain $komplain)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Komplain  $komplain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Komplain $komplain)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Komplain  $komplain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Komplain $komplain)
    {
        //
    }

    public function validasiKomplain($id)
    {
        $nota = Nota::find($id);

        if($nota->status_komplain == 1){
            $nota->status_komplain = 11;
        } else if($nota->status_komplain == 11) {
            $nota->status_komplain = 2;
        }

        $nota->save();
        return redirect('/dashboard/komplain');
    }

    // public function sendEmail($idNota, $receiver)
    // {
    
    //     $details = [
    //         'title' => 'Komplain Diterima Oleh Administrator',
    //         'body' => 'Customer service eatMe! akan menghubungkan anda dengan pembeli/penjual yang bersangkutan melalui nomor Whatsapp yang terdaftar'
    //     ];
    
    //     \Mail::to($receiver)->send(new \App\Mail\complainMail($details));

    //     $nota = Nota::find($idNota);
    //     $nota->status_komplain = 1;
    //     $nota->save();
        
    //     return redirect()->back()->with('success', 'Email Terkirim');
    // }


}
