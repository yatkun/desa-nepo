@extends('desa/panel')

@section('hero')
    <div class="container flex flex-col items-center h-40 mx-auto">

    </div>
@endsection

@section('konten')
    <div class="col-span-12 mb-5 lg:mb-0 lg:col-span-9">
        @if ($penduduk->isEmpty())
            <div class="mb-3 border-b-[1px] bg-slate-100 flex items-center rounded">
                <p class="p-3 text-lg text-heading ">Data Penduduk Belum Tersedia</p>
            </div>
        @else
            <h2 class="mb-8 text-3xl font-bold text-left text-heading">Data Penduduk</h2>
            <div class="col-span-6 py-2 mt-2 sm:py-4 sm:mt-0">
                <label for="kelamin" class="text-xl font-extrabold tracking-tight text-secondary">Jenis Kelamin</label>
                <div class="relative mt-2 overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 ">
                        <thead
                            class="text-xs text-gray-700 uppercase bg-gray-50 ">
                            <tr>
                                <th scope="col" class="w-1/4 px-6 py-3">
                                    Jenis Kelamin
                                </th>
                                <th scope="col" class="w-1/4 px-6 py-3">
                                    Jumlah
                                </th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $laki = $penduduk->where('kelamin', 'Laki-laki')->count();
                            $perempuan = $penduduk->where('kelamin', 'Perempuan')->count();
                            $no = $penduduk->where('kelamin', '')->count();
                            @endphp
                            <tr class="bg-white border-b ">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    Laki-laki
                                </th>
                                <td class="px-6 py-4">
                                    {{ $laki }}
                                </td>
                            </tr>
                            <tr class="bg-white border-b ">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    Perempuan
                                </th>
                                <td class="px-6 py-4">
                                    {{ $perempuan }}
                                </td>
                            </tr>
                            <tr class="bg-white border-b ">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    Tidak terdata
                                </th>
                                <td class="px-6 py-4">
                                    {{ $no }}
                                </td>
                            </tr>
               
                        </tbody>
                    </table>
                </div>

            </div>


            <div class="col-span-6 py-2 mt-2 sm:py-4 sm:mt-0">
                <label for="kelamin" class="text-xl font-extrabold tracking-tight text-secondary">Pendidikan</label>
                <div class="relative mt-2 overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 ">
                        <thead
                            class="text-xs text-gray-700 uppercase bg-gray-50 ">
                            <tr>
                                <th scope="col" class="w-1/4 px-6 py-3">
                                   Pendidikan
                                </th>
                                <th scope="col" class="w-1/4 px-6 py-3">
                                    Jumlah
                                </th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $laki = $penduduk->where('kelamin', 'Laki-laki')->count();
                            $perempuan = $penduduk->where('kelamin', 'Perempuan')->count();
                            $no = $penduduk->where('kelamin', '')->count();
                            @endphp

                            @foreach ($pendidikan as $pend)
                          
                            <tr class="bg-white border-b ">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    {{ $pend->pendidikan }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $penduduk->where('pendidikan',  $pend->pendidikan)->count() }}
                                </td>
                            </tr>
                            @endforeach
                            <tr class="bg-white border-b ">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    Tidak terdata
                                </th>
                                <td class="px-6 py-4">
                                    {{ $penduduk->where('pendidikan',  '')->count() }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>


            <div class="col-span-6 py-2 mt-2 sm:py-4 sm:mt-0">
                <label for="kelamin" class="text-xl font-extrabold tracking-tight text-secondary">Pekerjaan</label>
                <div class="relative mt-2 overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 ">
                        <thead
                            class="text-xs text-gray-700 uppercase bg-gray-50 ">
                            <tr>
                                <th scope="col" class="w-1/4 px-6 py-3">
                                   Pekerjaan
                                </th>
                                <th scope="col" class="w-1/4 px-6 py-3">
                                    Jumlah
                                </th>
                               
                            </tr>
                        </thead>
                        <tbody>
                           

                            @foreach ($pekerjaan as $pekerjaan)
                          
                            <tr class="bg-white border-b ">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $pekerjaan->pekerjaan }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $penduduk->where('pekerjaan',  $pekerjaan->pekerjaan)->count() }}
                                </td>
                            </tr>
                            
                                 
                            @endforeach
                            <tr class="bg-white border-b ">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    Tidak terdata
                                </th>
                                <td class="px-6 py-4">
                                    {{ $penduduk->where('pekerjaan',  '')->count() }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>


            <div class="col-span-6 py-2 mt-2 sm:py-4 sm:mt-0">
                <label for="kelamin" class="text-xl font-extrabold tracking-tight text-secondary">Agama</label>
                <div class="relative mt-2 overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 ">
                        <thead
                            class="text-xs text-gray-700 uppercase bg-gray-50 ">
                            <tr>
                                <th scope="col" class="w-1/4 px-6 py-3">
                                   Agama
                                </th>
                                <th scope="col" class="w-1/4 px-6 py-3">
                                    Jumlah
                                </th>
                               
                            </tr>
                        </thead>
                        <tbody>
                                                         
                            @foreach ($agama as $agama)
                          
                            <tr class="bg-white border-b ">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $agama->agama }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $penduduk->where('agama',  $agama->agama)->count() }}
                                </td>
                            </tr>
                            
                                 
                            @endforeach
                            
                 
                            <tr class="bg-white border-b ">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    Tidak terdata
                                </th>
                                <td class="px-6 py-4">
                                    {{ $penduduk->where('agama',  '')->count() }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>


            <div class="col-span-6 py-2 mt-2 sm:py-4 sm:mt-0">
                <label for="kelamin" class="text-xl font-extrabold tracking-tight text-secondary">Pernikahan</label>
                <div class="relative mt-2 overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 ">
                        <thead
                            class="text-xs text-gray-700 uppercase bg-gray-50 ">
                            <tr>
                                <th scope="col" class="w-1/4 px-6 py-3">
                                   Pernikahan
                                </th>
                                <th scope="col" class="w-1/4 px-6 py-3">
                                    Jumlah
                                </th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perkawinan as $perkawinan)
                          
                            <tr class="bg-white border-b ">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $perkawinan->perkawinan }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $penduduk->where('perkawinan',  $perkawinan->perkawinan)->count() }}
                                </td>
                            </tr>
                            
                                 
                            @endforeach
                           
                            <tr class="bg-white border-b ">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    Tidak terdata
                                </th>
                                <td class="px-6 py-4">
                                    {{ $penduduk->where('perkawinan',  '')->count() }}
                                </td>
                            </tr>
                          
                        </tbody>
                    </table>
                </div>

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

@section('js')
<script>
    var pekerjaan = @json($pekerjaan);
    var pendidikan = @json($pendidikan);
    var agama = @json($agama);
    var perkawinan = @json($perkawinan);
</script>
@endsection

