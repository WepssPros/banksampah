@extends('layouts.admin')
@section('dashboard-content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="col-12">
            <h2 class="content-title">List Data Product</h2>
            <h5 class="content-desc mb-4">Member Bank Sampah</h5>
        </div>
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <table id="crudTable" class="display cell-border responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Harga</th>

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
            dom: 'Bfrtip',
            buttons: [{
                extend: 'print',
                customize: function (win) {
                    $(win.document.body)
                        .css('font-size', '10pt')
                        .prepend(
                            '<div class="p-9 flex w-full grid-cols-2 justify-between"><div class="space-y-2 text-slate-700"><p class="text-lg font-bold tracking-tight uppercase font-body">Laporan Data Tabungan Sampah</p> <p class="text-lg font-bold tracking-tight uppercase font-body"> Data Sampah PT.Kinarya Ahlidaya Mandiri</p></div><div class="space-y-1 text-slate-700 "><img class="object-cover h-20  text-right items-end rounded-xl"src=" https://ptkam.co.id/wp-content/uploads/2017/08/logo2.png" /><p class="text-lg font-semibold">PT.KINARYA AHLIDAYA MANDIRI</p><p class="text-lg   font-semibold">Lrg. Siswa No.10, Suka Karya, <br> Kec. Kota Baru, Kota Jambi, Jambi 36129</p><p class="text-lg  font-semibold">Tlp : 0823-2313-4000 / 0741-23123</p></div></div>'
                        );

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                }
            }],

            ajax: {
                url: '{!! url()->current() !!}',
            },
            serverside: true,
            processing: true,
            columns: [{
                    data: 'id',
                    name: 'id',
                    width: '2%'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'category.name',
                    name: 'category.name'
                },
                {
                    data: 'price',
                    name: 'price'
                },

            ],

        });
    });

</script>
@endsection
