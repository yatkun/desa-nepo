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
    <h3 class="mb-3 font-semibold text-heading">Edit Berita</h3>
    
        <div class="card" x-data="{ images: [] }">
            <div class="flex items-center justify-between pb-4 mb-3 border-b">
                <a href="{{ route('berita') }}" class="inline-block px-3 py-2 text-sm text-white rounded bg-sky-500">Kembali</a>
                <a onclick="return confirm('Apakah Anda Yakin Menghapus Berita Ini?');" href="/berita/hapus/{{$post->id}}" class="px-3 py-2 text-sm text-white rounded bg-rose-500">Hapus</a>
        
            </div>
            <form action="{{ route('berita.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <div class="mb-5">
                <div>
                    <h4 class="mb-2 text-heading">Judul</h4>
                    <input autofocus class="w-full p-2 mb-4 bg-white border border-gray-300 outline-none title"
                        spellcheck="false" placeholder="Masukkan judul berita" id="judul" name="judul" type="text" value="{{ $post->judul }}">
                </div>
                <div>
                    <h4 class="mb-2 text-heading">Slug</h4>
                    <input readonly class="w-full p-2 mb-4 bg-gray-100 border border-gray-300 outline-none title"
                        spellcheck="false" id="slug" name="slug" type="text" value="{{ $post->slug }}">
                </div>



                <div class="h-auto editor-container">
                    <h4 class="mb-2 text-heading">Isi</h4>
                    <textarea name="isi" id="editor">
                        {{ $post->isi }}
                   </textarea>
                </div>
                
                <div class="mt-3 form-group">
                    <h4 for="gambar" class="mb-2 text-heading">Gambar</h4>
                    <input type="hidden" name="oldImage" value="{{ $post->gambar }}">
                            @if ($post->gambar)
                            <img src="{{ asset('storage/'.$post->gambar) }}" class="w-[200px] mb-3 img-preview">
                            @else
                            <img src="" class="w-[200px] mb-3 img-preview">
                            @endif
                    
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
                class="px-3 py-2 text-sm text-white rounded bg-primary hover:bg-indigo-800">Update</button>
            </form>
        </div>
@endsection

@section('script')
    <script>
        const judul = document.querySelector('#judul');
        const slug = document.querySelector('#slug');

        judul.addEventListener('change', function() {
            fetch('/berita/tambah/checkSlug?judul=' + judul.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
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
