<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Chirper') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <style>
        body {
            background: linear-gradient(135deg,rgb(99, 201, 241) 0%,rgb(67, 64, 241) 100%);
            min-height: 100vh;
        }
        .glass {
            background: rgba(255,255,255,0.95);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.10);
            backdrop-filter: blur(4px);
            border-radius: 1.25rem;
        }
        .brand {
            font-family: 'Figtree', sans-serif;
            font-weight: 700;
            font-size: 1.7rem;
            letter-spacing: 1px;
            color: #6366f1;
        }
        .main-content {
            padding: 2rem 1.5rem;
        }
        @media (max-width: 640px) {
            .main-content { padding: 1rem 0.5rem; }
        }
        @keyframes bounce-in {
            0% { transform: scale(0.95); opacity: 0; }
            60% { transform: scale(1.03); opacity: 1; }
            100% { transform: scale(1); }
        }
        .animate-bounce-in {
            animation: bounce-in 0.4s cubic-bezier(.68,-0.55,.27,1.55) both;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <!-- Modal Alpine.js -->
    <div 
        x-data="{ open: false, message: '' }"
        x-on:show-modal.window="open = true; message = $event.detail.message"
        x-show="open"
        style="display: none;"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 transition"
    >
        <div class="bg-white p-6 rounded-xl shadow-2xl border-2 border-indigo-400 animate-bounce-in max-w-xs w-full">
            <p class="text-base font-semibold text-indigo-700" x-text="message"></p>
            <button class="mt-4 px-4 py-2 bg-pink-500 hover:bg-pink-600 text-white rounded-full shadow transition" @click="open = false">
                Cerrar
            </button>
        </div>
    </div>

    <div class="min-h-screen flex flex-col items-center justify-start py-8 px-2">
        <div class="w-full max-w-3xl glass shadow-lg">
            <div class="flex items-center justify-between px-6 py-4 border-b border-indigo-100 bg-white/80 rounded-t-xl">
                <span class="brand">🐦 Chirper</span>
                <livewire:layout.navigation />
            </div>

            @if (isset($header))
                <header class="bg-gradient-to-r from-indigo-50 via-white to-pink-50 shadow-inner rounded-b-xl">
                    <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <main class="main-content">
                {{ $slot }}
            </main>
        </div>
    </div>

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>