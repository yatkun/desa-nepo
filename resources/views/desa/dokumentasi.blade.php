@extends('desa/panel')

@section('js')
    @vite('resources/js/app.js')
@endsection
@section('hero')
    <div class="container flex flex-col items-center h-40 mx-auto">

    </div>
@endsection

@section('konten')
    <div class="col-span-12 mb-5 lg:mb-0">
        @if ($dokumentasi->isEmpty())
            <div class="mb-3 border-b-[1px] bg-slate-100 flex items-center rounded">
                <p class="p-3 text-lg text-heading ">Dokumentasi Belum Tersedia</p>
            </div>
        @else
            <div data-te-lightbox-init class="grid grid-cols-12 gap-4">
                @foreach ($dokumentasi as $item)
              
                <div class="col-span-6 lg:col-span-3">
                    <img src="{{ asset('storage/' . $item->gambar) }}"
                        data-te-img="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}"
                        class="w-full object-cover object-center h-[200px] rounded cursor-zoom-in data-[te-lightbox-disabled]:cursor-auto" />
                </div>
                @endforeach
                
               
            </div>
        @endif






    </div>
@endsection


