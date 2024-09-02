<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.x.x/dist/alpine.min.js" defer></script>
    @vite('resources/css/app.css')
    <title>Login Page</title>
</head>

<body class="h-screen overflow-hidden bg-gray-100 ">
    {{-- <div class="flex flex-col-reverse items-center justify-center w-full h-screen p-12 bg-blue-300 md:flex-row md:p-0">
        <div class="grid grid-cols-12 bg-green-300">
            <div class="col-span-6 bg-white">as</div>
        <div class="col-span-6 bg-red-100">sa</div>
        </div>
    </div> --}}
    <div class="flex flex-col items-center justify-center w-full h-full p-0 md:flex-row md:p-0">
        <div class="grid items-center w-full grid-cols-1 px-4 md:px-0 md:w-1/2 md:grid-cols-2">
            <div class="order-2 p-4 bg-white shadow-sm md:p-8 md:order-1 rounded-b-md md:rounded-l-md md:rounded-br-none"> <!-- Form login -->
                <h1 class="text-xl font-semibold">Selamat Datang</h1>
                <small class="text-gray-400">Halaman Admin Website Desa</small>
                @if (session()->has('loginError'))
                    <div x-data="{ open: true }" x-show="open" class="relative p-4 mt-3 mb-5 bg-red-200">
                        <span class="text-sm text-red-800">
                            {{ session('loginError') }}
                        </span>
                        <button @click="open = false" class="absolute top-0 right-0 m-4 text-red-800">&times;</button>
                    </div>
                @endif
                <form class="mt-4" action="/login" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="block mb-2 text-xs font-semibold">Username</label>
                        <input required autofocus
                            class="text-sm w-full py-2 px-1.5 mb-2 bg-white border border-gray-300 outline-none title"
                            spellcheck="false" placeholder="Masukkan username" name="username" type="text">
                    </div>

                    <div class="mb-3">
                        <label class="block mb-2 text-xs font-semibold">Password</label>
                        <input required
                            class="text-sm w-full py-2 px-1.5 mb-2 bg-white border border-gray-300 outline-none title"
                            spellcheck="false" placeholder="Masukkan password" name="password" type="password">
                    </div>
                    <div class="mb-3">
                        <button
                            class="mb-1.5 block w-full text-sm text-center text-white bg-primary px-2 py-2 rounded">Masuk</button>

                    </div>
                </form>
            </div>
            <div class="order-1 h-full overflow-hidden bg-red-100 shadow-sm md:order-2 rounded-t-md md:rounded-r-md md:rounded-tl-none"> <!-- Gambar -->
                <img class="object-cover w-full h-full rounded-r-md rounded-t-md md:rounded-r-md md:rounded-tl-none"
                src="https://cdn.shipsapp.co.id/foto_pelabuhan/cb79a3dd58cc6c9213246cb95e1bb7e5.png">
            </div>
        </div>
    </div>

    <!-- Container -->
    {{-- <div class="flex flex-wrap content-center justify-center w-full min-h-screen py-10 bg-gray-200">

        <!-- Login component -->
        <div class="flex shadow-md">
            <!-- Login form -->
            <div class="flex flex-wrap content-center justify-center p-12 bg-white rounded-l-md col-12"
                >
                <div class="w-full md:w-72">
                    <!-- Heading -->
                    <h1 class="text-xl font-semibold">Selamat Datang</h1>
                    <small class="text-gray-400">Halaman Admin Website Desa</small>
                    @if (session()->has('loginError'))
                    <div x-data="{ open: true }" x-show="open" class="relative p-4 mt-3 mb-5 bg-red-200">
                        <span class="text-sm text-red-800">
                            {{ session('loginError') }}
                        </span>
                        <button @click="open = false" class="absolute top-0 right-0 m-4 text-red-800">&times;</button>
                    </div>
                @endif
                    <!-- Form -->
                    <form class="mt-4" action="/login" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="block mb-2 text-xs font-semibold">Username</label>
                            <input required autofocus class="text-sm w-full py-2 px-1.5 mb-2 bg-white border border-gray-300 outline-none title"
                                spellcheck="false" placeholder="Masukkan username"  name="username"
                                type="text">
                        </div>

                        <div class="mb-3">
                            <label class="block mb-2 text-xs font-semibold">Password</label>
                            <input required class="text-sm w-full py-2 px-1.5 mb-2 bg-white border border-gray-300 outline-none title"
                            spellcheck="false" placeholder="Masukkan password"  name="password"
                            type="password">
                        </div>
                        <div class="mb-3">
                            <button
                                class="mb-1.5 block w-full text-center text-white bg-primary px-2 py-1.5 rounded">Masuk</button>

                        </div>
                    </form>


                </div>
            </div>

            <!-- Login banner -->
            <div class="flex-wrap content-center justify-center hidden md:flex rounded-r-md" style="width: 24rem; height: 32rem;">
                <img class="object-cover w-auto h-full bg-cover rounded-r-md"
                    src="https://cdn.shipsapp.co.id/foto_pelabuhan/cb79a3dd58cc6c9213246cb95e1bb7e5.png">
            </div>

        </div>

    </div> --}}
</body>

</html>
