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

                        <div class="form-group">
                            <h4 for="logo" class="mb-2 text-heading">Logo</h4>
                            <input type="hidden" name="oldImage" value="{{ $identitas->logo }}">
                            @if ($identitas->logo)
                            <img src="{{ asset('storage/'.$identitas->logo) }}" class="w-[300px] mb-3 img-preview">
                            @else
                            <img src="" class="w-20 mb-3 img-preview">
                            @endif
                            <div class="input-group">
                                <div class="custom-file">
                                    <input
                                    class="w-full p-2 border border-gray-300"
                                    type="file" name="logo" onchange="previewImage()" id="myInput" aria-describedby="myInput">
                                   
                                </div>
        
                            </div>
        
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

                    <div class="form-group">
                        <h4 for="logo" class="mb-2 text-heading">Logo</h4>
                        <img src="" class="w-[200px] mb-3 img-preview">
                        <div class="input-group">
                            <div class="custom-file">
                                <input
                                class="w-full p-2 border border-gray-300"
                                type="file" name="logo" onchange="previewImage()" id="myInput" aria-describedby="myInput">
                               
                            </div>
    
                        </div>
    
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
