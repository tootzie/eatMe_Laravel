<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardEwalletController extends Controller
{

    public function index()
    {
        // return User::all();
        return view('dashboard.ewallet.index', [
            'ewallets_topup' => Transaksi::where(['tipe_transaksi' => 'topup', 'status_topup' => '0' ])->get(),
            'ewallets_history' => Transaksi::where(['tipe_transaksi' => 'topup', 'status_topup' => '1' ])->get(),
            'users' => User::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.ewallet.create', [
            'users' => User::all()
        ]);
    }

    //Top-up saldo ewallet
    public function store(Request $request)
    {
        //Cari user dengan ID request
        $user = User::find($request->id);

        //Tambah saldo
        $jumlahSaldoBaru = $request->saldo_ewallet;
        if($request->tipe == 'Penambahan'){
            $totalSaldo = $user->saldo_ewallet + $jumlahSaldoBaru;
        } else {
            if($user->saldo_ewallet > $jumlahSaldoBaru){
                $totalSaldo = $user->saldo_ewallet - $jumlahSaldoBaru;
            } else {
                $totalSaldo = 0;
            }
           
        }

        //Edit saldo_ewallet di database
        $user->saldo_ewallet = $totalSaldo;
        $user->save();

        return redirect('/dashboard/ewallet');
    }

    public function show($id)
    {   
        $ewallet = Transaksi::find($id);
        return view('dashboard.ewallet.show', [
            'ewallet' => $ewallet,
            'user' => User::find($ewallet->id_user)
        ]);
    }

    public function edit($id)
    {   
        $user = User::find($id);
        return view('dashboard.ewallet.edit',[
            'user' => $user
        ]);    
    }

    public function update($id)
    {
        $ewallet = Transaksi::find($id);
        $user = User::find($ewallet->id_user);

        $topup = $user->saldo_ewallet + $ewallet->jumlah_transaksi;

        //Update Database
        $user->saldo_ewallet = $topup;
        $ewallet->status_topup = '1';
        $user->save();
        $ewallet->save();

        return redirect('/dashboard/ewallet');
    }

    public function destroy(User $user)
    {
        //
    }

    public function updateManual(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        return redirect('/dashboard/ewallet');
    }
}
