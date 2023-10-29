@extends('template/panel')

@section('css')
    <script src="{{ asset('assets/vendor/ckeditor5/build/ckeditor.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.x.x/dist/alpine.min.js" defer></script>
    <style>
        .editor-container ul {
            display: block;
            list-style-type: disc;
            margin-top: 1em;
            margin-bottom: 1 em;
            margin-left: 0;
            margin-right: 0;
            padding-left: 40px;
        }

        .editor-container ol {
            display: block;
            list-style-type: decimal;
            margin-top: 1em;
            margin-bottom: 1em;
            margin-left: 0;
            margin-right: 0;
            padding-left: 40px;
        }
    </style>
@endsection

@section('konten')
    <h3 class="mb-3 font-semibold text-heading">Tambah Dokumentasi</h3>
    <form action="{{ route('dokumentasi.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card" x-data="{ images: [] }">
            <div class="mb-5">
                <div>
                    <h4 class="mb-2 text-heading">Deskripsi</h4>
                    <input autofocus class="w-full p-2 mb-4 bg-white border border-gray-300 outline-none title"
                        spellcheck="false" placeholder="Masukkan deskripsi dokumentasi" id="judul" name="judul" type="text">
                </div>
               
                <div class="form-group">
                    <h4 for="gambar" class="mb-2 text-heading">Gambar</h4>
                    <img src="" class="w-[200px] mb-3 img-preview">
                    <div class="input-group">
                        <div class="custom-file">
                            <input
                            class="w-full p-2 border border-gray-300"
                            type="file" name="gambar" onchange="previewImage()" id="myInput" aria-describedby="myInput">
                           
                        </div>

                    </div>

                </div>
            </div>

            <button type="submit"
                class="px-3 py-2 text-sm text-white rounded bg-primary hover:bg-indigo-800">Simpan</button>
        </div>
    </form>
@endsection

@section('script')
    
    <script>
        function previewImage(){
            const image = document.querySelector('#myInput');
            const imgPreview = document.querySelector('.img-preview');
    
            imgPreview.style.width = '200px';
        
            const oFReader = new FileReader ();
            oFReader.readAsDataURL(image.files[0]);
    
            oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
            }
        }
       
    </script>
@endsection
