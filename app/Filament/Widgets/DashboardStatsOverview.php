<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use App\Models\Employee;
use App\Models\Feedback;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '15s';
    
    protected function getStats(): array
    {
        $totalRevenue = Payment::where('status', 'approved')->sum('amount');
        $formattedRevenue = 'Rp ' . number_format($totalRevenue, 0, ',', '.');
        
        $pendingPayments = Payment::where('status', 'pending')->count();
        $pendingBookings = Booking::where('status', 'pending')->count();
        
        $totalUsers = User::count();
        $totalEmployees = Employee::count();
        
        $completedBookingsCount = Booking::where('status', 'completed')->count();
        $totalBookingsCount = Booking::count();
        $bookingCompletionRate = $totalBookingsCount > 0 
            ? round(($completedBookingsCount / $totalBookingsCount) * 100) 
            : 0;
            
        return [
            Stat::make('Total Users', $totalUsers)
                ->description('Active users on platform')
                ->descriptionIcon('heroicon-m-users')
                ->chart([7, 8, 10, 12, 14, 16, $totalUsers])
                ->color('success'),
                
            Stat::make('Total Revenue', $formattedRevenue)
                ->description('From approved payments')
                ->descriptionIcon('heroicon-m-banknotes')
                ->chart([15000000, 18000000, 20000000, 22000000, 24000000, $totalRevenue])
                ->color('success'),
                
            Stat::make('Bookings Completion', $bookingCompletionRate . '%')
                ->description($completedBookingsCount . ' of ' . $totalBookingsCount . ' bookings')
                ->descriptionIcon('heroicon-m-calendar')
                ->chart([65, 70, 72, 74, 75, $bookingCompletionRate])
                ->color('info'),
                
            Stat::make('Pending Tasks', $pendingBookings + $pendingPayments)
                ->description($pendingBookings . ' bookings, ' . $pendingPayments . ' payments')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),
        ];
    }
}