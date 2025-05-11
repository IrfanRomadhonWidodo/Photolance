<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Booking Confirmation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="text-center py-10">
                        <div class="rounded-full bg-green-100 p-3 h-24 w-24 mx-auto flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        
                        <h2 class="mt-6 text-2xl font-bold text-gray-900">Booking Successful!</h2>
                        <p class="mt-2 text-gray-600">Your photography session has been booked successfully.</p>
                        
                        <div class="mt-8 flex justify-center">
                            <a href="{{ route('booking.dashboard_booking') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                                View Your Bookings
                            </a>                      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>