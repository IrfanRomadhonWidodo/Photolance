<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use App\Models\Employee;
use App\Models\User;
use Filament\Widgets\ChartWidget;

class StatusDistributionChart extends ChartWidget
{
    protected static ?string $heading = 'Status Distribution';
    protected static ?int $sort = 5;
    protected static ?string $pollingInterval = '30s';
    
    protected function getType(): string
    {
        return 'radar';
    }
    
    protected function getData(): array
    {
        // Get status counts for bookings
        $pendingBookings = Booking::where('status', 'pending')->count();
        $confirmedBookings = Booking::where('status', 'confirmed')->count();
        $completedBookings = Booking::where('status', 'completed')->count();
        $cancelledBookings = Booking::where('status', 'cancelled')->count();
        
        // Get status counts for employees
        $pendingEmployees = Employee::where('status', 'pending')->count();
        $approvedEmployees = Employee::where('status', 'approved')->count();
        $rejectedEmployees = Employee::where('status', 'rejected')->count();
        
        return [
            'datasets' => [
                [
                    'label' => 'Bookings',
                    'data' => [$pendingBookings, $confirmedBookings, $completedBookings, $cancelledBookings, 0, 0, 0],
                    'fill' => true,
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgb(54, 162, 235)',
                    'pointBackgroundColor' => 'rgb(54, 162, 235)',
                    'pointBorderColor' => '#fff',
                    'pointHoverBackgroundColor' => '#fff',
                    'pointHoverBorderColor' => 'rgb(54, 162, 235)'
                ],
                [
                    'label' => 'Employees',
                    'data' => [0, 0, 0, 0, $pendingEmployees, $approvedEmployees, $rejectedEmployees],
                    'fill' => true,
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgb(255, 99, 132)',
                    'pointBackgroundColor' => 'rgb(255, 99, 132)',
                    'pointBorderColor' => '#fff',
                    'pointHoverBackgroundColor' => '#fff',
                    'pointHoverBorderColor' => 'rgb(255, 99, 132)'
                ],
            ],
            'labels' => [
                'Pending Bookings', 
                'Confirmed Bookings', 
                'Completed Bookings', 
                'Cancelled Bookings',
                'Pending Employees',
                'Approved Employees',
                'Rejected Employees',
            ],
        ];
    }
    
    protected function getOptions(): array
    {
        return [
            'scales' => [
                'r' => [
                    'angleLines' => [
                        'display' => true,
                    ],
                    'suggestedMin' => 0,
                ],
            ],
            'plugins' => [
                'legend' => [
                    'position' => 'bottom',
                ],
            ],
        ];
    }
}