<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Tabungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TabunganController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $status = $request->input('status');
        if($id)
        {
            $tabungan = Tabungan::with(['user', 'items.transaction', 'items.tabungan','items.product'])->find($id);

            if($tabungan)
                return ResponseFormatter::success(
                    $tabungan,
                    'Data Tabungan berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data Tabungan tidak ada',
                    404
                );
        }
         $tabungan = Tabungan::with(['user', 'items.transaction', 'items.tabungan','items.product'])->where('users_id', Auth::user()->id);

        if($status)
            $tabungan->where('status', $status);

        return ResponseFormatter::success(
            $tabungan->paginate($limit),
            'Data list Tabungan berhasil diambil'
        );

    }

     public function createTabungan(Request $request)
    {
        $tabungans = Tabungan::create([
            'users_id' => Auth::user()->id,
            'nik' => $request->nik,
            'nama_bank' => $request->nama_bank,
            'norek' => $request->norek
        ]);

        return ResponseFormatter::success($tabungans->load('user'), 'Tabungan Berhasil Di Buat ', );
    }


}
