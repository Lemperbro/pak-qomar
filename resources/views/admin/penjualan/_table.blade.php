<div class="relative overflow-x-auto ">
    <table class="w-full overflow-auto text-sm text-left rtl:text-right text-gray-500 table-auto">
        <thead class="text-xs text-gray-700 uppercase bg-gray-200">
            <tr>
                <th scope="col" class="px-6 py-3 whitespace-nowrap w-5 text-center">
                    No
                </th>
                <th scope="col" class="px-6 py-3 whitespace-nowrap">
                    Kecamatan
                </th>
                <th scope="col" class="px-6 py-3 whitespace-nowrap">
                    Desa
                </th>
                <th scope="col" class="px-6 py-3 whitespace-nowrap">
                    Tps
                </th>
                <th scope="col" class="px-6 py-3 whitespace-nowrap">
                    Saksi
                </th>
                <th scope="col" class="px-6 py-3 whitespace-nowrap">
                    Total Suara
                </th>
                <th scope="col" class="px-6 py-3 whitespace-nowrap text-center">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $item)
                <tr class="bg-white border-b  hover:bg-gray-50 ">
                    <th class="px-6 py-4 w-5 text-center">
                        {{ $data->firstItem() + $index }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $item->kecamatan}}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $item->desa }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $item->tps }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->saksi }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->jumlah_pemilih }}
                    </td>
                    <td class="px-6 py-4 flex gap-2 justify-center">
                        <a href="{{ route('penjualan.edit', ['id' => $item->id]) }}" class="p-1 rounded-md bg-black inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-5 h-5 fill-white">
                                <path
                                    d="M12.8995 6.85453L17.1421 11.0972L7.24264 20.9967H3V16.754L12.8995 6.85453ZM14.3137 5.44032L16.435 3.319C16.8256 2.92848 17.4587 2.92848 17.8492 3.319L20.6777 6.14743C21.0682 6.53795 21.0682 7.17112 20.6777 7.56164L18.5563 9.68296L14.3137 5.44032Z">
                                </path>
                            </svg>
                        </a>
                        <button type="button" onclick="delete_data{{ $index }}.showModal()" class="p-1 rounded-md bg-red-700">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-5 h-5 fill-white">
                                <path
                                    d="M4 8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8ZM6 10V20H18V10H6ZM9 12H11V18H9V12ZM13 12H15V18H13V12ZM7 5V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V5H22V7H2V5H7ZM9 4V5H15V4H9Z">
                                </path>
                            </svg>
                        </button>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>


@include('admin.penjualan._modalDelete')




