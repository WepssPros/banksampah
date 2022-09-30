@extends('layouts.admin')
@section('dashboard-content')


<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __('Transaction') }}
</h2>

<div class="col-12 col-xl-9">
    <div class="content">
        <div class="row">
            <div class="col-12">
                <h2 class="content-title">Statistics</h2>
                <h5 class="content-desc mb-4">Your team powers</h5>
            </div>

            <div class="col-12 col-md-6 col-lg-6">
                <div class="statistics-card simple">

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-column justify-content-around align-items-start employee-stat">
                            <h5 class="content-desc">Transaction Success</h5>

                            <h3 class="statistics-value">{{$transactionss}}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-6">
                <div class="statistics-card simple">

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-column justify-content-around align-items-start employee-stat">
                            <h5 class="content-desc">Saldo Out Success</h5>

                            <h3 class="statistics-value">Rp.{{number_format($transactiong)}}</h3>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-6">
                <div class="statistics-card simple">

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-column justify-content-around align-items-start employee-stat">
                            <h5 class="content-desc">Inactive Pending</h5>

                            <h3 class="statistics-value">{{$transactionsp}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="statistics-card simple">

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-column justify-content-around align-items-start employee-stat">
                            <h5 class="content-desc">Inactive Pending</h5>

                            <h3 class="statistics-value">{{$transactionsp}}</h3>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row mt-5 pb-5">
            <div class="col-12">
                <h2 class="content-title">Data Penjemputan</h2>
                <h5 class="content-desc mb-4">Member Bank Sampah</h5>
            </div>
            @foreach ($transactions as $item)
            <div class="col-6 col-md-4 col-lg-4">
                <div class="d-flex flex-column justify-content-between align-items-center employee-card w-100">
                    <img src="{{$item->user->profile_photo_url}}" alt="" class="employee-img">

                    <div class="d-flex flex-column justify-content-center align-items-center mt-3">
                        <h4 class="employee-name">{{$item->user->name}}</h4>

                        <p class="employee-role text-sm text-center ">{{$item->address}}</p>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-center mt-3">
                        <h4 class="employee-name">Status</h4>
                        @if($item->status == "SUCCESS")
                        <p class="employee-role text-green-500">{{$item->status}}</p>
                        @elseif($item->status == "PENDING")
                        <p class="employee-role text-blue-500">{{$item->status}}</p>
                        @elseif($item->status == "GAGAL")
                        <p class="employee-role text-red-500">{{$item->status}}</p>
                        @elseif($item->status == "CANCEL")
                        <p class="employee-role text-red-500">{{$item->status}}</p>
                        @endif
                    </div>

                    <div class="d-flex justify-content-center align-items-center employee-status verified">
                        <a href="{{route('dashboard.transaction.show', $item->id)}}">
                            <div class="employee-status-image">
                                <img src="./assets/img/employees/check.svg" alt="">
                            </div>

                            <span>Lihat</span>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            {{ $transactions->links() }}

        </div>

    </div>
</div>
<div class="col-12">
    <h2 class="content-title">List Data Penjemputan</h2>
    <h5 class="content-desc mb-4">Member Bank Sampah</h5>
</div>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <table id="crudTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Total Harga</th>
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
    var datatable = $('#crudTable').DataTable({
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
                data: 'total_price',
                name: 'total_price'
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
                width: '25%'
            },
        ],
    });

</script>
@endsection
