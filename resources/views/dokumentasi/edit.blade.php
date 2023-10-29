@extends('template/panel')

@section('css')

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.x.x/dist/alpine.min.js" defer></script>
  
@endsection

@section('konten')
    <h3 class="mb-3 font-semibold text-heading">Edit Dokumentasi</h3>
    <form action="{{ route('dokumentasi.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="flex items-center justify-between pb-4 mb-3 border-b">
                <a href="{{ route('dokumentasi') }}" class="inline-block px-3 py-2 text-sm text-white rounded bg-sky-500">Kembali</a>
                <a onclick="return confirm('Apakah Anda Yakin Menghapus Dokumentasi Ini?');" href="/dokumentasi/hapus/{{$post->id}}" class="px-3 py-2 text-sm text-white rounded bg-rose-500">Hapus</a>
        
            </div>
            <div class="mb-5">
                <div>
                    <h4 class="mb-2 text-heading">Deskripsi</h4>
                    <input autofocus class="w-full p-2 mb-4 bg-white border border-gray-300 outline-none title"
                        spellcheck="false" placeholder="Masukkan deskripsi dokumentasi" id="judul" name="judul" type="text" value="{{ $post->judul }}">
                </div>
               
                <div class="form-group">
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
                class="px-3 py-2 text-sm text-white rounded bg-primary hover:bg-indigo-800">Simpan</button>
        </div>
    </form>
@endsection

@section('script')
    
    <script>
        function previewImage(){
            const image = document.querySelector('#myInput');
            const imgPreview = document.querySelector('.img-preview');
    
            imgPreview.style.width = '300px';
        
            const oFReader = new FileReader ();
            oFReader.readAsDataURL(image.files[0]);
    
            oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
            }
        }
       
    </script>
@endsection
