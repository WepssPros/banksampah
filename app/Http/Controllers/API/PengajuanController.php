<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Pengajuansosialisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanController extends Controller
{
     public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $status = $request->input('status');
        if($id)
        {
            $pengajuan = Pengajuansosialisasi::with(['user'])->find($id);

            if($pengajuan)
                return ResponseFormatter::success(
                    $pengajuan,
                    'Data Pengajuan berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data Pengajuan tidak ada',
                    404
                );
        }
         $pengajuan = Pengajuansosialisasi::with(['user'])->where('users_id', Auth::user()->id);

        if($status)
            $pengajuan->where('status', $status);

        return ResponseFormatter::success(
            $pengajuan->paginate($limit),
            'Data list Pengajuan berhasil diambil'
        );

    }

    public function createPengajuan(Request $request){
         $pengajuans = Pengajuansosialisasi::create([
            'users_id' => Auth::user()->id,
            'nama_organisasi' => $request->nama_organisasi,
            'alamat' => $request->alamat,
            'jumlahwarga' => $request->jumlahwarga,
            'alasan' => $request->alasan,
            'alasan' => $request->alasan,
            'tgl_pelaksana' => $request->tgl_pelaksana,
            'no_hp' => $request->no_hp,
            
        ]);
         return ResponseFormatter::success($pengajuans->load('user'), 'Pengajuan Berhasil ', );
    }
}
