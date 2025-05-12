<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-800 leading-tight">
            {{ __('Payment Details') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-blue-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-2xl">
                <div class="p-8 bg-white border border-blue-100 rounded-2xl">
                    <!-- Payment Information -->
                    <div class="mb-8">
                        <h3 class="text-xl font-semibold text-blue-800 mb-4">{{ __('Informasi Pembayaran') }}</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-blue-700">
                            <div>
                                <p class="text-sm text-blue-500">{{ __('Booking ID') }}:</p>
                                <p class="font-semibold">#{{ $booking->id }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-blue-500">{{ __('Jumlah') }}:</p>
                                <p class="font-semibold">Rp {{ number_format($payment->amount, 0, ',', '.') }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-blue-500">{{ __('Time Slots') }}:</p>
                                <p class="font-semibold">{{ count($booking->time_slots) }} slot(s)</p>
                            </div>
                            <div>
                                <p class="text-sm text-blue-500">{{ __('Status') }}:</p>
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
                        <h3 class="text-xl font-semibold text-blue-800 mb-4">{{ __('Pilih Metode Pembayaran') }}</h3>
                        <button id="qris-btn" type="button"
                            class="inline-flex items-center px-5 py-2 bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white font-semibold text-sm rounded-lg transition duration-150">
                            {{ __('Bayar Menggunakan QRIS') }}
                        </button>
                    </div>

                    <!-- QRIS Modal -->
                    <div id="qris-modal" class="fixed inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto hidden z-50">
                        <div class="relative top-24 mx-auto p-6 border w-96 shadow-2xl rounded-xl bg-white">
                            <div class="flex flex-col items-center">
                                <h3 class="text-lg font-semibold text-blue-800 mb-4">{{ __('Scan QR Code to Pay') }}</h3>
                                <div class="p-2 border border-blue-200 rounded-lg mb-4 w-full">
                                    <img src="{{ asset('img/qris.png') }}" alt="QRIS QR Code" class="w-full h-auto rounded-md">
                                </div>
                                <p class="text-sm text-blue-600 mb-4">{{ __('Amount: Rp ') }}{{ number_format($payment->amount, 0, ',', '.') }}</p>

                                @if($payment->status === 'pending')
                                    <form action="{{ route('payment.process', $payment) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="px-4 py-2 bg-green-600 hover:bg-green-700 active:bg-green-800 text-white font-semibold text-xs rounded-lg transition duration-150">
                                            {{ __('Submit Pembayaran') }}
                                        </button>
                                    </form>
                                @endif

                                <button id="close-modal"
                                    class="mt-4 px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-700 font-semibold text-xs rounded-lg transition duration-150">
                                    {{ __('Tutup') }}
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Back to Dashboard Button -->
                    <div class="mt-4">
                        <a href="{{ route('payment.dashboard') }}"
                            class="inline-flex items-center px-5 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold text-sm rounded-lg transition duration-150">
                            {{ __('Kembali') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Modal -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const qrisBtn = document.getElementById('qris-btn');
            const qrisModal = document.getElementById('qris-modal');
            const closeModal = document.getElementById('close-modal');

            qrisBtn.addEventListener('click', () => qrisModal.classList.remove('hidden'));
            closeModal.addEventListener('click', () => qrisModal.classList.add('hidden'));

            window.addEventListener('click', (event) => {
                if (event.target === qrisModal) qrisModal.classList.add('hidden');
            });
        });
    </script>
</x-app-layout>
