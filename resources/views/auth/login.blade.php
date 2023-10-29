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

<body>
    <!-- Container -->
    <div class="flex flex-wrap content-center justify-center w-full min-h-screen py-10 bg-gray-200">

        <!-- Login component -->
        <div class="flex shadow-md">
            <!-- Login form -->
            <div class="flex flex-wrap content-center justify-center bg-white rounded-l-md"
                style="width: 24rem; height: 32rem;">
                <div class="w-72">
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
            <div class="flex flex-wrap content-center justify-center rounded-r-md" style="width: 24rem; height: 32rem;">
                <img class="w-full h-full bg-center bg-no-repeat bg-cover rounded-r-md"
                    src="https://i.imgur.com/9l1A4OS.jpeg">
            </div>

        </div>

    </div>
</body>

</html>
