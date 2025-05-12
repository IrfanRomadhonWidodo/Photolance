<div class="space-y-6">
    <!-- Pending Bookings Section -->
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900 mb-4">{{ __('Pending Bookings') }}</h3>
            
            @if($pendingBookings->isEmpty())
                <p class="text-gray-500">{{ __('No pending bookings available.') }}</p>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Booking ID') }}
                                </th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Time Slots') }}
                                </th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Price') }}
                                </th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Status') }}
                                </th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Action') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pendingBookings as $booking)
                                <tr>
                                    <td class="py-3 px-4 border-b border-gray-200">
                                        #{{ $booking->id }}
                                    </td>
                                    <td class="py-3 px-4 border-b border-gray-200">
                                        {{ count($booking->time_slots) }} slot(s)
                                    </td>
                                    <td class="py-3 px-4 border-b border-gray-200">
                                        Rp {{ number_format($booking->calculatePrice(), 0, ',', '.') }}
                                    </td>
                                    <td class="py-3 px-4 border-b border-gray-200">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            {{ ucfirst($booking->status) }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-4 border-b border-gray-200">
                                        <a href="{{ route('payment.show', $booking) }}" class="text-indigo-600 hover:text-indigo-900">
                                            {{ __('Pay Now') }}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

    <!-- Processing Payments Section -->
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900 mb-4">{{ __('Processing Payments') }}</h3>
            
            @if($processingPayments->isEmpty())
                <p class="text-gray-500">{{ __('No processing payments available.') }}</p>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Payment ID') }}
                                </th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Booking ID') }}
                                </th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Amount') }}
                                </th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Method') }}
                                </th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Status') }}
                                </th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Paid At') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($processingPayments as $payment)
                                <tr>
                                    <td class="py-3 px-4 border-b border-gray-200">
                                        #{{ $payment->id }}
                                    </td>
                                    <td class="py-3 px-4 border-b border-gray-200">
                                        #{{ $payment->booking_id }}
                                    </td>
                                    <td class="py-3 px-4 border-b border-gray-200">
                                        Rp {{ number_format($payment->amount, 0, ',', '.') }}
                                    </td>
                                    <td class="py-3 px-4 border-b border-gray-200">
                                        {{ strtoupper($payment->payment_method) }}
                                    </td>
                                    <td class="py-3 px-4 border-b border-gray-200">
                                        @if($payment->status === 'pending')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                {{ __('Pending') }}
                                            </span>
                                        @elseif($payment->status === 'processed')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                {{ __('Processed') }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-4 border-b border-gray-200">
                                        {{ $payment->paid_at ? $payment->paid_at->format('d M Y H:i') : '-' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

    <!-- Completed Payments Section -->
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900 mb-4">{{ __('Completed Payments') }}</h3>
            
            @if($completedPayments->isEmpty())
                <p class="text-gray-500">{{ __('No completed payments available.') }}</p>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Payment ID') }}
                                </th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Booking ID') }}
                                </th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Amount') }}
                                </th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Method') }}
                                </th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Status') }}
                                </th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Paid At') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($completedPayments as $payment)
                                <tr>
                                    <td class="py-3 px-4 border-b border-gray-200">
                                        #{{ $payment->id }}
                                    </td>
                                    <td class="py-3 px-4 border-b border-gray-200">
                                        #{{ $payment->booking_id }}
                                    </td>
                                    <td class="py-3 px-4 border-b border-gray-200">
                                        Rp {{ number_format($payment->amount, 0, ',', '.') }}
                                    </td>
                                    <td class="py-3 px-4 border-b border-gray-200">
                                        {{ strtoupper($payment->payment_method) }}
                                    </td>
                                    <td class="py-3 px-4 border-b border-gray-200">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            {{ __('Approved') }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-4 border-b border-gray-200">
                                        {{ $payment->paid_at ? $payment->paid_at->format('d M Y H:i') : '-' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>