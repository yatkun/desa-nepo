@extends('template/panel')

@section('css')
@endsection

@section('konten')
    <h3 class="mb-3 font-semibold text-heading">Edit Penduduk</h3>
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


            <form method="post" action="{{ route('penduduk.update',$post->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-5">
                    <div>
                        <h4 class="mb-2 text-heading">Nama</h4>
                        <input autofocus class="w-full p-2 mb-4 bg-white border border-gray-300 outline-none title"
                            spellcheck="false" placeholder="Masukkan nama penduduk" id="nama" name="nama"
                            type="text" value="{{ $post->nama }}">
                    </div>
                    <div>
                        <h4 class="mb-2 text-heading">NIK</h4>
                        <input  class="w-full p-2 mb-4 bg-white border border-gray-300 outline-none title"
                            spellcheck="false" placeholder="Masukkan NIK penduduk" id="nik" name="nik"
                            type="text" value="{{ $post->nik }}"">
                    </div>
                    <div class="flex flex-col md:gap-8 md:flex-row">
                        <div class="w-full">
                            <h4 class="mb-2 text-heading">No.HP</h4>
                            <input class="w-full p-2 mb-4 bg-white border border-gray-300 outline-none title"
                                spellcheck="false" placeholder="Masukkan No.HP" id="nohp" name="nohp"
                                type="text" value="{{ $post->nohp }}">
                        </div>
                        <div class="w-full">
                            <h4 class="mb-2 text-heading">Jenis Kelamin</h4>
                            <select class="w-full p-2 mb-4 border border-gray-300" id="kelamin" name="kelamin">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki" {{  $post->kelamin  == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{  $post->kelamin  == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex flex-col md:gap-8 md:flex-row">
                        <div class="w-full">
                            <h4 class="mb-2 text-heading">Pendidikan</h4>
                            <select class="w-full p-2 mb-4 border border-gray-300" id="pendidikan" name="pendidikan">
                                <option value="">Pilih Pendidikan</option>
                                <option value="Belum/Tidak Sekolah"  {{  $post->pendidikan  == 'Belum/Tidak Sekolah' ? 'selected' : '' }}>Belum/Tidak Sekolah</option>
                                <option value="SD/Sederajat" {{  $post->pendidikan  == 'SD/Sederajat' ? 'selected' : '' }}>SD/Sederajat</option>
                                <option value="SMP/Sederajat" {{  $post->pendidikan  == 'SMP/Sederajat' ? 'selected' : '' }}>SMP/Sederajat</option>
                                <option value="SMA/Sederajat" {{  $post->pendidikan  == 'SMA/Sederajat' ? 'selected' : '' }}>SMA/Sederajat</option>
                                <option value="Strata 1" {{  $post->pendidikan  == 'Strata 1' ? 'selected' : '' }}>Strata 1</option>
                                <option value="Strata 2" {{  $post->pendidikan  == 'Strata 2' ? 'selected' : '' }}>Strata 2</option>
                                <option value="Strata 3" {{  $post->pendidikan  == 'Strata 3' ? 'selected' : '' }}>Strata 3</option>
                                <option value="Lainnya" {{  $post->pendidikan  == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                        </div>
                        <div class="w-full">
                            <h4 class="mb-2 text-heading">Pekerjaan</h4>
                            <input  class="w-full p-2 mb-4 bg-white border border-gray-300 outline-none title"
                                spellcheck="false" placeholder="Masukkan pekerjaan" id="pekerjaan" name="pekerjaan"
                                type="text" value="{{ $post->pekerjaan }}">
                        </div>
                    </div>

                    <div class="flex flex-col md:gap-8 md:flex-row">
                        <div class="w-full">
                            <h4 class="mb-2 text-heading">Agama</h4>
                            <select class="w-full p-2 mb-4 border border-gray-300" id="agama" name="agama">
                                <option value="">Pilih Agama</option>
                                <option value="Islam"  {{  $post->agama  == 'Islam' ? 'selected' : '' }}>Islam</option>
                                <option value="Kristen" {{  $post->agama  == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                <option value="Katolik" {{  $post->agama  == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                <option value="Hindu" {{  $post->agama  == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                <option value="Buddha" {{  $post->agama  == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                            </select>
                        </div>
                        <div class="w-full">
                            <h4 class="mb-2 text-heading">Perkawinan</h4>
                            <select class="w-full p-2 border border-gray-300" id="perkawinan" name="perkawinan">
                                <option value="">Pilih Status Perkawinan</option>
                                <option value="Belum Menikah" {{  $post->perkawinan  == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                                <option value="Menikah" {{  $post->perkawinan  == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                                <option value="Duda/Janda" {{  $post->perkawinan  == 'Duda/Janda' ? 'selected' : '' }}>Duda/Janda</option>
                            </select>
                        </div>
                    </div>



                </div>
                <button type="submit" class="button">Update</button>
            </form>
    </div>
 
@endsection

@section('script')

@endsection
