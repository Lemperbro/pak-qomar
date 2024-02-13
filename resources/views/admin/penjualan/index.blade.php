@extends('admin.layouts.main')

@section('container')
    <section>
        @include('admin.penjualan._header')

        {{-- isi --}}
        <div class="pt-24">
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
                @include('admin.penjualan._cardSemuaT')
                @if (request('kecamatan') !== null)
                @include('admin.penjualan._cardKec')
                @endif

            </div>
            <div class="p-4 grid grid-cols-1 bg-white border-[1px] border-main3 rounded-md mt-4">
                <h1 class="text-lg font-semibold text-Sidebar">Filter Data</h1>
                <form class="grid grid-cols-2 gap-4" action="{{ route('penjualan') }}" method="GET">

                    <div>
                        <label for="desa">Desa</label>
                        <select name="desa" id="desa"
                            class="w-full rounded-md border-[1px] border-main3 focus:ring-0 focus:outline-none focus:border-main2 mt-1">
                            <option value="" selected>Pilih Desa</option>
                            @for ($i = 0; $i < count($desa) ; $i++)
                            <option value="{{ $desa[$i] }}" class="uppercase" {{ $desa[$i] == request('desa') ? 'selected' : '' }}>
                                {{ $desa[$i] }}
                            </option>
                        @endfor
                        
                        </select>
                    </div>
                    <div>
                        <label for="kecamatan">Kecamatan</label>
                        <select name="kecamatan" id="kecamatan"
                            class="w-full rounded-md border-[1px] border-main3 focus:ring-0 focus:outline-none focus:border-main2 mt-1">
                            <option value=""  selected>Pilih kecamatan</option>
                            @for ($i = 0; $i < count($kecamatan) ; $i++)
                            <option value="{{ $kecamatan[$i] }}" class="uppercase" {{ $kecamatan[$i] == request('kecamatan') ? 'selected' : '' }}>
                                {{ $kecamatan[$i] }}
                            </option>
                        @endfor
                        
                        </select>
                    </div>
                    <div class="">
                        <button class="bg-Sidebar p-2 rounded-md text-white mt-7 xl:mt-0 inline-block w-full">Cari
                            Data</button>
                    </div>
                    <div class="">
                        <a href="{{ route('penjualan') }}"
                            class="bg-red-800 text-center p-2 rounded-md text-white md:mt-7 xl:mt-0 inline-block w-full">Reset
                            Filter</a>
                    </div>
                </form>
            </div>

            <div class="p-4 flex flex-wrap gap-4  bg-white border-[1px] border-main3 rounded-md mt-4">
                <a href="{{ route('penjualan.create') }}" class="bg-Sidebar py-2 px-4 rounded-md text-white flex gap-2 items-center font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="fill-white w-7 h-7">
                        <path
                            d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM11 11H7V13H11V17H13V13H17V11H13V7H11V11Z">
                        </path>
                    </svg>
                    Tambah Data</a>
            </div>

            <div class="mt-4 bg-white rounded-lg overflow-hidden border-[1px] border-main3">
                <div class="p-4">
                    <h1 class="text-Sidebar font-semibold text-lg">Tabel Suara</h1>
                </div>
                @include('admin.penjualan._table')
                <div class="p-4">
                    @if($data->count() == 0)
                    <div class="flex flex-col items-center mx-auto">
                        <img src="{{ asset('icon/no_data2.svg') }}" alt="" class="w-36 h-36 object-contain">
                        <h1 class="text-Sidebar font-semibold mt-2">Tidak Ada Data Yang Ditemukan</h1>
                    </div>
                    @endif
                    {{ $data->appends($appendsPaginate)->links('vendor.pagination.tailwind') }}
                </div>
            </div>
        </div>

    </section>
@endsection

