<!-- Navbar -->
<nav class="fixed w-full bg-white shadow-md py-4 px-8 flex justify-between items-center z-50">
    <div class="flex items-center space-x-3">
        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-11 h-11">
        <div class="text-2xl font-bold" style="font-family: 'Raleway', sans-serif;">
            <span class="text-blue-400">Photo</span><span class="text-blue-900">Lance</span>
        </div>
    </div>
    
    <!-- Search Bar -->
    {{-- <div class="hidden md:flex items-center bg-gray-200 rounded-full px-4 py-2">
        <input type="text" placeholder="Search..." class="bg-transparent focus:outline-none px-2">
        <button class="text-gray-600">
            <img src="{{ asset('img/search.png') }}" alt="Search" class="w-4 h-4">
        </button>
    </div>         --}}
    
    <!-- Menu Button for Mobile -->
    <button id="menu-btn" class="block md:hidden text-2xl">☰</button>
    
    <div id="sidebar" class="fixed top-0 left-0 w-60 h-full bg-blue-900 text-white p-5 transform -translate-x-full transition-transform md:hidden shadow-lg">
        <button id="close-btn" class="text-white text-2xl mb-4">&times;</button>
    
        <ul class="space-y-3 text-sm font-medium">
            <li><a href="#home" class="block py-2 px-3 rounded-lg hover:bg-blue-800 transition">Home</a></li>
            <li><a href="#portofolio" class="block py-2 px-3 rounded-lg hover:bg-blue-800 transition">Galeri</a></li>
            <li><a href="#layanan" class="block py-2 px-3 rounded-lg hover:bg-blue-800 transition">Layanan</a></li>
            <li><a href="#booking" class="block py-2 px-3 rounded-lg hover:bg-blue-800 transition">Booking</a></li>
            <li><a href="#tentangkami" class="block py-2 px-3 rounded-lg hover:bg-blue-800 transition">Tentang Kami</a></li>
        </ul>
    
        <!-- Login & Register Buttons -->
        <div class="mt-6 flex flex-col space-y-2">
            <a href="{{ route('login') }}" class="block text-center text-sm font-medium bg-white text-blue-900 px-3 py-2 rounded-lg hover:bg-gray-200 transition shadow">
                Login
            </a>
            <a href="{{ route('register') }}" class="block text-center text-sm font-medium bg-blue-700 text-white px-3 py-2 rounded-lg hover:bg-blue-800 transition shadow">
                Register
            </a>
        </div>
    </div>
    
    
    <ul class="hidden md:flex space-x-6 text-blue-900 font-medium">
        <li><a href="#home" class="hover:text-blue-500">Home</a></li>
        <li><a href="#portofolio" class="hover:text-blue-500">Galeri</a></li>
        <li><a href="#layanan" class="hover:text-blue-500">Layanan</a></li>
        <li><a href="#booking" class="hover:text-blue-500">Booking</a></li>
        <li><a href="#tentangkami" class="hover:text-blue-500">Tentang Kami</a></li>
    </ul>
    <div class="hidden md:flex items-center space-x-4">
        <a href="{{ route('login') }}" class="border border-blue-900 text-blue-900 px-4 py-1 rounded-full hover:bg-blue-900 hover:text-white text-sm">
            Login
        </a>
        <a href="{{ route('register') }}" class="bg-blue-900 text-white px-4 py-1 rounded-full hover:bg-blue-800 text-sm">
            Register
        </a>
    </div>    
</nav>