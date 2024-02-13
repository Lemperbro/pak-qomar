@extends('admin.layouts.main')

@section('container')
    <section>
        @include('admin.penjualan._header')

        {{-- isi --}}
        <div class="pt-24">
            <form action="{{ route('penjualan.create.simpan') }}" method="POST" class="max-w-[800px] mx-auto">
                @csrf
                <div>
                    <label for="desa">Desa</label>
                    <select name="desa" id="desa"
                        class="w-full rounded-md border-[1px] border-main3 focus:ring-0 focus:outline-none focus:border-main2 mt-1 @error('desa')
                        peer
                    @enderror">
                        <option value="" selected>Pilih Desa</option>
                        @for ($i = 0; $i < count($desa) ; $i++)
                        <option value="{{ $desa[$i] }}" class="uppercase" {{ $desa[$i] == old('desa') ? 'selected' : '' }}>
                            {{ $desa[$i] }}
                        </option>
                    @endfor
                    </select>

                    @error('desa')
                    <p class="peer-invalid:visible text-red-700 font-light">
                        {{ $message }}
                    </p>
                @enderror
                </div>
                <div>
                    <label for="kecamatan">Kecamatan</label>
                    <select name="kecamatan" id="kecamatan"
                        class="w-full rounded-md border-[1px] border-main3 focus:ring-0 focus:outline-none focus:border-main2 mt-1 @error('kecamatan')
                        peer
                    @enderror">
                        <option value="" selected>Pilih kecamatan</option>
                        @for ($i = 0; $i < count($kecamatan) ; $i++)
                        <option value="{{ $kecamatan[$i] }}" class="uppercase" {{ $kecamatan[$i] == old('kecamatan') ? 'selected' : '' }}>
                            {{ $kecamatan[$i] }}
                        </option>
                    @endfor
                    </select>

                    @error('kecamatan')
                    <p class="peer-invalid:visible text-red-700 font-light">
                        {{ $message }}
                    </p>
                @enderror
                </div>
                <div class="mt-3">
                    <label for="tps">Tps</label>
                    <input type="number" name="tps" id="tps"
                        class="border-[1px] border-main3 rounded-md w-full focus:ring-0 focus:outline-none focus:border-main2 mt-1 @error('tps')
                            peer
                        @enderror"
                        value="{{ old('tps') }}" placeholder="Contoh: 1">
                    @error('tps')
                        <p class="peer-invalid:visible text-red-700 font-light">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="saksi">Saksi</label>
                    <input type="text" name="saksi" id="saksi"
                        class="border-[1px] border-main3 rounded-md w-full focus:ring-0 focus:outline-none focus:border-main2 mt-1 @error('saksi')
                            peer
                        @enderror"
                        value="{{ old('saksi') }}" >
                    @error('saksi')
                        <p class="peer-invalid:visible text-red-700 font-light">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mt-3">
                    <label for="total_suara">Total Suara</label>
                    <input type="number" name="total_suara" id="total_suara"
                        class="border-[1px] border-main3 rounded-md w-full focus:ring-0 focus:outline-none focus:border-main2 mt-1 @error('total_suara')
                            peer
                        @enderror"
                        value="{{ old('total_suara') }}" placeholder="Contoh: 10000">
                    @error('total_suara')
                        <p class="peer-invalid:visible text-red-700 font-light">
                            {{ $message }}
                        </p>
                    @enderror
                </div>


                <div class="flex gap-2 mt-5">
                    <a href="{{ route('penjualan') }}"
                        class="inline-block py-2 px-3 rounded-md bg-red-800 text-white font-medium">Batal</a>
                    <button type="submit"
                        class="inline-block py-2 px-3 rounded-md bg-Sidebar text-white font-medium">Simpan</button>
                </div>
            </form>
        </div>

    </section>
@endsection