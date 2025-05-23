<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Studio Booking</title>
    <script src="https://cdn.tailwindcss.com"></script>
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

    <!-- Memanggil Navbar -->
    @include('navbar') 

    <!-- Memanggil Landing Page -->
    <section id="home">
        @include('landing_page')
    </section>

    <!-- Memanggil Portofolio -->
    <section id="portofolio" class="scroll-mt-16">
        @include('portofolio')
    </section>

    <!-- Memanggil Photographer -->
    <section id="photographer">
        @include('photographers.index')
    </section>

    <!-- Memanggil Booking -->
    <section id="booking">
        @include('booking.index')
    </section>

    <!-- Memanggil Layanan -->
    <section id="layanan" class="scroll-mt-20">
        @include('layanan')
    </section>


    <!-- Memanggil Tentang Kami -->
    <section id="tentangkami" >
        @include('tentangkami')
    </section>

    <!-- Memanggil Footer -->
    @include('footer')
</body>
</html>