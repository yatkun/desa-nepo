@extends('template/panel')

@section('css')

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.x.x/dist/alpine.min.js" defer></script>
   
@endsection

@section('konten')
    <section class="">
        <div class="flex items-center justify-between">
            <h3 class="font-semibold text-heading">Daftar Admin</h3>
            <a href="{{ route('user.create') }} " class="px-3 py-2 text-sm text-white bg-green-600 rounded hover:bg-green-700">Tambah Admin</a>
        </div>
        @if (session()->has('success'))
            <div x-data="{ open: true }" x-show="open" class="relative p-4 mt-5 mb-5 bg-blue-200">
                <span class="text-blue-800">
                    {{ session('success') }}
                </span>
                <button @click="open = false" class="absolute top-0 right-0 m-4 text-blue-800">&times;</button>
            </div>
        @endif
        <div class="flex flex-col mt-6">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden border border-gray-200 md:rounded-lg">

                        <table class="min-w-full divide-y divide-gray-200 ">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="w-6 py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                        No.
                                    </th>

                                    <th scope="col"
                                        class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                        Nama
                                    </th>

                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                        Username
                                    </th>

                                  
                                   
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 ">
                                <?php 
                                $i = 1;
                            ?>
                                @foreach ($user as $item)
                                
                                <tr>
                                    <td class="px-4 py-4 font-medium whitespace-nowrap">
                                        <div>
                                            {{ $i++ }}
                                        </div>
                                    </td>
                                    <td class="px-12 py-4 font-medium whitespace-nowrap">
                                       <p class="text-gray-700">{{ $item->name }}</p>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <p class="text-gray-700">{{ $item->username }}</p>
                                    </td>
                                    

                                </tr>
                                @endforeach
                                

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection


