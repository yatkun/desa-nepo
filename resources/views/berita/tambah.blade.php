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
    <h3 class="mb-3 font-semibold text-heading">Tambah Berita</h3>
    <form action="{{ route('berita.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card" x-data="{ images: [] }">
            <div class="mb-5">
                <div>
                    <h4 class="mb-2 text-heading">Judul</h4>
                    <input autofocus class="w-full p-2 mb-4 bg-white border border-gray-300 outline-none title"
                        spellcheck="false" placeholder="Masukkan judul berita" id="judul" name="judul" type="text">
                </div>
                <div>
                    <h4 class="mb-2 text-heading">Slug</h4>
                    <input readonly class="w-full p-2 mb-4 bg-gray-100 border border-gray-300 outline-none title"
                        spellcheck="false" id="slug" name="slug" type="text">
                </div>



                <div class="h-auto editor-container">
                    <h4 class="mb-2 text-heading">Isi</h4>
                    <textarea name="isi" id="editor">
                  
                   </textarea>
                </div>
                <!-- icons -->
                <div class="flex mt-3 text-gray-500 icons">
                    <label id="select-image">
                        
                        <svg class="h-10 p-1 mr-2 border rounded-full cursor-pointer hover:text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                          </svg>
                          
                        <input name="gambar" hidden type="file" multiple
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
                                <div x-text="image.size" class="p-2 mb-5 text-xs text-center"></div>
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

            <button type="submit"
                class="px-3 py-2 mt-3 text-sm text-white rounded bg-primary hover:bg-indigo-800">Simpan</button>
        </div>
    </form>
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
@endsection
