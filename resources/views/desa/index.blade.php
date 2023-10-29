@extends('desa/panel')

@section('hero')
    <div
        class="container flex flex-col items-center mx-auto pb-52 pt-28 lg:pt-40 md:pt-36 md:pb-52 lg:pb-52 lg:flex-row justify-evenly ">
        <div class="relative flex flex-col text-center hero-kiri">

            @if ($identitas)
                <h1 class="text-4xl font-extrabold tracking-wide text-white lg:text-5xl">Website Resmi</h1>
                <h1 class="text-4xl font-extrabold tracking-wide text-white lg:text-5xl">{{ $identitas->namadesa}}, {{ $identitas->kabupaten }}</h1>
                <span class="text-sm font-light tracking-wide text-white lg:text-xl">e-mail Desa :
                    {{ $identitas->email }}</span>
            @else
                <h1 class="text-4xl font-extrabold tracking-wide text-white lg:text-5xl">Website Resmi</h1>
                <h1 class="text-4xl font-extrabold tracking-wide text-white lg:text-5xl">Nama Desa, Kabupaten</h1>
                <span class="mt-2 text-sm font-light tracking-wide text-white lg:text-xl">e-mail Desa :
                    belum tersedia</span>
            @endif
            <div class="mt-5 mb-10 lg:mb-0">
                <a href="{{ route('desa.layanan') }}"
                    class="inline-flex gap-2 px-4 py-2 text-white bg-orange-400 rounded-full hover:bg-orange-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Lihat Layanan</span>
                </a>
            </div>

        </div>
    </div>
@endsection
@section('konten')
    <div class="col-span-12 lg:col-span-9">
        <h2 class="mb-8 text-3xl font-bold text-left text-heading">Berita / Artikel</h2>
        @if ($baru)
            <!-- First Post -->
            <div class="relative">
                <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gradient-to-b from-transparent to-gray-400 rounded-b-md">
                </div>
                <div class="absolute bottom-0 flex flex-col p-10">

                    <div class="mb-3">
                        <p class="inline-flex px-5 py-1 text-sm text-yellow-800 bg-yellow-200 rounded-md md:text-md">
                            Berita</p>
                    </div>
                    <a href="/berita/{{ $baru->slug }}"
                        class="text-xl font-bold text-white md:text-4xl">{{ $baru->judul }}</a>
                </div>
                @if ($baru->gambar)
                    <img src="{{ asset('storage/' . $baru->gambar) }}" alt="{{ $baru->judul }}"
                        class="object-cover w-full h-[250px] md:h-[400px] rounded-md">
                @else
                    <img src="{{ asset('storage/image/berita2.jpg') }}" alt="{{ $baru->judul }}"
                        class="object-cover w-full h-[250px] md:h-[400px] rounded-md">
                @endif

            </div>
            <!-- More Posts -->
            <div class="grid grid-cols-12 gap-0 mt-8 lg:gap-8">
                <!-- card post -->
                @if ($berita->isEmpty())
                @else
                    @foreach ($berita as $item)
                        <div class="col-span-12 lg:col-span-4">
                            <div class="flex flex-col">
                                <div class="relative">

                                    @if ($item->gambar)
                                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}"
                                            class="object-cover w-full h-[250px] md:h-[150px] rounded-md">
                                    @else
                                        <img src="{{ asset('storage/image/berita2.jpg') }}" alt="{{ $item->judul }}"
                                            class="object-cover w-full h-[250px] md:h-[150px] rounded-md">
                                    @endif



                                    <div class="absolute bottom-4 left-4">
                                        <p
                                            class="block px-5 py-1 text-sm text-blue-800 bg-blue-200 rounded-md">Berita</p>
                                    </div>
                                </div>
                                <a href="/berita/{{ $item->slug }}"
                                    class="mt-3 text-lg font-bold hover:text-primary text-heading">{{ $item->judul }}</a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="flex justify-center mt-5">{{ $berita->links() }}</div>
        @else
            <div class="mb-3 border-b-[1px] bg-slate-100 flex items-center rounded">
                <p class="p-3 text-lg text-heading ">Berita belum tersedia</p>
            </div>
        @endif
    </div>
@endsection

@section('sidepost')
    <!-- SidePost -->
    <div class="col-span-12 lg:col-span-3">
        <div class="mb-10">
            <h2 class="mb-8 text-3xl font-bold text-left text-heading">Aparatur Desa</h2>
            <div class="swiper mySwiper">
                <div class=" swiper-wrapper">
                    @if ($aparatur->isEmpty())
                        <div class="mb-3 border-b-[1px] bg-slate-100 flex items-center rounded w-full">
                            <p class="p-3 text-lg text-heading ">Aparatur Desa belum tersedia</p>
                        </div>
                    @else
                        @foreach ($aparatur as $item)
                            <div class="swiper-slide">
                                <div class="relative w-full">
                                    <div class="absolute w-full px-6 bottom-4">
                                        <div class="p-4 text-center bg-white rounded">
                                            <h4 class="text-lg font-bold text-heading">
                                                {{ $item->nama }}</h4>
                                            <h5 class="text-xs uppercase text-heading">
                                                {{ $item->jabatan }}</h5>
                                        </div>
                                    </div>

                                    <img src="{{ asset('storage/' . $item->foto) }}" alt=""
                                        class="w-full h-[300px] object-cover rounded-md">

                                </div>
                            </div>
                        @endforeach

                    @endif

                </div>
                <div class="swiper-button-next"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        class="w-6 h-6 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                    </svg>


                </div>
                <div class=" swiper-button-prev"><svg xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        class="w-6 h-6 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="mb-10">
            <h2 class="mb-8 text-3xl font-bold text-left text-heading">Pengumuman</h2>
            @if ($pengumuman->isEmpty())
                <div class="mb-3 border-b-[1px] bg-slate-100 flex items-center rounded">
                    <p class="p-3 text-lg text-heading ">Pengumuman belum tersedia</p>
                </div>
            @else
                @foreach ($pengumuman as $item)
                    <div class="mb-3 border-b-[1px] bg-slate-100 flex items-center rounded">
                        <a href="/pengumuman/{{ $item->slug }}"
                            class="p-3 text-md hover:text-primary text-heading ">{{ $item->judul }}</a>
                    </div>
                @endforeach
            @endif
        </div>


    </div>
@endsection
