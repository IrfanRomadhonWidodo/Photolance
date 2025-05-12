<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PaymentController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display the payment dashboard.
     */
    public function dashboard()
    {
        $user = Auth::user();
        $pendingBookings = Booking::where('user_id', $user->id)
            ->where('status', 'pending')
            ->with('payment')
            ->get();
            
        $processingPayments = Payment::where('user_id', $user->id)
            ->whereIn('status', ['pending', 'processed'])
            ->with('booking')
            ->get();
            
        $completedPayments = Payment::where('user_id', $user->id)
            ->where('status', 'approved')
            ->with('booking')
            ->get();
            
        return view('payment.dashboard', compact('pendingBookings', 'processingPayments', 'completedPayments'));
    }

    /**
     * Show the payment form for a specific booking.
     */
    public function show(Booking $booking)
    {
        $this->authorize('view', $booking);
        
        // Check if payment already exists
        $payment = Payment::where('booking_id', $booking->id)->first();
        
        if (!$payment) {
            $amount = $booking->calculatePrice();
            
            // Create new payment
            $payment = Payment::create([
                'user_id' => Auth::id(),
                'booking_id' => $booking->id,
                'amount' => $amount,
                'payment_method' => 'qris',
                'status' => 'pending',
            ]);
        }
        
        return view('payment.show', compact('booking', 'payment'));
    }
    
    /**
     * Process the payment status change.
     */
    public function processPayment(Request $request, Payment $payment)
    {
        $this->authorize('update', $payment);
        
        $payment->status = 'processed';
        $payment->paid_at = now();
        $payment->save();
        
        // Update the booking status
        $booking = $payment->booking;
        $booking->status = 'confirmed';
        $booking->save();
        
        return redirect()->route('payment.dashboard')->with('success', 'Pembayaran berhasil diproses dan sedang menunggu konfirmasi admin.');
    }
    
    /**
     * Complete the payment process and redirect to booking dashboard.
     */
    public function complete(Payment $payment)
    {
        $this->authorize('view', $payment);
        
        return redirect()->route('booking.dashboard_booking')->with('success', 'Proses pembayaran telah selesai.');
    }

}