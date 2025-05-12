{{-- resources/views/booking/dashboard_booking.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-1xl text-gray-900 leading-tight">
            {{ __('Pemesananku') }}
        </h2>
    </x-slot>

        <div class="max-w-screen-md ml-9 mt-7">
        <a href="{{ route('dashboard') }}" 
        class="w-fit inline-flex items-center gap-2 px-4 py-2 border border-blue-600 text-blue-600 font-medium rounded-lg transition duration-200 hover:bg-blue-600 hover:text-white ml-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Home
        </a>
    </div>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl">
                <div class="p-8 bg-gradient-to-r from-blue-50 to-white border-b border-gray-200 rounded-t-2xl">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-semibold text-gray-900">Pesanan Fotografi Anda</h2>
                        <a href="{{ route('booking.create') }}" class="px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-full hover:from-blue-600 hover:to-blue-700 transition duration-300 ease-in-out">
                            Pesan Baru
                        </a>
                    </div>

                    @if(session('success'))
                        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-md">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg shadow-md">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if(!empty($bookings) && $bookings->count() > 0)
                        <div class="overflow-x-auto bg-white rounded-lg shadow-lg p-4">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gradient-to-r from-blue-200 to-blue-100">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Fotografer
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Tanggal
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Waktu
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Kategori
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($bookings as $booking)
                                        <tr class="hover:bg-blue-50 transition duration-300 ease-in-out">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="font-medium text-gray-900">{{ $booking->employee->name }}</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $booking->booking_date->format('d M Y') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @php
                                                    $formattedSlots = [];
                                                    foreach ($booking->time_slots as $hour) {
                                                        $start = sprintf('%02d:00', $hour);
                                                        $end = sprintf('%02d:00', $hour + 1);
                                                        $formattedSlots[] = "$start - $end";
                                                    }
                                                    echo implode(', ', $formattedSlots);
                                                @endphp
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $booking->category }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                    @if($booking->status == 'confirmed') bg-green-100 text-green-800
                                                    @elseif($booking->status == 'pending') bg-yellow-100 text-yellow-800
                                                    @elseif($booking->status == 'completed') bg-blue-100 text-blue-800
                                                    @else bg-red-100 text-red-800 @endif">
                                                    {{ ucfirst($booking->status) }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-10">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada pemesanan</h3>
                            <p class="mt-1 text-sm text-gray-500">Mulai dengan membuat pemesanan baru.</p>
                            <div class="mt-6">
                                <a href="{{ route('booking.create') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-full hover:from-blue-600 hover:to-blue-700 transition duration-300 ease-in-out">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    Pesan Baru
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
        <!-- Memanggil Footer -->
    @include('footer')
</x-app-layout>
