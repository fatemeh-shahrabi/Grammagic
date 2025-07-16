<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Grammagic') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <style>
        .gradient-text {
            background: linear-gradient(45deg, #4F46E5, #10B981);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .gradient-bg {
            background: linear-gradient(135deg, #4F46E5 0%, #10B981 100%);
        }
        .hover-scale {
            transition: transform 0.3s ease-in-out;
        }
        .hover-scale:hover {
            transform: scale(1.05);
        }
        .font-popp {
            font-family: 'Poppins', sans-serif;
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .focus-ring {
            transition: all 0.3s ease;
        }
        .focus-ring:focus {
            ring: 2px solid #4F46E5;
            outline: none;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased font-popp bg-gray-50 text-gray-800 min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <!-- Logo and Branding -->
        <div class="text-center animate__animated animate__fadeInDown">
            <a href="/" wire:navigate>
                <img src="{{ asset('images/grammagic.png') }}" alt="Grammagic Logo" class="h-16 w-auto mx-auto mb-4">
            </a>
            <h2 class="text-3xl font-bold gradient-text">{{ config('app.name', 'Grammagic') }}</h2>
        </div>

        <!-- Content Slot -->
        <div class="bg-white p-8 rounded-xl shadow-sm card-hover">
            {{ $slot }}
        </div>
    </div>
</body>
</html>