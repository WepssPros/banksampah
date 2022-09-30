@extends('layouts.admin')
@section('dashboard-content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-10">
            <a href="{{ route('dashboard.penarikan.create') }}"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                + Buat Penarikan Melalui Admin
            </a>
        </div>
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <h2 class="content-title">Data Penarikan</h2>
                    <h5 class="content-desc mb-4">Data Penarikan</h5>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="statistics-card simple">

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-column justify-content-around align-items-start employee-stat">
                                <h5 class="content-desc">Data Seluruh Saldo Keluar</h5>

                                <h3 class="statistics-value">Rp.{{number_format($penarikansaldosuccess)}}</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="statistics-card simple">

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-column justify-content-around align-items-start employee-stat">
                                <h5 class="content-desc">Data Penarikan Success</h5>

                                <h3 class="statistics-value">{{$penarikanssuccess}}</h3>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="statistics-card simple">

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-column justify-content-around align-items-start employee-stat">
                                <h5 class="content-desc">Data Penarikan Prosess</h5>

                                <h3 class="statistics-value">{{$penarikansprosess}}</h3>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row mt-5 pb-5">
                <div class="col-12">
                    <h2 class="content-title">People</h2>
                    <h5 class="content-desc mb-4">The rangers</h5>
                </div>
                @foreach ($penarikans as $item)
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="d-flex flex-column justify-content-between align-items-center employee-card w-100">
                        <a href="{{route('dashboard.penarikan.edit', $item->id)}}">
                            <img src="{{asset('./frontend/assets/img/employees/transaksi.png')}}" alt=""
                                class="employee-img">
                        </a>

                        <div class="d-flex flex-column justify-content-center align-items-center mt-3">
                            <h4 class="employee-name">{{$item->user->name}}</h4>

                            <p class="employee-role text-gray-500">Rp.{{number_format($item->saldotarik)}}</p>
                        </div>

                        @if($item->status == "SUCCESS")
                        <div class="d-flex justify-content-center align-items-center employee-status verified">
                            <div class="employee-status-image">
                                <img src="{{asset('./frontend/assets/img/employees/check.svg')}}" alt="">
                            </div>
                            <span>Success</span>
                        </div>
                        @elseif($item->status == "PROSESS")
                        <div class="d-flex justify-content-center align-items-center text-sm  text-blue-500 verified">
                            <img src="{{asset('./frontend/assets/img/employees/diproses.svg')}}" alt="">
                            <span class="pl-1">Proses</span>
                        </div>
                        @elseif($item->status == "PENDING")
                        <div class="d-flex justify-content-center align-items-center text-sm  text-blue-500 verified">
                            <img src="{{asset('./frontend/assets/img/employees/diproses.svg')}}" alt="">
                            <span class="pl-1">Pending</span>
                        </div>
                        @elseif($item->status == "GAGAL")
                        <div class="d-flex justify-content-center align-items-center text-sm text-red-500 verified">
                            <img src="{{asset('./frontend/assets/img/employees/ditolak.svg')}}" alt="">
                            <span class="pl-1">Gagal</span>
                        </div>
                        @endif
                    </div>
                </div>

                @endforeach
                {{ $penarikans->links() }}
            </div>
        </div>
        <div class="col-12">
            <h2 class="content-title">List Data Penarikan</h2>
            <h5 class="content-desc mb-4">Member Bank Sampah</h5>
        </div>
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <table id="crudTable" class="display cell-border responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>No Rekening</th>
                            <th>Nama_bank</th>
                            <th>Jumlah yang di tarik</th>
                            <th>Saldo Terakhir</th>
                            <th>Status</th>


                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    // AJAX DataTable
    $.extend($.fn.dataTable.defaults, {
        responsive: true
    });

    $(document).ready(function () {
        $('#crudTable').DataTable({
            scrollY: 300,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [{
                    data: 'id',
                    name: 'id',
                    width: '2%'
                },
                {
                    data: 'user.name',
                    name: 'user.name'
                },
                {
                    data: 'tabungan.norek',
                    name: 'tabungan.norek'
                },
                {
                    data: 'tabungan.nama_bank',
                    name: 'tabungan.nama_bank'
                },
                {
                    data: 'saldotarik',
                    name: 'saldotarik'
                },
                {
                    data: 'saldoawal',
                    name: 'saldoawal'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    width: '15%'
                },
            ],
        });
    });

</script>
@endsection
