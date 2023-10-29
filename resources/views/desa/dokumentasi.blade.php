@extends('desa/panel')

@section('hero')
    <div class="container flex flex-col items-center h-40 mx-auto">

    </div>
@endsection

@section('konten')
    <div class="col-span-12 mb-5 lg:mb-0 lg:col-span-9">
        @if ($layanan->isEmpty())
            <div class="mb-3 border-b-[1px] bg-slate-100 flex items-center rounded">
                <p class="p-3 text-lg text-heading ">Layanan Desa Belum Tersedia</p>
            </div>
        @else
            <h2 class="mb-8 text-3xl font-bold text-left text-heading">Layanan Desa</h2>
            <div class="grid grid-cols-12 gap-4">
                @foreach ($layanan as $item)
                    <a href="" class="col-span-12 lg:col-span-4 hover:text-primary text-heading">
                        <div
                            class="flex flex-col p-4 transition-colors bg-white border border-gray-200 ease-brand duration-250 rounded-xl hover:border-primary hover:shadow">
                            @if ($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}"
                                    class="w-full rounded-lg">
                            @else
                                <img src="{{ asset('storage/image/layanan.jpg') }}"
                                    class="w-full rounded-lg">
                            @endif
                            
                            <div class="mt-3 text-lg font-bold text-center ">{{ $item->judul }}</div>
                        </div>
                    </a>
                @endforeach


            </div>
        @endif






    </div>
@endsection
