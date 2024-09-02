<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.x.x/dist/alpine.min.js" defer></script>
    @vite('resources/css/app.css')
    @yield('css')

    <title>{{ $title }} | Kelurahan Lembang</title>
</head>

<body class="text-gray-800 font-nunito ">
    <!-- start: Sidebar -->
    <div x-data="{ sidebarOpen: window.innerWidth >= 768 }">
        <div
        x-show="sidebarOpen" :class="{'block': !sidebarOpen}" class="md:block fixed top-0 left-0 z-50 w-64 h-full p-4 transition-transform bg-[#2a3042] sidebar-menu">
            <a href="#" class="flex justify-center text-xl items-center text-white pb-5 border-b border-b-[#454c5f]">
                ADMIN PANEL
                {{-- <img src="https://placehold.co/32x32" alt="" class="object-cover w-8 h-8 rounded">
                <div class="ml-3 text-lg font-bold text-white">Logo</div> --}}
            </a>
            <ul class="mt-4">
                <li class="mb-1 group {{ request()->is('dashboard*') ? 'active selected' : '' }}">
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center py-2 px-4 text-gray-300 hover:bg-[#5B6AA1] hover:text-gray-100 rounded-md group-[.active]:bg-[#454c5f] group-[.active]:text-white  group-[.selected]:text-gray-100">
                        <i class="mr-3 text-lg ri-home-2-line"></i>
                        <span class="text-sm">Dashboard</span>
                    </a>
                </li>
                <li class="mb-1 group {{ request()->is('identitas*') ? 'active selected' : '' }}">
                    <a href="{{ route('identitas') }}"
                        class="flex items-center py-2 px-4 text-gray-300 hover:bg-[#5B6AA1] hover:text-gray-100 rounded-md group-[.active]:bg-[#454c5f] group-[.active]:text-white  group-[.selected]:text-gray-100">
                        <i class="mr-3 text-lg ri-ancient-pavilion-line"></i>
                        <span class="text-sm">Identitas Desa</span>
                    </a>
                </li>
                <li class="mb-1 group {{ request()->is('aparatur*') ? 'active selected' : '' }}">
                    <a href="{{ route('aparatur') }}"
                        class="flex items-center py-2 px-4 text-gray-300 hover:bg-[#5B6AA1] hover:text-gray-100 rounded-md group-[.active]:bg-[#454c5f] group-[.active]:text-white  group-[.selected]:text-gray-100">
                        <i class="mr-3 text-lg ri-account-box-line"></i>
                        <span class="text-sm">Aparatur Desa</span>
                    </a>
                </li>
                
                <li class="mb-1 group {{ request()->is('profil*') ? 'active selected' : '' }}">
                    <a href="#"
                        class="flex items-center py-2 px-4 text-gray-300 hover:bg-[#5B6AA1] hover:text-gray-100 rounded-md group-[.active]:bg-[#454c5f] group-[.active]:text-white group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                        <i class="mr-3 text-lg ri-profile-line"></i>
                        <span class="text-sm">Profil Desa</span>
                        <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
                    </a>
                    <ul class="mt-1 hidden group-[.selected]:block">
                        <li class="mb-1">
                            <a href="{{ route('visimisi') }}"
                                class="pl-12 {{ request()->is('profil/visi-misi*') ? 'active text-white group-[.selected]:bg-[#454c5f]' : '' }} text-sm flex items-center py-3 px-4 text-gray-300 hover:bg-[#5B6AA1] hover:text-gray-100 rounded-md  group-[.active]:text-white  group-[.selected]:text-gray-100">Visi
                                Misi</a>
                        </li>
                        <li class="mb-1">
                            <a href="{{ route('sejarah') }}"
                                class="pl-12 {{ request()->is('profil/sejarah*') ? 'active text-white group-[.selected]:bg-[#454c5f]' : '' }} text-sm flex items-center py-3 px-4 text-gray-300 hover:bg-[#5B6AA1] hover:text-gray-100 rounded-md  group-[.active]:text-white  group-[.selected]:text-gray-100">Sejarah</a>
                        </li>
                    </ul>
                </li>
                <li class="mb-1 group {{ request()->is('berita*') ? 'active selected' : '' }}">
                    <a href="#"
                        class="flex items-center py-2 px-4 text-gray-300 hover:bg-[#5B6AA1] hover:text-gray-100 rounded-md group-[.active]:bg-[#454c5f] group-[.active]:text-white  group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                        <i class="mr-3 text-lg ri-newspaper-line"></i>
                        <span class="text-sm">Berita Desa</span>
                        <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
                    </a>
                    <ul class="mt-1 hidden group-[.selected]:block">
                        <li class="mb-1">
                            <a href="{{ route('berita') }}"
                                class="pl-12 {{ request()->is('berita*') ? 'active text-white group-[.selected]:bg-[#454c5f]' : '' }} text-sm flex items-center py-3 px-4 text-gray-300 hover:bg-[#5B6AA1] hover:text-gray-100 rounded-md  group-[.active]:text-white  group-[.selected]:text-gray-100">Daftar
                                Berita</a>
                        </li>

                    </ul>
                </li>
                <li class="mb-1 group {{ request()->is('layanan*') ? 'active selected' : '' }}">
                    <a href="#"
                        class="flex items-center py-2 px-4 text-gray-300 hover:bg-[#5B6AA1] hover:text-gray-100 rounded-md group-[.active]:bg-[#454c5f] group-[.active]:text-white  group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                        <i class="mr-3 text-lg ri-briefcase-line"></i>
                        <span class="text-sm">Layanan</span>
                        <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
                    </a>
                    <ul class="mt-1 hidden group-[.selected]:block">
                        <li class="mb-1">
                            <a href="{{ route('layanan') }}"
                                class="pl-12 {{ request()->is('layanan*') ? 'active text-white group-[.selected]:bg-[#454c5f]' : '' }} text-sm flex items-center py-3 px-4 text-gray-300 hover:bg-[#5B6AA1] hover:text-gray-100 rounded-md  group-[.active]:text-white  group-[.selected]:text-gray-100">Daftar
                                Layanan</a>
                        </li>

                    </ul>
                </li>
                <li class="mb-1 group {{ request()->is('pengumuman*') ? 'active selected' : '' }}">
                    <a href="#"
                        class="flex items-center py-2 px-4 text-gray-300 hover:bg-[#5B6AA1] hover:text-gray-100 rounded-md group-[.active]:bg-[#454c5f] group-[.active]:text-white  group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                        <i class="mr-3 text-lg ri-megaphone-line"></i>
                        <span class="text-sm">Pengumuman</span>
                        <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
                    </a>
                    <ul class="mt-1 hidden group-[.selected]:block">
                        <li class="mb-1">
                            <a href="{{ route('pengumuman') }}"
                                class="pl-12 {{ request()->is('pengumuman*') ? 'active text-white group-[.selected]:bg-[#454c5f]' : '' }} text-sm flex items-center py-3 px-4 text-gray-300 hover:bg-[#5B6AA1] hover:text-gray-100 rounded-md  group-[.active]:text-white  group-[.selected]:text-gray-100">Daftar
                                Pengumuman</a>
                        </li>

                    </ul>
                </li>

                <li class="mb-1 group {{ request()->is('dokumentasi*') ? 'active selected' : '' }}">
                    <a href="#"
                        class="flex items-center py-2 px-4 text-gray-300 hover:bg-[#5B6AA1] hover:text-gray-100 rounded-md group-[.active]:bg-[#454c5f] group-[.active]:text-white  group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                        <i class="mr-3 text-lg ri-image-2-line"></i>
                        <span class="text-sm">Dokumentasi</span>
                        <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
                    </a>
                    <ul class="mt-1 hidden group-[.selected]:block">
                        <li class="mb-1">
                            <a href="{{ route('dokumentasi') }}"
                                class="pl-12 {{ request()->is('dokumentasi*') ? 'active text-white group-[.selected]:bg-[#454c5f]' : '' }} text-sm flex items-center py-3 px-4 text-gray-300 hover:bg-[#5B6AA1] hover:text-gray-100 rounded-md  group-[.active]:text-white  group-[.selected]:text-gray-100">Daftar
                                Dokumentasi</a>
                        </li>

                    </ul>
                </li>

                <li class="mb-1 group {{ request()->is('penduduk*') ? 'active selected' : '' }}">
                    <a href="#"
                        class="flex items-center py-2 px-4 text-gray-300 hover:bg-[#5B6AA1] hover:text-gray-100 rounded-md group-[.active]:bg-[#454c5f] group-[.active]:text-white  group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                        <i class="mr-3 text-lg ri-image-2-line"></i>
                        <span class="text-sm">Penduduk</span>
                        <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
                    </a>
                    <ul class="mt-1 hidden group-[.selected]:block">
                        <li class="mb-1">
                            <a href="{{ route('penduduk') }}"
                                class="pl-12 {{ request()->is('penduduk*') ? 'active text-white group-[.selected]:bg-[#454c5f]' : '' }} text-sm flex items-center py-3 px-4 text-gray-300 hover:bg-[#5B6AA1] hover:text-gray-100 rounded-md  group-[.active]:text-white  group-[.selected]:text-gray-100">Daftar
                                Penduduk</a>
                        </li>

                    </ul>
                </li>


                
                <li class="mb-1 group {{ request()->is('admin*') ? 'active selected' : '' }}">
                    <a href="#"
                        class="flex items-center py-2 px-4 text-gray-300 hover:bg-[#5B6AA1] hover:text-gray-100 rounded-md group-[.active]:bg-[#454c5f] group-[.active]:text-white  group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                        <i class="mr-3 text-lg ri-admin-line"></i>
                        <span class="text-sm">Admin</span>
                        <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
                    </a>
                    <ul class="mt-1 hidden group-[.selected]:block">
                        <li class="mb-1">
                            <a href="{{ route('user') }}"
                                class="pl-12 {{ request()->is('admin*') ? 'active text-white group-[.selected]:bg-[#454c5f]' : '' }} text-sm flex items-center py-3 px-4 text-gray-300 hover:bg-[#5B6AA1] hover:text-gray-100 rounded-md  group-[.active]:text-white  group-[.selected]:text-gray-100">Daftar
                                Admin</a>
                        </li>

                    </ul>
                </li>

            </ul>
        </div>


        <div @click="sidebarOpen = !sidebarOpen" :class="{'hidden': !sidebarOpen}" class="fixed top-0 left-0 z-40 block w-full h-full md:hidden bg-black/50 sidebar-overlay"></div>
        <!-- end: Sidebar -->

        <!-- start: Main -->
        <main :class="{'active': !sidebarOpen}" class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-[#f8f8fb] min-h-screen transition-all main">
            <div class="sticky top-0 left-0 z-30 flex items-center px-6 py-5 bg-white shadow-md shadow-black/5">
                <button @click="sidebarOpen = !sidebarOpen" type="button" class="text-lg text-gray-600 sidebar-toggle">
                    <i class="ri-menu-line"></i>
                </button>
                
                <ul class="flex items-center ml-auto">

                    <li class="ml-3 dropdown">
                        <div class="flex items-center gap-5">
                            <a target="_blank" href="/" class="px-3 py-2 text-xs text-white rounded bg-primary">Lihat Website</a>
                        <button type="button" class="flex items-center dropdown-toggle">
                            <img src="https://placehold.co/32x32" alt=""
                                class="block object-cover w-8 h-8 align-middle rounded">
                        </button>
                        </div>
                        <ul
                            class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                            <li>
                                <a href="#"
                                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                            </li>
                            <li>
                                <a href="{{ route('actionlogout') }}"
                                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="p-6">
                @yield('konten')
            </div>
        </main>
    </div>
    <!-- end: Main -->

    <script src="https://unpkg.com/@popperjs/core@2"></script>
    @vite('resources/js/script.js')
    @yield('script')
</body>

</html>
