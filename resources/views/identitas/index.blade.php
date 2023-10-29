@extends('template/panel')

@section('css')
@endsection

@section('konten')
    <h3 class="mb-3 font-semibold text-heading">Identitas Desa</h3>
    <div class="card" x-data="{ images: [] }">

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


        @if (isset($identitas))
            <form method="post" action="{{ route('identitas.post') }}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="mb-5">
                    <div class="mb-5">
                        <div>
                            <h4 class="mb-2 text-heading">Nama Desa</h4>
                            <input class="w-full p-2 mb-4 bg-white border border-gray-300 outline-none title"
                                spellcheck="false" placeholder="Masukkan nama desa" id="namadesa" name="namadesa"
                                type="text" value="{{ $identitas->namadesa }}">
                        </div>
                        <div class="flex flex-col md:gap-8 md:flex-row">
                            <div class="w-full">
                                <h4 class="mb-2 text-heading">Kecamatan</h4>
                                <input class="w-full p-2 mb-4 bg-white border border-gray-300 outline-none title"
                                    spellcheck="false" placeholder="Masukkan kecamatan" id="kecamatan" name="kecamatan"
                                    type="text" value="{{ $identitas->kecamatan }}">
                            </div>
                            <div class="w-full">
                                <h4 class="mb-2 text-heading">Kabupaten</h4>
                                <input class="w-full p-2 mb-4 bg-white border border-gray-300 outline-none title"
                                    spellcheck="false" placeholder="Masukkan kabupaten" id="kabupaten" name="kabupaten"
                                    type="text" value="{{ $identitas->kabupaten }}">
                            </div>
                        </div>

                        <div class="flex flex-col md:gap-8 md:flex-row">
                            <div class="w-full">
                                <h4 class="mb-2 text-heading">No.HP</h4>
                                <input class="w-full p-2 mb-4 bg-white border border-gray-300 outline-none title"
                                    spellcheck="false" placeholder="Masukkan nomor hp" id="nohp" name="nohp"
                                    type="text" value="{{ $identitas->nohp }}">
                            </div>
                            <div class="w-full">
                                <h4 class="mb-2 text-heading">Email</h4>
                                <input class="w-full p-2 mb-4 bg-white border border-gray-300 outline-none title"
                                    spellcheck="false" placeholder="Masukkan email" id="email" name="email"
                                    type="text" value="{{ $identitas->email }}">
                            </div>
                        </div>

                        <div class="w-1/4">
                            <h4 class="mb-2 text-heading">Kode Pos</h4>
                            <input class="w-full p-2 mb-4 bg-white border border-gray-300 outline-none title"
                                spellcheck="false" placeholder="Masukkan kode pos" id="kodepos" name="kodepos"
                                type="text" value="{{ $identitas->kodepos }}">
                        </div>

                        <!-- icons -->
                        <div class="flex flex-col text-gray-500 icons">
                            <h4 class="mb-2 text-heading">Logo Desa</h4>
                            <label id="select-image">

                                <svg class="h-10 p-1 mr-2 border rounded-full cursor-pointer hover:text-gray-700"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                </svg>

                                <input name="logo" hidden type="file" multiple
                                    @change="images = Array.from($event.target.files).map(file => ({url: URL.createObjectURL(file), name: file.name, preview: ['jpg', 'jpeg', 'png', 'gif'].includes(file.name.split('.').pop().toLowerCase()), size: file.size > 1024 ? file.size > 1048576 ? Math.round(file.size / 1048576) + 'mb' : Math.round(file.size / 1024) + 'kb' : file.size + 'b'}))"
                                    x-ref="fileInput">

                            </label>

                        </div>

                        <!-- Preview image here -->
                        <div id="preview" class="flex my-4">
                            <template x-for="(image, index) in images" :key="index">
                                <div class="relative object-cover w-32 h-32 rounded ">
                                 
                                    <div x-show="image.preview" class="relative object-cover w-32 h-32 rounded">
                                        <img :src="image.url" class="object-cover w-32 h-32 rounded">
                                        <button @click="images.splice(index, 1)"
                                            class="absolute top-0 right-0 flex items-center w-6 h-6 p-1 m-2 text-lg text-center text-white bg-red-500 rounded-full hover:text-red-700 hover:bg-gray-100"><span
                                                class="mx-auto">×</span></button>

                                    </div>
                                    <div x-show="!image.preview" class="relative object-cover w-32 h-32 rounded">
                                        <!-- <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 fill-white stroke-indigo-500" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                            </svg> -->
                                        <svg class="w-32 h-32 pt-1 ml-auto fill-current"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24">
                                            <path d="M15 2v5h5v15h-16v-20h11zm1-2h-14v24h20v-18l-6-6z" />
                                        </svg>
                                        <button @click="images.splice(index, 1)"
                                            class="absolute top-0 right-0 flex items-center w-6 h-6 p-1 m-2 text-lg text-center text-white bg-red-500 rounded-full hover:text-red-700 hover:bg-gray-100"><span
                                                class="mx-auto">×</span></button>
                                        <div x-text="image.size" class="p-2 text-xs text-center"></div>
                                    </div>

                                </div>
                            </template>
                        </div>


                    </div>
                </div>



                <button type="submit" class="button">Perbaharui</button>
            </form>
        @else
            <form method="post" action="{{ route('identitas.post') }}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="mb-5">
                    <div>
                        <h4 class="mb-2 text-heading">Nama Desa</h4>
                        <input autofocus class="w-full p-2 mb-4 bg-white border border-gray-300 outline-none title"
                            spellcheck="false" placeholder="Masukkan nama desa" id="namadesa" name="namadesa"
                            type="text">
                    </div>
                    <div class="flex flex-col md:gap-8 md:flex-row">
                        <div class="w-full">
                            <h4 class="mb-2 text-heading">Kecamatan</h4>
                            <input autofocus class="w-full p-2 mb-4 bg-white border border-gray-300 outline-none title"
                                spellcheck="false" placeholder="Masukkan kecamatan" id="kecamatan" name="kecamatan"
                                type="text">
                        </div>
                        <div class="w-full">
                            <h4 class="mb-2 text-heading">Kabupaten</h4>
                            <input autofocus class="w-full p-2 mb-4 bg-white border border-gray-300 outline-none title"
                                spellcheck="false" placeholder="Masukkan kabupaten" id="kabupaten" name="kabupaten"
                                type="text">
                        </div>
                    </div>

                    <div class="flex flex-col md:gap-8 md:flex-row">
                        <div class="w-full">
                            <h4 class="mb-2 text-heading">No.HP</h4>
                            <input autofocus class="w-full p-2 mb-4 bg-white border border-gray-300 outline-none title"
                                spellcheck="false" placeholder="Masukkan nomor hp" id="nohp" name="nohp"
                                type="text">
                        </div>
                        <div class="w-full">
                            <h4 class="mb-2 text-heading">Email</h4>
                            <input autofocus class="w-full p-2 mb-4 bg-white border border-gray-300 outline-none title"
                                spellcheck="false" placeholder="Masukkan email" id="email" name="email"
                                type="text">
                        </div>
                    </div>

                    <div class="w-1/4">
                        <h4 class="mb-2 text-heading">Kode Pos</h4>
                        <input autofocus class="w-full p-2 mb-4 bg-white border border-gray-300 outline-none title"
                            spellcheck="false" placeholder="Masukkan kode pos" id="kodepos" name="kodepos"
                            type="text">
                    </div>

                    <!-- icons -->
                    <div class="flex flex-col text-gray-500 icons">
                        <h4 class="mb-2 text-heading">Logo Desa</h4>
                        <label id="select-image">

                            <svg class="h-10 p-1 mr-2 border rounded-full cursor-pointer hover:text-gray-700"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                            </svg>

                            <input name="logo" hidden type="file" multiple
                                @change="images = Array.from($event.target.files).map(file => ({url: URL.createObjectURL(file), name: file.name, preview: ['jpg', 'jpeg', 'png', 'gif'].includes(file.name.split('.').pop().toLowerCase()), size: file.size > 1024 ? file.size > 1048576 ? Math.round(file.size / 1048576) + 'mb' : Math.round(file.size / 1024) + 'kb' : file.size + 'b'}))"
                                x-ref="fileInput">

                        </label>

                    </div>

                    <!-- Preview image here -->
                    <div id="preview" class="flex my-4">
                        <template x-for="(image, index) in images" :key="index">
                            <div class="relative object-cover w-32 h-32 rounded ">
                                <div x-show="image.preview" class="relative object-cover w-32 h-32 rounded">

                                    <img :src="image.url" class="object-cover w-32 h-32 rounded">

                                    <button @click="images.splice(index, 1)"
                                        class="absolute top-0 right-0 flex items-center w-6 h-6 p-1 m-2 text-lg text-center text-white bg-red-500 rounded-full hover:text-red-700 hover:bg-gray-100"><span
                                            class="mx-auto">×</span></button>

                                </div>
                                <div x-show="!image.preview" class="relative object-cover w-32 h-32 rounded">
                                    <!-- <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 fill-white stroke-indigo-500" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                            </svg> -->
                                    <svg class="w-32 h-32 pt-1 ml-auto fill-current" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M15 2v5h5v15h-16v-20h11zm1-2h-14v24h20v-18l-6-6z" />
                                    </svg>
                                    <button @click="images.splice(index, 1)"
                                        class="absolute top-0 right-0 flex items-center w-6 h-6 p-1 m-2 text-lg text-center text-white bg-red-500 rounded-full hover:text-red-700 hover:bg-gray-100"><span
                                            class="mx-auto">×</span></button>
                                    <div x-text="image.size" class="p-2 text-xs text-center"></div>
                                </div>

                            </div>
                        </template>
                    </div>


                </div>
                <button type="submit" class="button">Simpan</button>
            </form>
    </div>
    @endif
@endsection

@section('script')
    <script>
        function previewImage() {
            const image = document.querySelector('#myInput');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
