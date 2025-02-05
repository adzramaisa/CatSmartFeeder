<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('efeeders-logo.png') }}">
    <title>Efeeders | @yield('title')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @stack('custom-css')
</head>

<body class="min-w-screen min-h-screen p-20" data-theme="valentine" x-data="{ open: false }">
    <div class="flex items-center justify-center space-x-4 mb-5">
        <img src="{{ asset('efeeders-logo.png') }}" width="80" alt="feeders logo">
        <div>
            <p class="text-xl font-semibold">
                Smart Feeders
                <kbd @click="open = true" class="kbd btn btn-xs">i</kbd>
            </p>
            <p class="text-xl text-gray-600">STMIK Mardira</p>
        </div>
    </div>

    <!-- Modal -->
    <div :class="{'modal-open': open}" class="modal" x-show="open">
        <div class="modal-box flex flex-col items-center">
            <h3 class="text-lg font-bold text-center">Kelompok 4</h3>
            <ol class="list-none text-center mt-2">
                <li>Adam Albani Timmothy - 23110228</li>
                <li>Andika Fajri - 23110228</li>
                <li>Adzra Maisa - 23110228</li>
                <li>Fiki Muhammad - 23110228</li>
                <li>Naja Risalah - 23110228</li>
            </ol>
            <div class="modal-action">
                <button @click="open = false" class="btn btn-sm">Close</button>
            </div>
        </div>

    </div>

    @include('components.floating')
    @yield('contents')
    @stack('custom-js')
</body>

</html>