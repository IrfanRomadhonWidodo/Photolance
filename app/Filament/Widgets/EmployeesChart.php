<?php

namespace App\Filament\Widgets;

use App\Models\Employee;
use Filament\Widgets\ChartWidget;

class EmployeesChart extends ChartWidget
{
    protected static ?string $heading = 'Employees by Category';
    protected static ?int $sort = 4;
    
    protected function getType(): string
    {
        return 'doughnut';
    }
    
    protected function getData(): array
    {
        // Get counts of employees by category
        $photographers = Employee::where('kategori', 'photographer')->count();
        $makeupArtists = Employee::where('kategori', 'makeup_artist')->count();
        
        // Get counts of employees by status
        $pending = Employee::where('status', 'pending')->count();
        $approved = Employee::where('status', 'approved')->count();
        $rejected = Employee::where('status', 'rejected')->count();
        
        return [
            'datasets' => [
                [
                    'label' => 'Employees',
                    'data' => [$photographers, $makeupArtists],
                    'backgroundColor' => [
                        'rgb(54, 162, 235)',
                        'rgb(255, 99, 132)',
                    ],
                    'hoverOffset' => 4,
                ],
            ],
            'labels' => ['Photographer', 'Makeup Artist'],
        ];
    }
    
    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'position' => 'bottom',
                ],
                'tooltip' => [
                    'callbacks' => [
                        'label' => '(context) => `${context.label}: ${context.parsed} (${Math.round(context.parsed / context.dataset.data.reduce((a, b) => a + b, 0) * 100)}%)`',
                    ],
                ],
            ],
            'cutout' => '70%',
        ];
    }
}