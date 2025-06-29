<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function index()
    {
    $userId = Auth::id();
    
    $bookings = Booking::where('user_id', $userId)
                       ->with('employee')
                       ->get();
                       
    return view('booking.dashboard_booking', compact('bookings'));
    }

    public function create()
    {
        $photographers = Employee::approved()->get();
        $categories = [
            'Pre-Wedding', 
            'Wedding', 
            'Family', 
            'Portrait', 
            'Wisuda', 
            'Foto Produk', 
            'Event', 
            'Foto Kuliner', 
            'Foto Properti', 
            'Foto Korporat'
        ];
        
        $timeSlots = [];
        for ($hour = 8; $hour < 19; $hour++) {
            $start = sprintf('%02d:00', $hour);
            $end = sprintf('%02d:00', $hour + 1);
            $timeSlots[] = [
                'value' => $hour,
                'label' => "$start - $end"
            ];
        }
        
        return view('booking.create', compact('photographers', 'categories', 'timeSlots'));
    }

    public function checkAvailability(Request $request)
    {
        $request->validate([
            'photographer_id' => 'required|exists:employees,id',
            'date' => 'required|date|after_or_equal:today',
        ]);

        $date = $request->date;
        $photographerId = $request->photographer_id;

        $bookings = Booking::where('employee_id', $photographerId)
            ->where('booking_date', $date)
            ->get();

        $bookedSlots = [];
        foreach ($bookings as $booking) {
            $bookedSlots = array_merge($bookedSlots, $booking->time_slots);
        }

        return response()->json([
            'booked_slots' => $bookedSlots,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'photographer_id' => 'required|exists:employees,id',
            'booking_date' => 'required|date|after_or_equal:today',
            'time_slots' => 'required|array',
            'time_slots.*' => 'required|integer|min:8|max:18',
            'category' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $date = $request->booking_date;
        $photographerId = $request->photographer_id;
        $selectedSlots = $request->time_slots;

        $existingBookings = Booking::where('employee_id', $photographerId)
            ->where('booking_date', $date)
            ->get();

        $bookedSlots = [];
        foreach ($existingBookings as $booking) {
            $bookedSlots = array_merge($bookedSlots, $booking->time_slots);
        }

        $conflict = false;
        foreach ($selectedSlots as $slot) {
            if (in_array($slot, $bookedSlots)) {
                $conflict = true;
                break;
            }
        }

        if ($conflict) {
            return back()->with('error', 'Satu atau beberapa slot waktu yang Anda pilih sudah dipesan. Silakan pilih slot waktu yang berbeda.');
        }

        // Create the booking
        $booking = new Booking();
        $booking->user_id = Auth::id();
        $booking->employee_id = $photographerId;
        $booking->booking_date = $date;
        $booking->time_slots = $selectedSlots;
        $booking->category = $request->category;
        $booking->notes = $request->notes;
        $booking->save();

        return redirect()->route('booking.success');
    }

    public function success()
    {
        return view('booking.success');
    }
}