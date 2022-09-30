<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Str;
use App\Http\Requests\TransactionRequest;
use App\Models\Tabungan;
use App\Models\TransactionItem;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $transactionss = Transaction::with(['user',])->where('status', "SUCCESS")->count();
        $transactionsp = Transaction::with(['user',])->where('status', "PENDING")->count();
        $transactiong = Transaction::with(['user',])->where('status', "SUCCESS")->sum('total_price');
        $transactions = Transaction::with(['user','user.pengajuan'])->latest()->simplePaginate(6);
        if (request()->ajax()) {
            $query = Transaction::with(['user']);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="inline-block border border-blue-700 bg-blue-700 text-white rounded-md px-2 py-1 m-1 transition duration-500 ease select-none hover:bg-blue-800 focus:outline-none focus:shadow-outline"
                            href="' . route('dashboard.transaction.show', $item->id) . '">
                            Show
                        </a>
                        <a class="inline-block border border-gray-700 bg-green-700 text-white rounded-md px-2 py-1 m-1 transition duration-500 ease select-none hover:bg-gray-800 focus:outline-none focus:shadow-outline"
                            href="' . route('dashboard.transaction.edit', $item->id) . '">
                            Proses
                        </a>';
                })
                ->editColumn('total_price', function ($item) {
                    return number_format($item->total_price);
                })

                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.dashboard.transaction.index',[
            'transactions' => $transactions,
            'transactionsp'=> $transactionsp,
            'transactionss'=> $transactionss,
            'transactiong'=> $transactiong,
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TransactionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show(Transaction $transaction)
    {

        if (request()->ajax()) {
            $query = TransactionItem::with(['product'])->where('transactions_id', $transaction->id);

            return DataTables::of($query)
                ->editColumn('product.price', function ($item) {
                    return number_format($item->product->price);
                })
                ->make();
        }

        return view('pages.dashboard.transaction.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(Transaction $transaction)
    {
        $users = User::all();
        $tabungans = Tabungan::all();
        return view('pages.dashboard.transaction.edit',[
            'item' => $transaction,
            'users'=> $users,
            'tabungans' => $tabungans,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TransactionRequest $request, Transaction $transaction )
    {
        $data = $request->all();
        $transaction->update($data);
        $tabungans = Tabungan::with(['user'])->where('users_id', $transaction->users_id)->first();

        //algoritma Transaksi
        if (isset($request)) {
            $cek_pending = $transaction->where([
                'id' => $transaction->id,
                'users_id' => $transaction->users_id,
                'status' => "PENDING",
            ])->count();
            $cek_gagal = $transaction->where([
                'id' => $transaction->id,
                'users_id' => $transaction->users_id,
                'status' => "CANCEL",
            ])->count();
            $cek_cancel = $transaction->where([
                'id' => $transaction->id,
                'users_id' => $transaction->users_id,
                'status' => "GAGAL",
            ])->count();

            if(($cek_pending > 0)) {
                return redirect()->route('dashboard.transaction.index');
            }elseif(($cek_gagal > 0)) {
                return redirect()->route('dashboard.transaction.index');
            }elseif(($cek_cancel > 0)) {
                 return redirect()->route('dashboard.transaction.index');
            }
             $tabungans->update([
                'users_id' => $transaction->users_id,
                'saldo' =>  $tabungans->saldo + $transaction->total_price,
            ]);
             return redirect()->route('dashboard.penarikan.index');
        }  elseif ($request) {
             $transaction->where(['id'=> $transaction->id, 'users_id' => $transaction->users_id])
             ->update([
                'users_id' => $transaction->users_id,
                'saldo' =>  $tabungans->saldo + $transaction->total_price,
             ]);
             return redirect()->route('dashboard.penarikan.index');
        }
        return $request->all();
         //algoritma Transaksi


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
