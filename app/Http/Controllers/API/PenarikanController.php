<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Penarikan;
use App\Models\Pengajuansosialisasi;
use App\Models\Tabungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenarikanController extends Controller
{
     public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 100);
        $status = $request->input('status');
        if($id)
        {
            $penarikan = Penarikan::with(['user','tabungan.user'])->find($id);

            if($penarikan)
                return ResponseFormatter::success(
                    $penarikan,
                    'Data Penarikan berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data Penarikan tidak ada',
                    404
                );
        }
         $penarikan = Penarikan::with(['user','tabungan.user'])->where('users_id', Auth::user()->id);

        if($status)
            $penarikan->where('status', $status);

        return ResponseFormatter::success(
            $penarikan->paginate($limit),
            'Data list Penarikan berhasil diambil'
        );

    }

    public function withdraw(Request $request,Penarikan $tabungan)
    {

        $tabungan = Tabungan::with(['user',])->where('users_id', Auth::user()->id)->first();
        
        if ($tabungan->saldo > $request->saldotarik)
        {
             $penarikan = Penarikan::create([
            'users_id' => Auth::user()->id,
            'tabungans_id' => $tabungan->id,
            'saldotarik' => $request->saldotarik,
            'saldoawal' => $tabungan->saldo,
            
        ]); 
        } elseif ($tabungan->saldo >= $request->saldotarik) 
        {
            $penarikan = Penarikan::create([
            'users_id' => Auth::user()->id,
            'tabungans_id' => $tabungan->id,
            'saldotarik' => $request->saldotarik,
            'saldoawal' => $tabungan->saldo,
            
        ]);
        } else {
             return ResponseFormatter::error(
                    null,
                    'Saldo Tidak Cukup',
                    404
                );
        }
       
        return ResponseFormatter::success($penarikan->load('user'), 'Withdraw Berhasil ', );
    }
}
