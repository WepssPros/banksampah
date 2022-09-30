@extends('layouts.admin')
@section('dashboard-content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-10">
            <a href="{{ route('dashboard.tabungan.create') }}"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                + Buat Tabungan Melalui Admin
            </a>
        </div>
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <h2 class="content-title">Statistics</h2>
                    <h5 class="content-desc mb-4">Your team powers</h5>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="statistics-card simple">

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-column justify-content-around align-items-start employee-stat">
                                <h5 class="content-desc">Data Tabungan</h5>

                                <h3 class="statistics-value">{{$tabunganshitung}}</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="statistics-card simple">

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-column justify-content-around align-items-start employee-stat">
                                <h5 class="content-desc">Total Saldo Keseluruhan</h5>
                                <h3 class="statistics-value">Rp.{{number_format($tabungansmoney)}}</h3>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="statistics-card simple">

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-column justify-content-around align-items-start employee-stat">
                                <h5 class="content-desc">Traffict Transaction Request</h5>

                                <h3 class="statistics-value">{{$tabunganstraffic}}</h3>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row mt-5 pb-5">
                <div class="col-12">
                    <h2 class="content-title">Data Tabunagn</h2>
                    <h5 class="content-desc mb-4">Member Bank Sampah</h5>
                </div>
                @foreach ($tabungans as $tabungan)

                <div class="col-6 col-md-4 col-lg-4 pb-4">
                    <div class="relative overflow-hidden rounded-2xl"
                        style="background-image: url({{asset('../frontend/assets/img/background/curved14.jpg')}})">
                        <span
                            class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-dark-gray opacity-80"></span>
                        <div class="relative z-10 flex-auto p-4">
                            <i class="p-2 text-white fas fa-wifi"></i>
                            <h5 class=" mt-6 mb-3 text-white">
                                {{$tabungan->norek}}</h5>
                            <h5 class="pb-2 mb-2 text-white text-xl">
                                Rp. {{number_format($tabungan->saldo)}}</h5>
                            <div class="flex">
                                <div class="flex">
                                    <div class="mr-6">
                                        <p class="mb-0 leading-normal text-white text-size-sm opacity-80">Tabungan
                                        </p>
                                        <h6 class="mb-0 text-white">{{$tabungan->user->name}}</h6>
                                    </div>
                                    <div>
                                        <p class="mb-0 leading-normal text-white text-size-sm opacity-80">Bank</p>
                                        <h6 class="mb-0 text-white">{{$tabungan->nama_bank}}</h6>
                                    </div>
                                </div>
                                <div class="flex items-end justify-end w-1/5 ml-auto">
                                    <img class="w-3/5 mt-2"
                                        src="{{asset('../frontend/assets/img/background/mastercard.png')}}"
                                        alt="logo" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach




            </div>

        </div>
        <div class="col-12">
            <h2 class="content-title">List Data Tabunagn</h2>
            <h5 class="content-desc mb-4">Member Bank Sampah</h5>
        </div>
        <div class="shadow overflow-hidden sm:rounded-md">

            <div class="px-4 py-5 bg-white sm:p-6">
                <table id="crudTable" class="display cell-border responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Nama_bank</th>
                            <th>No Rekening</th>
                            <th>Saldo</th>

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
                    data: 'nik',
                    name: 'nik'
                },
                {
                    data: 'nama_bank',
                    name: 'nama_bank'
                },
                {
                    data: 'norek',
                    name: 'norek'
                },
                {
                    data: 'saldo',
                    name: 'saldo'
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
