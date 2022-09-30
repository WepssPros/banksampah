@extends('layouts.admin')
@section('dashboard-content')
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    Penarikan Saldo &raquo; {{ $item->user->name }} &raquo; Proses
</h2>
<div class="py-12">
    <div class=" min-h-screen flex  justify-center bg-center  py-12 px-4 sm:px-6 lg:px-8 bg-gray-500 bg-no-repeat bg-cover relative items-center rounded-xl"
        style="background-image: url(https://images.unsplash.com/photo-1532423622396-10a3f979251a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1500&q=80);">
        <div class="absolute bg-black opacity-60 inset-0 z-0 rounded-xl">
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
                        <form action="{{ route('dashboard.penarikan.update', $item->id)  }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form">
                                <div class="md:flex md:flex-row md:space-x-4 w-full text-xs">

                                    <div class="w-full flex flex-col mb-3">
                                        <label class="font-semibold text-gray-600 py-2">Pilih User<abbr
                                                title="required">*</abbr></label>
                                        <select class="disabled block w-full bg-grey-lighter text-grey-darker border
                                            border-grey-lighter rounded-lg h-10 px-4 md:w-full " required="required"
                                            name="users_id" id="integration_city_id">
                                            <option value="{{$item->user->id}}">{{$item->user->name}}</option>

                                        </select>
                                        <p class="text-sm text-red-500 hidden mt-3" id="error">Please fill out this
                                            field.
                                        </p>
                                    </div>

                                </div>
                                <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                    <div class="mb-3 space-y-2 w-full text-xs">
                                        <label class="font-semibold text-gray-600 py-2">Tabungan <abbr
                                                title="required">*</abbr></label>
                                        <select hidden
                                            class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full "
                                            required="required" name="tabungans_id">
                                            <option value="{{$item->tabungan->id}}">{{$item->tabungan->id}}</option>

                                        </select>
                                        <div class="w-full max-w-full px-3 mb-4 xl:mb-0 xl:w-1/1 xl:flex-none">
                                            <div
                                                class="relative flex flex-col min-w-0 break-words bg-transparent border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                                                <div class="relative overflow-hidden rounded-2xl"
                                                    style="background-image: url({{asset('../frontend/assets/img/background/curved14.jpg')}})">
                                                    <span
                                                        class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-dark-gray opacity-80"></span>
                                                    <div class="relative z-10 flex-auto p-4">
                                                        <i class="p-2 text-white fas fa-wifi"></i>
                                                        <h5 class=" mt-6 mb-3 text-white">
                                                            {{$item->tabungan->norek}}</h5>
                                                        <h5 class="pb-2 mb-2 text-white text-xl">
                                                            Rp. {{number_format($item->tabungan->saldo)}}</h5>
                                                        <div class="flex">
                                                            <div class="flex">
                                                                <div class="mr-6">
                                                                    <p
                                                                        class="mb-0 leading-normal text-white text-size-sm opacity-80">
                                                                        Tabungan
                                                                    </p>
                                                                    <h6 class="mb-0 text-white">
                                                                        {{$item->user->name}}</h6>
                                                                </div>
                                                                <div>
                                                                    <p
                                                                        class="mb-0 leading-normal text-white text-size-sm opacity-80">
                                                                        Bank</p>
                                                                    <h6 class="mb-0 text-white">
                                                                        {{$item->tabungan->nama_bank}}</h6>
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
                                        </div>
                                    </div>

                                </div>
                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class=" font-semibold text-gray-600 py-2">Saldo Yang Di Tarik</label>
                                    <div class="flex flex-wrap items-stretch w-full mb-4 relative">
                                        <div class="flex">
                                            <span
                                                class="flex  leading-normal bg-grey-lighter border-1 rounded-r-none border border-r-0 border-blue-300 px-3 whitespace-no-wrap text-grey-dark  w-12 h-10 bg-blue-300 justify-center items-center text-xl rounded-lg text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                    </path>
                                                </svg>
                                            </span>
                                        </div>
                                        <input type="number" name="saldotarik" value="{{$item->saldotarik}}"
                                            class="flex-shrink flex-grow  leading-normal w-px flex-1 border border-l-0 h-10 border-grey-light rounded-lg rounded-l-none px-3 relative focus:border-blue focus:shadow"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class=" font-semibold text-gray-600 py-2">Status</label>
                                    <div class="flex flex-wrap items-stretch w-full mb-4 relative">
                                        <div class="flex">
                                            <span
                                                class="flex  leading-normal bg-grey-lighter border-1 rounded-r-none border border-r-0 border-blue-300 px-3 whitespace-no-wrap text-grey-dark  w-12 h-10 bg-blue-300 justify-center items-center text-xl rounded-lg text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                    </path>
                                                </svg>
                                            </span>
                                        </div>

                                        <select class="flex-shrink flex-grow leading-normal w-px flex-1 border border-l-0
                                            h-10 border-grey-light rounded-lg rounded-l-none px-3 relative
                                            focus:border-blue focus:shadow" required="required" name="status"
                                            id="integration_city_id">
                                            <option value="{{$item->status}}">{{$item->status}}</option>
                                            <option disabled>---------------------------</option>
                                            <option value="SUCCESS">SUCCESS</option>
                                            <option value="GAGAL">GAGAL</option>
                                            <option value="PROSESS">PROSESS</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                                    <a href="{{route('dashboard.penarikan.index')}}"
                                        class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">
                                        Cancel </a>
                                    @if($item->status == "PROSESS");
                                    <button type="submit"
                                        class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500">Save</button>
                                    @elseif($item->status == "GAGAL");
                                    <button type="submit"
                                        class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500">Save</button>
                                    @elseif($item->status == "PENDING");
                                    <button type="submit"
                                        class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500">Save</button>
                                    @elseif($item->status == "SUCCESS")

                                    @endif
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
