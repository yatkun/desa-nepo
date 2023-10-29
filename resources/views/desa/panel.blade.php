<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @yield('js')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600&display=swap"
        rel="stylesheet">

    <!-- CDN -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.x.x/dist/alpine.js" defer></script>
    <style>
        .swiper {
            width: 100%;

        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            width: 100%;
        }


        .swiper-button-next::after,
        .swiper-button-prev::after {
            content: "" !important;
        }
    </style>
    @yield('css')
</head>

<body class="flex flex-col min-h-screen bg-white font-nunito">


    <div class="flex-1 konten">
        <nav class="border-gray-200 bg-primary ">
            <div class="container flex flex-wrap items-center justify-between p-4 mx-auto">
                <a href="/" class="logo">
                    @if ($identitas && $identitas->logo)
                        <img src="{{ asset('storage/' . $identitas->logo) }}" class="w-10">
                    @else
                        <img src="{{ asset('storage/image/logo_default.png') }}" class="w-10">
                    @endif
    
                </a>
                <button data-collapse-toggle="navbar-multi-level" type="button"
                    class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg lg:hidden "
                    aria-controls="navbar-multi-level" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
                <div class="hidden w-full lg:block lg:w-auto" id="navbar-multi-level">
                    <ul
                        class="flex flex-col p-4 mt-4 font-medium text-white bg-white border rounded-lg lg:bg-transparent lg:p-0 lg:flex-row lg:space-x-4 lg:mt-0 lg:border-0">
                        <li>
                            <a href="{{ route('desa') }}"
                                class="block px-4 py-2 text-gray-800 rounded lg:text-white lg:hover:bg-indigo-700 hover:bg-gray-200 {{ request()->is('/') ? 'bg-indigo-700 text-white' : '' }}"
                                aria-current="page">Beranda</a>
                        </li>
                        <li>
                            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                                class="flex items-center justify-between w-full px-4 py-2 text-gray-800 border-b border-gray-100 rounded lg:text-white lg:hover:bg-indigo-700 hover:bg-gray-200 md:border-0 md:w-auto {{ request()->is('sejarah', 'visi-misi') ? 'bg-indigo-700 text-white' : '' }}">Profil
                                <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg></button>
                            <!-- Dropdown menu -->
                            <div id="dropdownNavbar"
                                class="z-50 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
                                <ul class="py-2 text-base text-gray-700 " aria-labelledby="dropdownLargeButton">
                                    <li>
                                        <a href="{{ route('visi') }}" class="block px-4 py-2 hover:bg-gray-100 ">Visi Misi
                                            Desa</a>
                                    </li>
    
                                    <li>
                                        <a href="{{ route('desa.sejarah') }}"
                                            class="block px-4 py-2 hover:bg-gray-100 ">Sejarah Desa</a>
                                    </li>
                                </ul>
    
                            </div>
                        </li>
                        <li>
                            <a href="{{ route('desa.layanan') }}"
                                class="{{ request()->is('layanan*') ? 'bg-indigo-700 text-white' : '' }} block px-4 py-2 text-gray-800 rounded lg:text-white lg:hover:bg-indigo-700 hover:bg-gray-200 md:border-0 ">Layanan</a>
                        </li>
                        <li>
                            <a href="{{ route('desa.penduduk') }}"
                                class="{{ request()->is('data-penduduk*') ? 'bg-indigo-700 text-white' : '' }} block px-4 py-2 text-gray-800 rounded lg:text-white lg:hover:bg-indigo-700 hover:bg-gray-200 md:border-0 ">Data
                                Penduduk</a>
                        </li>
    
                        <li>
                            <a href="{{ route('desa.dokumentasi') }}"
                                class="{{ request()->is('dokumentasi*') ? 'bg-indigo-700 text-white' : '' }} block px-4 py-2 text-gray-800 rounded lg:text-white lg:hover:bg-indigo-700 hover:bg-gray-200 md:border-0 ">Dokumentasi</a>
                        </li>
                        <li>
                            <a href="{{ route('login') }}"
                                class="block px-4 py-2 text-gray-800 rounded lg:hover:bg-indigo-700 lg:border lg:text-white hover:bg-gray-200 ">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    
        <section class="hero bg-primary">
            @yield('hero')
        </section>
        <section
            class="relative top-[-12rem] mb-[-12rem] md:top-[-14rem] md:mb-[-14rem] lg:-top-36 lg:-mb-40 z-10 pb-6 md:pb-8 xl:pb-12">
            <section class="my-10 main-content ">
                <div class="container px-0 mx-auto">
                    <div
                        class="grid grid-cols-12 gap-0 md:gap-8  border-b-0 md:border-b-[1px] bg-white p-6 lg:p-10 rounded-none sm:rounded">
                        @yield('konten')
    
                        @yield('sidepost')
                    </div>
    
                </div>
            </section>
        </section>
    </div>
    <footer class="bg-primary">
        <div class="container flex justify-between px-5 mx-auto md:px-0">
            <div class="py-5 text-sm text-white ">Tim IT Kelurahan Totoli</div>
        </div>
    </footer>


    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",

            },

        });
    </script>

    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    @yield('js')

</body>



</html>
