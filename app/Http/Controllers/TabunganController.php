<?php

namespace App\Http\Controllers;

use App\Models\Penarikan;
use App\Models\Pengajuansosialisasi;
use App\Models\Tabungan;
use App\Models\TransactionItem;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TabunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tabungans = Tabungan::with(['user'])->latest()->paginate(6);
        $tabunganshitung = Tabungan::with(['user'])->count();
        $tabungansmoney = Tabungan::with(['user'])->sum('saldo');
        $tabunganstraffic = TransactionItem::with(['tabungan' ,'transaction'])->count();
        if (request()->ajax()) {
            $query = Tabungan::with('user');

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="inline-block border border-gray-700 bg-green-700 text-white rounded-md px-2 py-1 m-1 transition duration-500 ease select-none hover:bg-gray-800 focus:outline-none focus:shadow-outline"
                            href="' . route('dashboard.tabungan.show', $item->id) . '">
                            Show
                        </a>
                        <a class="inline-block border border-gray-700 bg-gray-700 text-white rounded-md px-2 py-1 m-1 transition duration-500 ease select-none hover:bg-gray-800 focus:outline-none focus:shadow-outline"
                            href="' . route('dashboard.tabungan.edit', $item->id) . '">
                            Edit
                        </a>
                        <form class="inline-block" action="' . route('dashboard.tabungan.destroy', $item->id) . '" method="POST">
                        <button class="border border-red-500 bg-red-500 text-white rounded-md px-2 py-1 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline" >
                            Hapus
                        </button>
                            ' . method_field('delete') . csrf_field() . '
                        </form>';
                })
                ->editColumn('saldo', function ($item) {
                    return number_format($item->saldo);
                })

                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.dashboard.tabungan.index', [
            'tabungans' => $tabungans,
            'tabunganshitung' => $tabunganshitung,
            'tabungansmoney' => $tabungansmoney,
            'tabunganstraffic' => $tabunganstraffic,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {
        $users = User::all();
        return view('pages.dashboard.tabungan.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        Tabungan::create($data);

        return redirect()->route('dashboard.tabungan.index');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tabungan  $tabungan
     * @return \Illuminate\Http\Response
     */
    public function show(Tabungan $tabungan, User $user)
    {

        $transactions  = TransactionItem::with('tabungan')->where('tabungans_id', $tabungan->id)->get();
        $penarikans  = Penarikan::with('tabungan')->where('tabungans_id', $tabungan->id)->simplePaginate(5);
        return view('pages.dashboard.tabungan.show', compact('tabungan') , [
            'transactions' => $transactions,
            'penarikans' => $penarikans,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tabungan  $tabungan
     * @return \Illuminate\Http\Response
     */
    public function edit(Tabungan $tabungan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tabungan  $tabungan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tabungan $tabungan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tabungan  $tabungan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tabungan $tabungan)
    {
        //
    }
}
