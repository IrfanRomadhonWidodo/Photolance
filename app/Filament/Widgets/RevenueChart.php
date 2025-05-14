<?php

namespace App\Filament\Widgets;

use App\Models\Payment;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class RevenueChart extends ChartWidget
{
    protected static ?string $heading = 'Monthly Revenue';
    protected static ?int $sort = 3;
    protected static ?string $pollingInterval = '30s';
    
    protected function getType(): string
    {
        return 'bar';
    }
    
    protected function getData(): array
    {
        // Get data for the last 6 months
        $data = $this->getMonthlyRevenueData(6);
        
        return [
            'datasets' => [
                [
                    'label' => 'Monthly Revenue (IDR)',
                    'data' => array_values($data['revenue']),
                    'backgroundColor' => [
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(201, 203, 207, 0.6)',
                    ],
                    'borderColor' => [
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 99, 132)',
                        'rgb(201, 203, 207)',
                    ],
                    'borderWidth' => 1
                ],
            ],
            'labels' => array_values($data['months']),
        ];
    }
    
    private function getMonthlyRevenueData(int $monthsCount): array
    {
        $months = [];
        $revenue = [];
        
        // Get approved payments grouped by month
        $payments = Payment::where('status', 'approved')
            ->where('created_at', '>=', Carbon::now()->subMonths($monthsCount)->startOfMonth())
            ->select(
                DB::raw('YEAR(created_at) as year'),
                DB::raw('MONTH(created_at) as month'),
                DB::raw('SUM(amount) as total_amount')
            )
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();
            
        // Create arrays for each month
        for ($i = $monthsCount - 1; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $yearMonth = $date->format('Y-m');
            $monthName = $date->format('M Y');
            
            $months[$yearMonth] = $monthName;
            $revenue[$yearMonth] = 0; // Default value
            
            // Match data from query
            foreach ($payments as $payment) {
                $paymentYearMonth = Carbon::createFromDate($payment->year, $payment->month, 1)->format('Y-m');
                
                if ($paymentYearMonth === $yearMonth) {
                    $revenue[$yearMonth] = (float) $payment->total_amount;
                    break;
                }
            }
        }
        
        return [
            'months' => $months,
            'revenue' => $revenue,
        ];
    }
    
    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'callback' => '(value) => "Rp " + value.toLocaleString()',
                    ],
                ],
            ],
            'plugins' => [
                'tooltip' => [
                    'callbacks' => [
                        'label' => '(context) => "Rp " + context.parsed.y.toLocaleString()',
                    ],
                ],
            ],
        ];
    }
}