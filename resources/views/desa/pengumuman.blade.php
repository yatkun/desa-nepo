@extends('desa/panel')

@section('hero')
    <div
        class="container flex flex-col items-center h-40 mx-auto">
       
    </div>
@endsection

@section('konten')
    <div class="col-span-12 lg:col-span-9">
        <h2 class="mb-8 text-3xl font-bold text-left text-heading">{{ $post->judul }}</h2>
        <div class="flex gap-2 mt-2 mb-5">
            <div class="px-5 py-1 text-sm text-yellow-800 bg-yellow-200 rounded-md md:text-md">Berita</div>
            <div class="px-5 py-1 text-sm text-blue-800 bg-blue-200 rounded-md md:text-md">{{ $post->created_at->toDateString() }}
            </div>
            <div class="px-5 py-1 text-sm rounded-md bg-lime-200 text-lime-800 md:text-md">{{ $post->user->name }}</div>
        </div>

        @if ($post->gambar)
            <img src="{{ asset('storage/' . $post->gambar) }}" alt="{{ $post->judul }}"
                class="object-cover w-full h-[250px] md:h-[400px] rounded-md mb-5">
        @else
            <img src="{{ asset('storage/image/pengumuman.jpg') }}" alt="{{ $post->judul }}"
                class="object-cover w-full h-[250px] md:h-[400px] rounded-md mb-5">
        @endif
       
        {!! $post->isi !!}

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
