<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen -translate-x-full bg-Sidebar md:translate-x-0 transition-all duration-500"
    aria-label="Sidebar">
    {{-- logo area --}}
    <div class="h-20 mb-2 border-b-[1px] border-main2 px-3 relative">
        <div class="flex gap-x-4 absolute top-[50%] -translate-y-[50%] p-2">
            <img src="{{ asset('DefaultImage/o.png') }}" alt="" class="object-contain w-12 h-12 my-auto">
            <h1 class="font-semibold text-white text-[21px] my-auto">Qomarruddin</h1>
        </div>
    </div>
    <div class="h-full px-3 pb-[290px] overflow-y-auto bg-Sidebar relative w-64 scrollbar">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('penjualan') }}"
                    class="flex items-center p-2 text-gray-400 rounded-lg group {{ request()->routeIs('penjualan') || request()->routeIs('penjualan.*') ? 'bg-SidebarActive' : '' }}
                    ">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                        class="flex-shrink-0 w-5 h-5 fill-gray-400 transition duration-75"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M224 256A128 128 0 1 1 224 0a128 128 0 1 1 0 256zM209.1 359.2l-18.6-31c-6.4-10.7 1.3-24.2 13.7-24.2H224h19.7c12.4 0 20.1 13.6 13.7 24.2l-18.6 31 33.4 123.9 36-146.9c2-8.1 9.8-13.4 17.9-11.3c70.1 17.6 121.9 81 121.9 156.4c0 17-13.8 30.7-30.7 30.7H285.5c-2.1 0-4-.4-5.8-1.1l.3 1.1H168l.3-1.1c-1.8 .7-3.8 1.1-5.8 1.1H30.7C13.8 512 0 498.2 0 481.3c0-75.5 51.9-138.9 121.9-156.4c8.1-2 15.9 3.3 17.9 11.3l36 146.9 33.4-123.9z" />
                    </svg>
                    <span class="ml-3 font-semibold">Data</span>
                </a>
            </li>
        </ul>

        {{-- menu bawa --}}
        <div class="fixed w-64 bottom-0 bg-Sidebar left-0 pt-2 px-3 pb-4 ">
            <a href="{{ route('logout') }}" class="flex items-center p-2 text-gray-400 rounded-lg group">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                    class="w-5 h-5 fill-gray-400 transition duration-75"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                    <path
                        d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z" />
                </svg>

                <span class="ml-3 font-semibold">Logout</span>

            </a>
            <div class="max-h-[50px] h-full w-full border-t-[1px] border-main2 flex gap-x-3 pt-2">
                <div class="w-10 h-10 rounded-full overflow-hidden">
                    <img src="{{ asset('DefaultImage/user_image.jpg') }}" alt=""
                        class="object-center object-cover w-14 h-14  rounded-full my-auto">
                </div>
                <div class="my-auto">
                    <h1 class="text-lg text-white">Qomarruddin</h1>
                    <h1 class="text-sm text-gray-300">Admin</h1>
                </div>
            </div>
        </div>
    </div>
</aside>



@push('scripts')
    <script>
        var dropdownSidebar = document.querySelectorAll('.dropdownSidebar');
        var arrowSidebar = document.querySelectorAll('.arrowSidebar');

        dropdownSidebar.forEach(function(element, index) {
            element.addEventListener('click', function() {
                arrowSidebar[index].classList.toggle('rotate-180');
            });
        });
    </script>
@endpush
