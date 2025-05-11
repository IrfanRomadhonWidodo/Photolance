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


<a href="{{ route('dashboard') }}" class="absolute top-4 left-4 bg-blue-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-700 hover:scale-105 hover:shadow-lg transition-transform duration-300 ease-in-out flex items-center">
    <i class="fas fa-arrow-left mr-2"></i> Kembali ke Dashboard
</a>





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
