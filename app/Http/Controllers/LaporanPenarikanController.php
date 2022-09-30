<?php

namespace App\Http\Controllers;

use App\Models\Penarikan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LaporanPenarikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $penarikansaldosuccess = Penarikan::with(['user','tabungan'])->where('status', "SUCCESS")->sum('saldotarik');
        $penarikanssuccess = Penarikan::with(['user','tabungan'])->where('status', "SUCCESS")->count();
        $penarikansprosess = Penarikan::with(['user','tabungan'])->where('status', "PROSESS")->count();
        $penarikans = Penarikan::with(['user','tabungan'])->latest()->paginate(8);

        if (request()->ajax()) {
            $query = Penarikan::with(['user','tabungan']);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="inline-block border border-blue-800 bg-blue-500 text-white rounded-md px-2 py-1 m-1 transition duration-500 ease select-none hover:bg-gray-800 focus:outline-none focus:shadow-outline"
                            href="' . route('dashboard.penarikan.edit', $item->id) . '">
                            Prosess Transaksi Ini
                        </a>
                       ';
                })
                ->editColumn('saldotarik', function ($item) {
                    return number_format($item->saldotarik);
                })
                 ->editColumn('saldoawal', function ($item) {
                    return number_format($item->saldoawal);
                })

                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.dashboard.laporan.laporanpenarikan',[
            'penarikansaldosuccess' => $penarikansaldosuccess,
            'penarikanssuccess' => $penarikanssuccess,
            'penarikansprosess' => $penarikansprosess,
            'penarikansprosess' => $penarikansprosess,
            'penarikans' => $penarikans,


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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
