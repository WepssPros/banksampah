<?php

namespace App\Http\Controllers;

use App\Models\Penarikan;
use App\Models\Pengajuansosialisasi;
use App\Models\Transaction;
use App\Models\TransactionItem;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function index(Request $request , Transaction $transaction)
    {
        //Userget
        $userscount = User::all()->count();
        $users = User::all();

        //Jemputsampahget
        $jemputsampah = Transaction::all()->where('status', "PENDING")->count();
        $jemputs = Transaction::with(['user.pengajuan'],['user.tabungan'])->latest()->simplePaginate(5);
        //Pengajuanget
        $pengajuan = Pengajuansosialisasi::all()->where('status',"PENDING")->count();
        //Penarikan Table
        $penarikans = Penarikan::with('user')->latest()->simplePaginate(5);


        // GRAFIKS
        // Grafik Tariksaldo
        if (request()->ajax()) {
            $query = TransactionItem::with(['transaction','product','tabungan' ,'user']);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                       ';
                })
                ->editColumn('total_price', function ($item) {
                    return number_format($item->total_price);
                })
                ->rawColumns(['action'])
                ->make();
        }
        //  GRAFIKS

        return view('dashboard', compact('transaction'), [
            'users' => $users,
            'userscount' => $userscount,
            'jemputsampah' => $jemputsampah,
            'jemputs' => $jemputs,
            'pengajuan' => $pengajuan,
            'penarikans' => $penarikans,





        ]);
    }
}
