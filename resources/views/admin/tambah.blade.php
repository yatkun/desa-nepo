@extends('template/panel')

@section('css')

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.x.x/dist/alpine.min.js" defer></script>
   
@endsection

@section('konten')
    <h3 class="mb-3 font-semibold text-heading">Tambah Admin</h3>
    <div class="card">
        @if (session()->has('success'))
            <div x-data="{ open: true }" x-show="open" class="relative p-4 mb-5 bg-blue-200">
                <span class="text-blue-800">
                    {{ session('success') }}
                </span>
                <button @click="open = false" class="absolute top-0 right-0 m-4 text-blue-800">&times;</button>
            </div>
        @endif

        @if ($errors->any())
            <div x-data="{ open: true }" x-show="open" class="relative p-4 mb-5 text-red-800 bg-red-200">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="ml-4 list-disc">{{ $error }}</li>
                    @endforeach
                </ul>
                <button @click="open = false" class="absolute top-0 right-0 m-4 text-red-800">&times;</button>
            </div>
        @endif
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
        <div class="mb-5">
            <div>
                <h4 class="mb-2 text-heading">Nama</h4>
                <input autofocus class="w-full p-2 mb-4 bg-white border border-gray-300 outline-none title" spellcheck="false"
                    placeholder="Masukkan nama" type="text" name="name" value="{{ old('name') }}">
            </div>
            <div>
                <h4 class="mb-2 text-heading">Username</h4>
                <input autofocus class="w-full p-2 mb-4 bg-white border border-gray-300 outline-none title" spellcheck="false"
                    placeholder="Masukkan username" type="text" name="username" value="{{ old('username') }}">
            </div>
            <div>
                <h4 class="mb-2 text-heading">Password</h4>
                <input autofocus class="w-full p-2 mb-4 bg-white border border-gray-300 outline-none title" spellcheck="false"
                    placeholder="Masukkan password" type="text" name="password">
            </div>
        </div>
        <button type="submit" class="px-3 py-2 text-sm text-white rounded bg-primary hover:bg-indigo-800">Simpan</button>
        </form>
    </div>
@endsection

@section('script')
   
@endsection
