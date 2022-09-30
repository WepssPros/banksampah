@extends('layouts.admin')
@section('dashboard-content')
<div class="row">
    <div class="col-12">
        <h2 class="content-title">Statistics</h2>
        <h5 class="content-desc mb-4">Your business growth</h5>
    </div>

    <div class="col-12 col-md-6 col-lg-4">
        <div class="statistics-card">

            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex flex-column justify-content-between align-items-start">
                    <h5 class="content-desc">Member Tedaftar</h5>

                    <h3 class="statistics-value">{{$userscount}}</h3>
                </div>

                <button class="btn-statistics">
                    <img src="{{asset('./frontend/assets/img/global/times.svg')}}" alt="">
                </button>
            </div>

            <div class="statistics-list">
                @foreach ($users as $user)

                <img class="statistics-image" src="{{$user->profile_photo_url}}" alt="">
                @endforeach

            </div>

        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-4">
        <div class="statistics-card">

            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex flex-column justify-content-between align-items-start">
                    <h5 class="content-desc">Status Jemput Sampah </h5>

                    <h3 class="statistics-value">{{$jemputsampah}}</h3>
                </div>

                <a href="{{route('dashboard.transaction.index')}}" class="btn-statistics">
                    <img src="./frontend/assets/img/global/times.svg" alt="">
                </a>
            </div>

            <div class="statistics-list">
                <div class="statistics-icon award">
                    <img src="./frontend/assets/img/home/team/award.svg" alt="">
                </div>
                <div class="statistics-icon globe">
                    <img src="./frontend/assets/img/home/team/globe.svg" alt="">
                </div>
                <div class="statistics-icon target">
                    <img src="./frontend/assets/img/home/team/target.svg" alt="">
                </div>
                <div class="statistics-icon box">
                    <img src="./frontend/assets/img/home/team/box.svg" alt="">
                </div>
            </div>

        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-4">
        <div class="statistics-card">

            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex flex-column justify-content-between align-items-start">
                    <h5 class="content-desc">Status Pengajuan </h5>

                    <h3 class="statistics-value">{{$pengajuan}}</h3>
                </div>

                <a href="{{route('dashboard.pengajuan.index')}}" class="btn-statistics">
                    <img src="./frontend/assets/img/global/times.svg" alt="">
                </a>
            </div>

            <div class="statistics-list">
                @foreach ($users as $user)
                <div class="statistics-icon one">
                    <img class="statistics-image" src="{{$user->profile_photo_url}}" alt="">
                </div>
                @endforeach






            </div>

        </div>
    </div>


    {{-- //UNTUK GRAFIK  --}}
    <div class="col-12 col-md-6 col-lg-6">
        <div class="statistics-card">

            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex flex-column justify-content-between align-items-start">
                    <h5 class="content-desc">Grafik </h5>

                    {{-- ISI GRAFIK DISINI--}}
                    <table id="crudTable1" class="hidden cell-border responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Total Harga</th>
                                <th>Product</th>
                                <th>Status</th>
                                <th>Created</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                    {{-- DI DALAM NYA  --}}
                </div>
            </div>



        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-6">
        <div class="statistics-card">

            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex flex-column justify-content-between align-items-start">
                    <h5 class="content-desc">Grafik </h5>

                    {{-- ISI GRAFIK DISINI--}}
                    <table id="crudTable" class="hidden cell-border responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Total Harga</th>
                                <th>product</th>
                                <th>Status</th>
                                <th>created</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                    {{-- DI DALAM NYA  --}}
                </div>
            </div>
        </div>
    </div>
    {{-- //UNTUK GRAFIK  --}}
</div>

<div class="row mt-5">
    <div class="col-12 col-lg-6">
        <h2 class="content-title">Proses Penarikan </h2>
        <h5 class="content-desc mb-4">Daftar Penarikan Saldo</h5>

        <div class="document-card">
            @forelse ($penarikans as $item)
            <div class="document-item">
                <div class="d-flex justify-content-start align-items-center">
                    <div class="document-icon box">
                        <img class="max-w-full" src="{{$item->user->profile_photo_url}}" alt="">
                    </div>

                    <div class="d-flex flex-column justify-content-between align-items-start">
                        <h2 class="document-title">Member {{$item->user->name}}</h2>
                        <span class="document-desc">Rp • {{number_format($item->saldotarik)}}</span>
                    </div>
                    <div class="pl-4 d-flex flex-column justify-content-between align-items-start">
                        <h2 class="document-title">Status</h2>
                        <span class="document-desc text-green-600 font-bold">{{$item->status}}</span>
                    </div>
                </div>

                <a href="{{route('dashboard.penarikan.edit', $item->id)}}" class="btn-statistics">

                    <img src="{{asset('./frontend/assets/img/global/dollar-sign.svg')}}" alt="">
                </a>
            </div>
            @empty
            Daftar Penarikan Tidak ada...
            @endforelse
            {{ $penarikans->links() }}



        </div>
    </div>

    <div class="col-12 col-lg-6">
        <h2 class="content-title">History Jemnput Sampah</h2>
        <h5 class="content-desc mb-4">Jemput Sampah</h5>

        <div class="document-card">
            @forelse ($jemputs as $item)
            <div class="document-item">
                <div class="d-flex py-auto px-auto justify-content-start align-items-center">
                    <img class="document-icon" src="{{$item->user->profile_photo_url}}" alt="">

                    <div class="d-flex flex-column justify-content-between align-items-start">
                        <h2 class="document-title">{{$item->user->name}}</h2>
                        <span class="document-desc">{{$item->address}}</span>
                        <span class="document-desc">{{$item->created_at}}</span>
                    </div>

                </div>
                <div class="d-flex  justify-content-start align-items-center">
                    <div class="d-flex flex-column justify-content-between align-items-end">
                        @if ($item->status == "SUCCESS")
                        <h2 class="document-title font-bold text-green-600">{{$item->status}}</h2>
                        @elseif($item->status == "PENDING")
                        <h2 class="document-title font-bold text-yellow-600">{{$item->status}}</h2>
                        @elseif($item->status =="CANCEL")
                        <h2 class="document-title font-bold text-red-600">{{$item->status}}</h2>
                        @elseif($item->status =="GAGAL")
                        <h2 class="document-title font-bold text-red-600">{{$item->status}}</h2>
                        @endif
                        <span
                            class="document-desc font-semibold text-blue-500">Rp.{{number_format($item->total_price)}}</span>
                    </div>

                </div>


            </div>
            @empty
            Daftar tidak ada..
            @endforelse
            {{ $jemputs->links() }}


        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        // Create DataTable
        var table = $('#crudTable').DataTable({
            dom: 'Pfrtip',
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [{
                    data: 'id',
                    name: 'id',
                    width: '5%'
                },
                {
                    data: 'user.name',
                    name: 'user.name'
                },
                {
                    data: 'transaction.total_price',
                    name: 'transaction.total_price'
                },
                {
                    data: 'product.name',
                    name: 'product.name'
                },
                {
                    data: 'transaction.status',
                    name: 'transaction.status'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },

            ],
        });

        // Create the chart with initial data
        var container = $('<div/>').insertBefore(table.table().container());

        var chart = Highcharts.chart(container[0], {
            chart: {
                type: 'pie',
            },
            title: {
                text: 'Product Populer Jemput Sampah',
            },
            series: [{
                data: chartData(table),
            }, ],
        });

        // On each draw, update the data in the chart
        table.on('draw', function () {
            chart.series[0].setData(chartData(table));
        });
    });

    function chartData(table) {
        var counts = {};

        // Count the number of entries for each position
        table
            .column(3, {
                search: 'applied'
            })
            .data()
            .each(function (val) {
                if (counts[val]) {
                    counts[val] += 1;
                } else {
                    counts[val] = 1;
                }
            });

        // And map it to the format highcharts uses
        return $.map(counts, function (val, key) {
            return {
                name: key,
                y: val,
            };
        });
    }

</script>
{{-- Grafik 2  --}}
<script>
    $(document).ready(function () {
        // Create DataTable
        var table = $('#crudTable1').DataTable({
            dom: 'Pfrtip',
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [{
                    data: 'id',
                    name: 'id',
                    width: '5%'
                },
                {
                    data: 'user.name',
                    name: 'user.name'
                },
                {
                    data: 'transaction.total_price',
                    name: 'transaction.total_price'
                },
                {
                    data: 'product.name',
                    name: 'product.name'
                },
                {
                    data: 'transaction.status',
                    name: 'transaction.status'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },

            ],
        });

        // Create the chart with initial data
        var container = $('<div/>').insertBefore(table.table().container());

        var chart = Highcharts.chart(container[0], {
            chart: {
                type: 'pie',
            },
            title: {
                text: 'Status Jemput Sampah',
            },
            series: [{
                data: chartDatax(table),
            }, ],
        });

        // On each draw, update the data in the chart
        table.on('draw', function () {
            chart.series[0].setData(chartDatax(table));
        });
    });

    function chartDatax(table) {
        var counts = {};

        // Count the number of entries for each position
        table
            .column(4, {
                search: 'applied'
            })
            .data()
            .each(function (val) {
                if (counts[val]) {
                    counts[val] += 1;
                } else {
                    counts[val] = 1;
                }
            });

        // And map it to the format highcharts uses
        return $.map(counts, function (val, key) {
            return {
                name: key,
                y: val,
            };
        });
    }

</script>
@endsection
