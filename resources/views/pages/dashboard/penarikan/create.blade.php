@extends('layouts.admin')
@section('dashboard-content')


<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {!! __('Buat &raquo; Tabungan') !!}
</h2>

<div class="py-12">
    <div class=" min-h-screen flex  justify-center bg-center  py-12 px-4 sm:px-6 lg:px-8 bg-gray-500 bg-no-repeat bg-cover relative items-center"
        style="background-image: url(https://images.unsplash.com/photo-1532423622396-10a3f979251a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1500&q=80);">
        <div class="absolute bg-black opacity-60 inset-0 z-0">
        </div>
        <div class="max-w-md w-full space-y-8 p-10 bg-white rounded-xl shadow-lg z-10">
            <div class="grid  gap-8 grid-cols-1">
                @if ($errors->any())
                <div class="mb-5" role="alert">
                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                        There's something wrong!
                    </div>
                    <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                        <p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </p>
                    </div>
                </div>
                @endif
                <div class="flex flex-col ">
                    <div class="flex flex-col sm:flex-row items-center">
                        <h2 class="font-semibold text-lg mr-auto">Detail Pengajuan</h2>
                        <div class="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0"></div>
                    </div>
                    <div class="mt-5">
                        <form action="{{ route('dashboard.tabungan.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form">
                                <div class="md:flex md:flex-row md:space-x-4 w-full text-xs">

                                    <div class="w-full flex flex-col mb-3">
                                        <label class="font-semibold text-gray-600 py-2">Pilih User<abbr
                                                title="required">*</abbr></label>
                                        <select
                                            class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full "
                                            required="required" name="users_id" id="integration_city_id">
                                            <option value="disable">Seleted User</option>
                                            @foreach ($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                        <p class="text-sm text-red-500 hidden mt-3" id="error">Please fill out this
                                            field.
                                        </p>
                                    </div>
                                    <div class="w-full flex flex-col mb-3">
                                        <label class="font-semibold text-gray-600 py-2">Nama Organisasi</label>
                                        <input placeholder="Masukan NIK KTP / SIM"
                                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                            type="text" name="nik" id="integration_street_address">
                                    </div>
                                </div>
                                <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                    <div class="w-full flex flex-col mb-3">
                                        <label class="font-semibold text-gray-600 py-2">Pilih User<abbr
                                                title="required">*</abbr></label>
                                        <select
                                            class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full "
                                            required="required" name="nama_bank" id="integration_city_id">
                                            <option value="disable">Seleted Bank</option>
                                            <option value="Bank BCA">Bank BCA</option>
                                            <option value="Bank BNI">Bank BNI</option>
                                            <option value="Bank MANDIRI">Bank MANDIRI</option>
                                            <option value="Bank BRI">Bank BRI</option>
                                            <option value="Bank BTN">Bank BTN</option>

                                        </select>
                                        <p class="text-sm text-red-500 hidden mt-3" id="error">Please fill out this
                                            field.
                                        </p>
                                    </div>
                                    <div class="mb-3 space-y-2 w-full text-xs">
                                        <label class="font-semibold text-gray-600 py-2">No Rekening Bank<abbr
                                                title="required">*</abbr></label>
                                        <input placeholder="No Rekening"
                                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                            required="required" type="text" name="norek" id="integration_shop_name">
                                        <p class="text-red text-xs hidden">Please fill out this field.</p>
                                    </div>

                                </div>




                                <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                                    <a href="{{route('dashboard.tabungan.index')}}"
                                        class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">
                                        Cancel </a>
                                    <button type="submit"
                                        class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500">Save</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection
