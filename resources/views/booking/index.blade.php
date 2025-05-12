{{-- resources/views/partials/booking.blade.php --}}
<section class="bg-white mb-8 font-poppins font-bold">
    <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between">
        <!-- Gambar dengan background lingkaran biru -->
        <div class="relative w-full md:w-1/2 flex justify-center mb-10 md:mb-0">
        <div class="absolute w-72 h-72 bg-blue-700 rounded-full z-0 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></div>
        <img src="{{ asset('img/booking_foto.png') }}" alt="Photographer Booking" class="w-full max-w-md relative z-10">
        </div>

        <!-- Teks -->
        <div class="w-full md:w-1/2 md:pl-10 text-left">
        <h2 class="text-5xl leading-tight mb-2 text-gray-800 font-bold">
            Abadikan Momen Berharga 
        </h2>
        <h3 class="text-3xl mb-4 text-gray-800">
            Bersama <span class="text-blue-400">Photo</span><span class="text-blue-900">Lance</span>
        </h3>

        <p class="text-gray-600 mb-4">
            Photolance memudahkan kamu menemukan dan memesan fotografer profesional untuk berbagai keperluan, mulai dari foto prewedding hingga acara spesial lainnya.
        </p>
        <p class="text-gray-600 mb-6">
            Mulai perjalanan Photolance sempurnamu hari ini!
        </p>

<a 
    href="{{ Auth::check() ? route('booking.dashboard_booking') : route('login') }}" 
    class="inline-block bg-blue-600 text-white py-3 px-6 rounded-xl shadow hover:bg-blue-700 transition duration-200">
    Pesan Sekarang
</a>


        </div>
    </div>
</section>
