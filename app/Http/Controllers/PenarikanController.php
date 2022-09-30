<?php

namespace App\Http\Controllers;

use App\Models\Penarikan;
use App\Models\Tabungan;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PenarikanController extends Controller
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

        return view('pages.dashboard.penarikan.index',[
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
     * @param  \App\Models\Penarikan  $penarikan
     * @return \Illuminate\Http\Response
     */
    public function show(Penarikan $penarikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penarikan  $penarikan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penarikan $penarikan)
    {
         $users = User::all();
         $tabungans = Tabungan::all();

        return view('pages.dashboard.penarikan.edit',[
            'item' => $penarikan,
            'users' => $users,
            'tabungans' => $tabungans,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penarikan  $penarikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penarikan $penarikan)
    {
        $data = $request->all();

        $penarikan->update($data);
        //algoritma Penarikan
        $penarikans = Penarikan::with('user','tabungan')->where('users_id', $penarikan->users_id)->first();
        // return print($totalprice);


        $tabungans = Tabungan::with(['user'])->where('users_id', $penarikan->users_id)->first();

         if (isset($request)) {
            $cek_double = $penarikan->where([
                'id' => $penarikan->id,
                'users_id' => $penarikan->users_id,
                'status' => "PROSESS",

                ])->count();
            $cek_doubles = $penarikan->where([
                'id' => $penarikan->id,
                'users_id' => $penarikan->users_id,
                'status' => "GAGAL",

                ])->count();

            if(($cek_double > 0 )) {
            return redirect()->route('dashboard.penarikan.index');
            } elseif(($cek_doubles > 0 )) {
                 return redirect()->route('dashboard.penarikan.index');
            }

            $tabungans->update([
                'users_id' => $penarikans->users_id,
                'saldo' => $tabungans->saldo - $request->saldotarik,

        ]);
         return redirect()->route('dashboard.penarikan.index');       # code...
        }
        elseif ($request) {
             $penarikan->where(['id'=> $penarikan->id, 'users_id' => $penarikan->users_id])
             ->update([

                'users_id' => $penarikans->users_id,
                'saldo' => $tabungans->saldo - $request->saldotarik,

             ]);
             return redirect()->route('dashboard.penarikan.index');
        }
        return $request->all();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penarikan  $penarikan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penarikan $penarikan)
    {
        //
    }
}
