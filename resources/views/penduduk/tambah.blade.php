@extends('template/panel')

@section('css')
@endsection

@section('konten')
    <h3 class="mb-3 font-semibold text-heading">Tambah Penduduk</h3>
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


            <form method="post" action="{{ route('penduduk.store') }}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="mb-5">
                    <div>
                        <h4 class="mb-2 text-heading">Nama</h4>
                        <input autofocus class="w-full p-2 mb-4 bg-white border border-gray-300 outline-none title"
                            spellcheck="false" placeholder="Masukkan nama penduduk" id="nama" name="nama"
                            type="text" value="{{ old('nama') }}">
                    </div>
                    <div>
                        <h4 class="mb-2 text-heading">NIK</h4>
                        <input  class="w-full p-2 mb-4 bg-white border border-gray-300 outline-none title"
                            spellcheck="false" placeholder="Masukkan NIK penduduk" id="nik" name="nik"
                            type="text" value="{{ old('nik') }}">
                    </div>
                    <div class="flex flex-col md:gap-8 md:flex-row">
                        <div class="w-full">
                            <h4 class="mb-2 text-heading">No.HP</h4>
                            <input class="w-full p-2 mb-4 bg-white border border-gray-300 outline-none title"
                                spellcheck="false" placeholder="Masukkan No.HP" id="nohp" name="nohp"
                                type="text" value="{{ old('nohp') }}">
                        </div>
                        <div class="w-full">
                            <h4 class="mb-2 text-heading">Jenis Kelamin</h4>
                            <select class="w-full p-2 mb-4 border border-gray-300" id="kelamin" name="kelamin">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex flex-col md:gap-8 md:flex-row">
                        <div class="w-full">
                            <h4 class="mb-2 text-heading">Pendidikan</h4>
                            <select class="w-full p-2 mb-4 border border-gray-300" id="pendidikan" name="pendidikan">
                                <option value="">Pilih Pendidikan</option>
                                <option value="Belum/Tidak Sekolah">Belum/Tidak Sekolah</option>
                                <option value="SD/Sederajat">SD/Sederajat</option>
                                <option value="SMP/Sederajat">SMP/Sederajat</option>
                                <option value="SMA/Sederajat">SMA/Sederajat</option>
                                <option value="Strata 1">Strata 1</option>
                                <option value="Strata 2">Strata 2</option>
                                <option value="Strata 3">Strata 3</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="w-full">
                            <h4 class="mb-2 text-heading">Pekerjaan</h4>
                            <input  class="w-full p-2 mb-4 bg-white border border-gray-300 outline-none title"
                                spellcheck="false" placeholder="Masukkan pekerjaan" id="pekerjaan" name="pekerjaan"
                                type="text">
                        </div>
                    </div>

                    <div class="flex flex-col md:gap-8 md:flex-row">
                        <div class="w-full">
                            <h4 class="mb-2 text-heading">Agama</h4>
                            <select class="w-full p-2 mb-4 border border-gray-300" id="agama" name="agama">
                                <option value="">Pilih Agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                            </select>
                        </div>
                        <div class="w-full">
                            <h4 class="mb-2 text-heading">Perkawinan</h4>
                            <select class="w-full p-2 border border-gray-300" id="perkawinan" name="perkawinan">
                                <option value="">Pilih Status Perkawinan</option>
                                <option value="Belum Menikah">Belum Menikah</option>
                                <option value="Menikah">Menikah</option>
                                <option value="Duda/Janda">Duda/Janda</option>
                            </select>
                        </div>
                    </div>



                </div>
                <button type="submit" class="button">Simpan</button>
            </form>
    </div>
 
@endsection

@section('script')

@endsection
