<div class="relative h-screen w-full overflow-hidden">
    <div class="slide active" style="background-image: url('{{ asset('img/bg1.png') }}');"></div>
    <div class="slide" style="background-image: url('{{ asset('img/bg2.png') }}');"></div>
    <div class="slide" style="background-image: url('{{ asset('img/bg3.png') }}');"></div>
    


    <div class="absolute inset-0 bg-blue-900 bg-opacity-50 flex flex-col justify-center items-center text-white text-center">
        <h1 id="hero-text" class="text-4xl font-bold mb-4">Abadikan Momen Berharga Anda</h1>
        <p id="hero-subtext" class="text-lg mb-6 max-w-lg">Layanan fotografi profesional untuk setiap kebutuhan</p>
        <button class="bg-white text-blue-900 font-semibold px-6 py-2.5 rounded-full shadow-lg hover:bg-gray-200">Book Now</button>
    </div>
</div>
<script src="{{ asset('js/script_home.js') }}"></script>