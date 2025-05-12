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
        <div class="py-1 text-sm text-gray-700">
            <x-dropdown-link :href="route('profile.edit')" class="flex items-center gap-2 hover:bg-blue-100 px-4 py-2 rounded transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A4 4 0 018 16h8a4 4 0 012.879 1.804M15 11a3 3 0 10-6 0 3 3 0 006 0z" />
                </svg>
                {{ __('Profile') }}
            </x-dropdown-link>

            <x-dropdown-link :href="route('booking.dashboard_booking')" class="flex items-center gap-2 hover:bg-purple-100 px-4 py-2 rounded transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 4h10M5 11h14M5 19h14M5 15h14" />
                </svg>
                {{ __('Booking') }}
            </x-dropdown-link>

            <x-dropdown-link :href="route('payment.dashboard')" class="group flex items-center gap-2 px-4 py-2 rounded transition hover:bg-green-100 text-gray-700 hover:text-green-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-500 group-hover:text-green-600 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-2m4-4h-6m0 0l2-2m-2 2l2 2" />
                </svg>
                {{ __('Payment') }}
            </x-dropdown-link>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="flex items-center gap-2 hover:bg-red-100 px-4 py-2 rounded transition text-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 11-4 0v-1m4-10V5a2 2 0 10-4 0v1" />
                    </svg>
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
        </div>
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
