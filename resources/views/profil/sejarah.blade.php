@extends('template/panel')

@section('css')
    <script src="{{ asset('assets/vendor/ckeditor5/build/ckeditor.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.x.x/dist/alpine.js" defer></script>

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
    <h3 class="mb-3 font-semibold text-heading">Sejarah Desa</h3>
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


        @if (isset($sejarah))
            <form method="post" action="{{ route('sejarah.post') }}">
                @csrf
                @method('POST')
                <div class="mb-5">

                    <h3 class="mb-3 font-semibold text-heading">Sejarah</h3>
                    <div class="editor-container">

                        <textarea name="sejarah" id="editor">
                    {{ $sejarah->sejarah }}
                   </textarea>
                    </div>
                </div>

            

                <button type="submit" class="button">Perbaharui</button>
            </form>
        @else
            <form method="post" action="{{ route('sejarah.post') }}">
                @csrf
                @method('POST')
                <div class="mb-5">
                    <h3 class="mb-3 font-semibold text-heading">Sejarah</h3>
                    <div class="editor-container">
                        <textarea name="sejarah" id="editor"></textarea>
                    </div>
                </div>


                <button type="submit" class="button">Simpan</button>
            </form>
    </div>
    @endif
@endsection

@section('script')
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#editor2'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
