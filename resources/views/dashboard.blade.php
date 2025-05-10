<!DOCTYPE html>
<h lang="en">
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
<!-- Memanggil Navigation -->
    <x-app-layout>
    </x-app-layout>
    
    <!-- Memanggil Landing Page -->
    <section id="home">
        @include('landing_page')
    </section>

    <!-- Memanggil Portofolio -->
    <section id="portofolio">
        @include('portofolio')
    </section>

    <!-- Memanggil Photographer -->
    <section id="photographer">
        @include('photographers.index')
    </section>


    <!-- Memanggil Layanan -->
    <section id="layanan">
        @include('layanan')
    </section>


    <!-- Memanggil Feedback -->
    <section id="feedback">
        @include('feedback.form')
    </section>

    <!-- Memanggil Footer -->
    @include('footer')
    
    <script>
        // Add smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
    
</body>
</html>
