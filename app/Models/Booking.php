<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'bookings';

    protected $fillable = [
        'user_id',
        'employee_id',
        'booking_date',
        'time_slots',
        'category',
        'notes',
        'status',
    ];

    protected $casts = [
        'booking_date' => 'date',
        'time_slots' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

        public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }

    public function calculatePrice(): float
    {
        $slotsCount = count($this->time_slots);
        return $slotsCount * 50000;
    }
}
