@extends('template/panel')

@section('konten')
    <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-4">
        <div class="w-full p-5 bg-white rounded shadow-sm">
            <div class="flex justify-between">
                <div class="flex flex-col">
                    <p class="text-gray-600 ">Berita</p>
                    <p class="text-lg font-bold">{{ $berita }}</p>
                </div>
                <div class="flex items-center justify-center w-12 h-12 text-white rounded-full bg-primary">
                    <i class="text-lg ri-newspaper-line"></i>
                </div>
            </div>
        </div>
        <div class="w-full p-5 bg-white rounded shadow-sm">
            <div class="flex justify-between">
                <div class="flex flex-col">
                    <p class="text-gray-600 ">Layanan</p>
                    <p class="text-lg font-bold">{{ $layanan }}</p>
                </div>
                <div class="flex items-center justify-center w-12 h-12 text-white rounded-full bg-primary">
                    <i class="text-lg ri-briefcase-line"></i>
                </div>
            </div>
        </div>
        <div class="w-full p-5 bg-white rounded shadow-sm">
            <div class="flex justify-between">
                <div class="flex flex-col">
                    <p class="text-gray-600 ">Pengumuman</p>
                    <p class="text-lg font-bold">{{ $pengumuman }}</p>
                </div>
                <div class="flex items-center justify-center w-12 h-12 text-white rounded-full bg-primary">
                    <i class="text-lg ri-megaphone-line"></i>
                </div>
            </div>
        </div>
        <div class="w-full p-5 bg-white rounded shadow-sm">
            <div class="flex justify-between">
                <div class="flex flex-col">
                    <p class="text-gray-600 ">Admin</p>
                    <p class="text-lg font-bold">{{ $admin }}</p>
                </div>
                <div class="flex items-center justify-center w-12 h-12 text-white rounded-full bg-primary">
                    <i class="text-lg ri-admin-line"></i>
                </div>
            </div>
        </div>
    </div>
@endsection