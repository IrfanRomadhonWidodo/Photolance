<!DOCTYPE html>
<h lang="en">
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
    <x-app-layout>
    </x-app-layout>
    
    <section id="home">
        @include('landing_page')
    </section>

    <section id="portofolio" class="scroll-mt-16">
        @include('portofolio')
    </section>

    <section id="photographer">
        @include('photographers.index')
    </section>

    <section id="booking">
        @include('booking.index')
    </section>

    <section id="layanan" class="scroll-mt-20">
        @include('layanan')
    </section>

    <section id="employee">
        @include('employee.index')
    </section>

    <section id="tentangkami" class="scroll-mt-20">
        @include('tentangkami')
    </section>

    <section id="feedback">
        @include('feedback.form')
    </section>

    @include('footer')
    
    <script>
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
