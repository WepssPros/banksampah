@extends('layouts.admin')
@section('dashboard-content')
<div class="flex flex-wrap -mx-3">
    <div class="max-w-full px-3 lg:w-2/3 lg:flex-none">
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 mb-4 xl:mb-0 xl:w-1/2 xl:flex-none">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-transparent border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
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
            </div>
            <div class="w-full max-w-full px-3 xl:w-1/2 xl:flex-none">
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full max-w-full px-3 md:w-1/2 md:flex-none">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                            <div
                                class="p-4 mx-6 mb-0 text-center bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                <div
                                    class="w-16 h-16 text-center bg-center icon bg-gradient-fuchsia shadow-soft-2xl rounded-xl">
                                    <i
                                        class="relative text-black opacity-100  fas fa-landmark text-size-xl top-31/100"></i>
                                </div>
                            </div>
                            <div class="flex-auto p-4 pt-0 text-center">
                                <h6 class="mb-0 text-center">Tabungan Anda</h6>
                                <span class="leading-tight text-size-xs">Saldo Sekarang</span>
                                <hr class="h-px my-4 bg-transparent bg-gradient-horizontal-dark" />
                                <h5 class="mb-0">Rp. {{number_format($tabungan->saldo)}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 mt-6 md:mt-0 md:w-1/2 md:flex-none">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                            <div
                                class="p-4 mx-6 mb-0 text-center bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                <div
                                    class="w-16 h-16 text-center bg-center icon bg-gradient-fuchsia shadow-soft-2xl rounded-xl">
                                    <i class="relative text-black opacity-100 fa fa-address-card text-size-xl
                                        top-31/100"></i>
                                </div>
                            </div>
                            <div class="flex-auto p-4 pt-0 text-center">
                                <h6 class="mb-0 text-center">{{$tabungan->user->name}}</h6>
                                <span class="leading-tight text-size-xs">{{$tabungan->user->email}}</span>
                                <hr class="h-px my-4 bg-transparent bg-gradient-horizontal-dark" />
                                <h5 class="mb-0">$455.00</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="max-w-full px-3 mb-4 lg:mb-0 lg:w-full lg:flex-none">
                <div
                    class="relative flex flex-col min-w-0 mt-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-4 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="flex flex-wrap -mx-3">
                            <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                                <h6 class="mb-0">Payment Method</h6>
                            </div>
                            <div class="flex-none w-1/2 max-w-full px-3 text-right">
                                <a class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all bg-transparent rounded-lg cursor-pointer leading-pro text-size-xs ease-soft-in shadow-soft-md bg-150 bg-gradient-dark-gray hover:shadow-soft-xs active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25"
                                    href="javascript:;"> <i class="fas fa-plus"> </i>&nbsp;&nbsp;Add New Card</a>
                            </div>
                        </div>
                    </div>
                    <div class="flex-auto p-4">
                        <div class="flex flex-wrap -mx-3">
                            <div class="max-w-full px-3 mb-6 md:mb-0 md:w-1/2 md:flex-none">
                                <div
                                    class="relative flex flex-row items-center flex-auto min-w-0 p-6 break-words bg-transparent border border-solid shadow-none rounded-xl border-slate-100 bg-clip-border">
                                    <img class="mb-0 mr-4 w-10"
                                        src="{{asset('../frontend/assets/img/background/mastercard.png')}}"
                                        alt="logo" />
                                    <h6 class="mb-0">
                                        ****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;
                                        ****&nbsp;&nbsp;&nbsp</h6>

                                    <div data-target="tooltip"
                                        class="hidden px-2 py-1 text-white bg-black rounded-lg text-size-sm">
                                        Edit Card
                                        <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']"
                                            data-popper-arrow></div>
                                    </div>
                                </div>
                            </div>
                            <div class="max-w-full px-3 mb-6 md:mb-0 md:w-1/2 md:flex-none">
                                <div
                                    class="relative flex flex-row items-center flex-auto min-w-0 p-6 break-words bg-transparent border border-solid shadow-none rounded-xl border-slate-100 bg-clip-border">
                                    <img class="mb-0 mr-4 w-10"
                                        src="{{asset('../frontend/assets/img/background/mastercard.png')}}"
                                        alt="logo" />
                                    <h6 class="mb-0">
                                        ****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;
                                        ****&nbsp;&nbsp;&nbsp</h6>

                                    <div data-target="tooltip"
                                        class="hidden px-2 py-1 text-white bg-black rounded-lg text-size-sm">
                                        Edit Card
                                        <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']"
                                            data-popper-arrow></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full max-w-full px-3 lg:w-1/3 lg:flex-none">
        <color:div
            class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="p-4 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <div class="flex flex-wrap -mx-3">
                    <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                        <h6 class="mb-0">Transaksi Bank Sampah</h6>
                    </div>
                    <div class="flex-none w-1/2 max-w-full px-3 text-right">
                        <a href="{{route('dashboard.transaction.index')}}"
                            class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-size-xs bg-150 active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25 border-fuchsia-500 text-fuchsia-500 hover:opacity-75">View
                            All</a>
                    </div>
                </div>
            </div>
            <div class="flex-auto p-4 pb-0">

                <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                    @forelse ($transactions as $item)
                    <li
                        class="relative flex justify-between px-4 py-2 pl-0 mb-2 bg-white border-0 rounded-t-inherit text-size-inherit rounded-xl">
                        <div class="flex flex-col">
                            <h6 class="mb-1 font-semibold leading-normal text-size-sm  text-slate-700">
                                {{$item->created_at}}
                            </h6>
                            <span class="leading-tight text-size-xs">#BK-000-{{$item->id}}</span>
                            <span class="leading-tight text-size-xs">Status {{$item->transaction->status}}</span>
                        </div>
                        <div class="flex items-center leading-normal text-size-sm">
                            Rp.{{number_format($item->transaction->total_price)}}

                            <a href="{{route('dashboard.transaction.show', $item->transactions_id)}}"
                                class="inline-block px-0 py-3 mb-0 ml-3 font-bold leading-normal text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer ease-soft-in bg-150 text-size-sm active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25 text-slate-700"><i
                                    class="mr-1 fas fa-folder text-size-lg"></i> Lihat
                            </a>
                        </div>
                    </li>
                    @empty

                    @endforelse

                </ul>
            </div>

        </color:div>
    </div>





</div>
@endsection
