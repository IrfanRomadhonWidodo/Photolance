<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Payment Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Payment Information -->
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-2">{{ __('Payment Information') }}</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm text-gray-600">{{ __('Booking ID') }}:</p>
                                <p class="font-medium">#{{ $booking->id }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">{{ __('Amount') }}:</p>
                                <p class="font-medium">Rp {{ number_format($payment->amount, 0, ',', '.') }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">{{ __('Time Slots') }}:</p>
                                <p class="font-medium">{{ count($booking->time_slots) }} slot(s)</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">{{ __('Status') }}:</p>
                                <p class="font-medium">
                                    @if($payment->status === 'pending')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            {{ __('Pending') }}
                                        </span>
                                    @elseif($payment->status === 'processed')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            {{ __('Processed') }}
                                        </span>
                                    @elseif($payment->status === 'approved')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            {{ __('Approved') }}
                                        </span>
                                    @else
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            {{ __('Rejected') }}
                                        </span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Method Selection -->
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-2">{{ __('Select Payment Method') }}</h3>
                        
                        <!-- QRIS Payment Method -->
                        <div class="mt-4">
                            <button id="qris-btn" type="button" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                                <span>{{ __('Pay with QRIS') }}</span>
                            </button>
                        </div>
                    </div>

                    <!-- QRIS Modal -->
                    <div id="qris-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
                        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                            <div class="flex flex-col items-center">
                                <h3 class="text-lg font-medium text-gray-900 mb-4">{{ __('Scan QR Code to Pay') }}</h3>
                                <div class="p-2 border border-gray-200 rounded-md mb-4">
                                    <img src="{{ asset('img/qris.png') }}" alt="QRIS QR Code" class="w-full h-auto">
                                </div>
                                <p class="text-sm text-gray-600 mb-4">{{ __('Amount: Rp ') }}{{ number_format($payment->amount, 0, ',', '.') }}</p>
                                
                                @if($payment->status === 'pending')
                                    <form action="{{ route('payment.process', $payment) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">
                                            {{ __('I Have Paid') }}
                                        </button>
                                    </form>
                                @endif
                                
                                <button id="close-modal" class="mt-3 inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 active:bg-gray-500 focus:outline-none focus:border-gray-500 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    {{ __('Close') }}
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Back to Dashboard Button -->
                    <div class="mt-6">
                        <a href="{{ route('payment.dashboard') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 active:bg-gray-500 focus:outline-none focus:border-gray-500 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            {{ __('Back to Dashboard') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Modal Functionality -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const qrisBtn = document.getElementById('qris-btn');
            const qrisModal = document.getElementById('qris-modal');
            const closeModal = document.getElementById('close-modal');
            
            qrisBtn.addEventListener('click', function() {
                qrisModal.classList.remove('hidden');
            });
            
            closeModal.addEventListener('click', function() {
                qrisModal.classList.add('hidden');
            });
            
            // Close modal when clicking outside of it
            window.addEventListener('click', function(event) {
                if (event.target === qrisModal) {
                    qrisModal.classList.add('hidden');
                }
            });
        });
    </script>
</x-app-layout>