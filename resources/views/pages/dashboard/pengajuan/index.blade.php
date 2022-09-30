@extends('layouts.admin')
@section('dashboard-content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-10">
            <a href="{{ route('dashboard.pengajuan.create') }}"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                + Buat Pengajuan Melalui Admin
            </a>
        </div>
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <h2 class="content-title">Data Pengajuan</h2>
                    <h5 class="content-desc mb-4">Pengajuan Sosialiasi</h5>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="statistics-card simple">

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-column justify-content-around align-items-start employee-stat">
                                <h5 class="content-desc">Total Yang Mendaftar</h5>

                                <h3 class="statistics-value">{{$pengajuansum}}</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="statistics-card simple">

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-column justify-content-around align-items-start employee-stat">
                                <h5 class="content-desc">Total Active</h5>

                                <h3 class="statistics-value">{{$pengajuanacc}}</h3>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="statistics-card simple">

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-column justify-content-around align-items-start employee-stat">
                                <h5 class="content-desc">Total Belum Active</h5>

                                <h3 class="statistics-value">{{$pengajuanproses}}</h3>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row mt-5 pb-5">
                <div class="col-12">
                    <h2 class="content-title">Data Pengajuan</h2>
                    <h5 class="content-desc mb-4">Pengajuan Sosialiasi</h5>
                </div>
                @foreach ($pengajuans as $item)
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="d-flex flex-column justify-content-between align-items-center employee-card w-100">
                        <img src="{{$item->user->profile_photo_url}}" alt="" class="employee-img">

                        <div class="d-flex flex-column justify-content-center align-items-center mt-3">
                            <h4 class="employee-name">{{$item->nama_organisasi}}</h4>
                            <p class="employee-role">{{$item->user->name}}</p>


                        </div>
                        @if($item->status == "Disetujui")
                        <div class="d-flex justify-content-center align-items-center employee-status verified">
                            <div class="employee-status-image">
                                <img src="{{asset('./frontend/assets/img/employees/check.svg')}}" alt="">
                            </div>
                            <span>Disetujui</span>
                        </div>
                        @elseif($item->status == "Diproses")
                        <div class="d-flex justify-content-center align-items-center text-sm  text-blue-500 verified">
                            <img src="{{asset('./frontend/assets/img/employees/diproses.svg')}}" alt="">
                            <span class="pl-1">Diproses</span>
                        </div>
                        @elseif($item->status == "Ditolak")
                        <div class="d-flex justify-content-center align-items-center text-sm text-red-500 verified">
                            <img src="{{asset('./frontend/assets/img/employees/ditolak.svg')}}" alt="">
                            <span class="pl-1">Ditolak</span>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach

            </div>

        </div>
        <div class="col-12">
            <h2 class="content-title">List Data Pengajuan</h2>
            <h5 class="content-desc mb-4">Member Bank Sampah</h5>
        </div>
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <table id="crudTable" class="display cell-border responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Nama Organisasi</th>
                            <th>Alamat</th>
                            <th>Jumlah Warga</th>
                            <th>Alasan</th>
                            <th>Tanggal Pelaksanaan</th>
                            <th>Nomor Telephon</th>
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
                    data: 'nama_organisasi',
                    name: 'nama_organisasi'
                },
                {
                    data: 'alamat',
                    name: 'alamat'
                },
                {
                    data: 'jumlahwarga',
                    name: 'jumlahwarga'
                },
                {
                    data: 'alasan',
                    name: 'alasan'
                },
                {
                    data: 'tgl_pelaksana',
                    name: 'tgl_pelaksana'
                },
                {
                    data: 'no_hp',
                    name: 'no_hp'
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
