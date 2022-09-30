<?php

namespace App\Http\Controllers;

use App\Http\Requests\PengajuanSosialisasiRequest;
use App\Models\Pengajuansosialisasi;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PengajuansosialisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pengajuans = Pengajuansosialisasi::with(['user'])->latest()->get();
        $pengajuansum = Pengajuansosialisasi::with(['user'])->count();
        $pengajuanacc = Pengajuansosialisasi::with(['user'])->where('status', "Disetujui")->count();
        $pengajuanproses = Pengajuansosialisasi::with(['user'])->where('status', "Diproses")->count();

        if (request()->ajax()) {
            $query = Pengajuansosialisasi::with('user');

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '

                        <a class="inline-block border border-gray-700 bg-gray-700 text-white rounded-md px-2 py-1 m-1 transition duration-500 ease select-none hover:bg-gray-800 focus:outline-none focus:shadow-outline"
                            href="' . route('dashboard.pengajuan.edit', $item->id) . '">
                            Edit
                        </a>
                        <form class="inline-block" action="' . route('dashboard.pengajuan.destroy', $item->id) . '" method="POST">
                        <button class="border border-red-500 bg-red-500 text-white rounded-md px-2 py-1 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline" >
                            Hapus
                        </button>
                            ' . method_field('delete') . csrf_field() . '
                        </form>';
                })

                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.dashboard.pengajuan.index',[
            'pengajuans' => $pengajuans,
            'pengajuansum' => $pengajuansum,
            'pengajuanacc' => $pengajuanacc,
            'pengajuanproses' => $pengajuanproses,

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
        return view('pages.dashboard.pengajuan.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(PengajuanSosialisasiRequest $request)
    {
        $data = $request->all();

        Pengajuansosialisasi::create($data);

        return redirect()->route('dashboard.pengajuan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengajuansosialisasi  $pengajuansosialisasi
     * @return \Illuminate\Http\Response
     */
    public function show(Pengajuansosialisasi $pengajuansosialisasi)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengajuansosialisasi  $pengajuansosialisasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengajuansosialisasi $pengajuan)
    {
        $users = User::all();
        return view('pages.dashboard.pengajuan.edit',[
            'item' => $pengajuan,
            'users' => $users
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengajuansosialisasi  $pengajuansosialisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengajuansosialisasi $pengajuan)
    {
        $data = $request->all();
        $users = User::all();
        $pengajuan->update($data);

        return redirect()->route('dashboard.pengajuan.index',compact('users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengajuansosialisasi  $pengajuansosialisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengajuansosialisasi $pengajuan)
    {
        //
    }
}
