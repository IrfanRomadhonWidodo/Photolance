<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use App\Models\Employee;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class BookingsChart extends ChartWidget
{
    protected static ?string $heading = 'Bookings Trends';
    protected static ?int $sort = 2;
    protected static ?string $pollingInterval = '30s'; 
    
    protected function getType(): string
    {
        return 'line';
    }
    
    protected function getData(): array
    {
        $data = $this->getBookingDataForLastDays(7);
        
        return [
            'datasets' => [
                [
                    'label' => 'New Bookings',
                    'data' => array_values($data['counts']),
                    'fill' => false,
                    'borderColor' => 'rgb(75, 192, 192)',
                    'tension' => 0.1,
                    'pointBackgroundColor' => 'rgb(75, 192, 192)',
                    'pointRadius' => 4,
                ],
                [
                    'label' => 'Completed Bookings',
                    'data' => array_values($data['completed']),
                    'fill' => false,
                    'borderColor' => 'rgb(54, 162, 235)',
                    'tension' => 0.1,
                    'pointBackgroundColor' => 'rgb(54, 162, 235)',
                    'pointRadius' => 4,
                ],
            ],
            'labels' => array_values($data['dates']),
        ];
    }
    
    private function getBookingDataForLastDays(int $days): array
    {
        $startDate = Carbon::now()->subDays($days)->startOfDay();
        
        $bookings = Booking::where('created_at', '>=', $startDate)
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as count')
            )
            ->groupBy('date')
            ->get()
            ->keyBy('date')
            ->map(fn ($item) => $item->count)
            ->toArray();
            
        $completedBookings = Booking::where('created_at', '>=', $startDate)
            ->where('status', 'completed')
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as count')
            )
            ->groupBy('date')
            ->get()
            ->keyBy('date')
            ->map(fn ($item) => $item->count)
            ->toArray();
        
        $dates = [];
        $counts = [];
        $completed = [];
        
        // Create arrays for each day
        for ($i = $days - 1; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $formattedDate = Carbon::now()->subDays($i)->format('M d');
            
            $dates[$date] = $formattedDate;
            $counts[$date] = $bookings[$date] ?? 0;
            $completed[$date] = $completedBookings[$date] ?? 0;
        }
        
        return [
            'dates' => $dates,
            'counts' => $counts,
            'completed' => $completed,
        ];
    }
    
    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'stepSize' => 1,
                    ],
                ],
            ],
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'top',
                ],
                'tooltip' => [
                    'enabled' => true,
                ],
            ],
        ];
    }
}