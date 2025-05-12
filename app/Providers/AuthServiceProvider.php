<?php

namespace App\Providers;

use App\Models\Booking;
use App\Models\Payment;
use App\Policies\BookingPolicy;
use App\Policies\PaymentPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // Add these two lines to your existing policies array
        Booking::class => BookingPolicy::class,
        Payment::class => PaymentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // You can add any additional Gate definitions here if needed
    }
}