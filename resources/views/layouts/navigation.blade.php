<nav x-data="{ open: false }" class="fixed w-full bg-white shadow-md py-4 px-8 flex justify-between items-center z-50">
    <!-- Logo -->
    <div class="flex items-center space-x-3">
        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-11 h-11">
        <div class="text-2xl font-bold" style="font-family: 'Raleway', sans-serif;">
            <span class="text-blue-400">Photo</span><span class="text-blue-900">Lance</span>
        </div>
    </div>

    <!-- Navigation Links (Desktop) -->
    <ul class="hidden md:flex space-x-6 text-blue-900 font-medium">
        <li><a href="{{ route('dashboard') }}" class="hover:text-blue-500 {{ request()->routeIs('dashboard') ? 'text-blue-900' : '' }}">Home</a></li>
        <li><a href="{{ route('dashboard') }}#portofolio" class="hover:text-blue-500">Galeri</a></li>
        <li><a href="{{ route('dashboard') }}#booking" class="hover:text-blue-500">Booking</a></li>
        <li><a href="{{ route('dashboard') }}#layanan" class="hover:text-blue-500">Layanan</a></li>
        <li><a href="{{ route('dashboard') }}#tentangkami" class="hover:text-blue-500">Tentang Kami</a></li>
    </ul>

    <!-- User Dropdown -->
    <div class="hidden sm:flex sm:items-center sm:ms-6">
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                    <div>{{ Auth::user()->name }}</div>
                    <div class="ms-1">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
            </x-slot>

            <x-slot name="content">
                <x-dropdown-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-dropdown-link>
                <x-dropdown-link :href="route('payment.dashboard')">
                    {{ __('Payment') }}
                </x-dropdown-link>
                                <x-dropdown-link :href="route('booking.dashboard_booking')">
                    {{ __('Booking') }}
                </x-dropdown-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </div>

    <!-- Mobile Menu Button -->
    <button @click="open = !open" class="block md:hidden text-2xl focus:outline-none">
        ☰
    </button>

    <!-- Mobile Sidebar -->
    <div id="sidebar" x-show="open" x-transition 
        class="fixed top-0 left-0 w-60 h-full bg-blue-900 text-white p-5 md:hidden shadow-lg"
        :class="open ? 'translate-x-0' : '-translate-x-full'">
        <button @click="open = false" class="text-white text-2xl mb-4">&times;</button>
        <ul class="space-y-3 text-sm font-medium">
            <li><a href="{{ route('dashboard') }}" class="block py-2 px-3 rounded-lg hover:bg-blue-800 transition">Home</a></li>
            <li><a href="{{ route('dashboard') }}#portofolio" class="block py-2 px-3 rounded-lg hover:bg-blue-800 transition">Galeri</a></li>
            <li><a href="{{ route('dashboard') }}#booking" class="block py-2 px-3 rounded-lg hover:bg-blue-800 transition">Booking</a></li>
            <li><a href="{{ route('dashboard') }}#layanan" class="block py-2 px-3 rounded-lg hover:bg-blue-800 transition">Layanan</a></li>
            <li><a href="{{ route('dashboard') }}#tentangkami" class="block py-2 px-3 rounded-lg hover:bg-blue-800 transition">Tentang Kami</a></li>
        </ul>
        

        <div class="mt-6 border-t pt-3">
            <div class="px-3">
                <div class="text-sm font-medium">{{ Auth::user()->name }}</div>
                <div class="text-xs text-gray-300">{{ Auth::user()->email }}</div>
                
            </div>

            <div class="mt-3 space-y-1">
                <a href="{{ route('profile.edit') }}" class="block py-2 px-3 rounded-lg hover:bg-gray-800 transition text-sm">Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" 
                        class="block py-2 px-3 rounded-lg hover:bg-gray-800 transition text-sm">Log Out</a>
                </form>
                
            </div>
        </div>
    </div>
</nav>
