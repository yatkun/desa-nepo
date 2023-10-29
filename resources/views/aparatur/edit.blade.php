@extends('template/panel')

@section('css')
    
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.x.x/dist/alpine.min.js" defer></script>
    
@endsection

@section('konten')
    <h3 class="mb-3 font-semibold text-heading">Edit Aparatur Desa</h3>
    
        <div class="card" x-data="{ images: [] }">
            <div class="flex items-center justify-between pb-4 mb-3 border-b">
                <a href="{{ route('aparatur') }}" class="inline-block px-3 py-2 text-sm text-white rounded bg-sky-500">Kembali</a>
                <a onclick="return confirm('Apakah Anda Yakin Menghapus Aparatur Ini?');" href="/aparatur-desa/hapus/{{$post->id}}" class="px-3 py-2 text-sm text-white rounded bg-rose-500">Hapus</a>
        
            </div>
            <form action="{{ route('aparatur.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <div class="mb-5">
                <div>
                    <h4 class="mb-2 text-heading">Nama Lengkap</h4>
                    <input  class="w-full p-2 mb-4 bg-white border border-gray-300 outline-none title"
                        spellcheck="false" placeholder="Masukkan nama lengkap" id="nama" name="nama" type="text" value="{{ $post->nama }}">
                </div>
                <div>
                    <h4 class="mb-2 text-heading">Jabatan</h4>
                    <input  class="w-full p-2 mb-4 bg-white border border-gray-300 outline-none title"
                        spellcheck="false" placeholder="Masukkan jabatan" id="jabatan" name="jabatan" type="text" value="{{ $post->jabatan }}">
                </div>
              
                <div class="form-group">
                    <h4 for="foto" class="mb-2 text-heading">Foto</h4>
                    <input type="hidden" name="oldImage" value="{{ $post->foto }}">
                            @if ($post->foto)
                            <img src="{{ asset('storage/'.$post->foto) }}" class="w-[200px] mb-3 img-preview">
                            @else
                            <img src="" class="w-[200px] mb-3 img-preview">
                            @endif
                    
                    <div class="input-group">
                        <div class="custom-file">
                            <input
                            class="w-full p-2 border border-gray-300"
                            type="file" name="foto" onchange="previewImage()" id="myInput" aria-describedby="myInput">
                           
                        </div>

                    </div>

                </div>

            </div>

            <button type="submit"
                class="px-3 py-2 mt-3 text-sm text-white rounded bg-primary hover:bg-indigo-800">Simpan</button>
            </form>
        </div>
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
