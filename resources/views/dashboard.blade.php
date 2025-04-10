<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Studio Booking</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
    <style>
        .slide {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    opacity: 0;
    transition: opacity 1s ease-in-out;
    }

    .slide.active {
        opacity: 1;
    }
    </style>
</head>
<body class="bg-white text-gray-900">

    {{-- Memanggil Navigation --}}
    <x-app-layout>
        <div class="container mx-auto">
            <h1 class="text-3xl font-bold">Dashboard</h1>
        </div>
    </x-app-layout>
    
    <!-- Memanggil Landing Page -->
    @include('landing_page')

    <!-- Memanggil Portofolio -->
    @include('portofolio')

    <!-- Memanggil Layanan -->
    @include('layanan')

    <x-app-layout>
    @foreach ($post as $posts)
    @endforeach
    <livewire:comments :model="$posts"/>
    </x-app-layout>

    <!-- Memanggil Footer -->
    @include('footer')
    
</body>
</html>
