<?php

namespace App\Filament\Resources\TemperatureResource\Widgets;

use App\Models\Temperature;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class TemperatureChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static string $chartId = 'temperatureChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Temperatura - Ultimas 24 horas';

    protected static ?string $pollingInterval = '5s';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {
        $temperatures = Temperature::where('created_at', '>=', now()->subHour(2))
            ->orderBy('created_at')
            ->get();

        return [
            'chart' => [
                'type' => 'line',
                'height' => 300,
                'zoom' => [
                    'enabled' => false,
                ],
            ],
            'series' => [
                [
                    'name' => 'Temperatura (°C)',
                    'data' => $temperatures->map(fn($t) => [
                        'x' => $t->created_at->toIso8601String(),
                        'y' => floatval($t->valor),
                    ]),
                ],
            ],
            'xaxis' => [
                'type' => 'datetime',
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                        'rotate' => -45,
                    ],
                ],
            ],
            'yaxis' => [
                'title' => ['text' => '°C'],
                'min' => 0,
                'max' => 50,
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                    ],
                ],
            ],
            'colors' => ['#10b981'], // Color verde
            'stroke' => [
                'curve' => 'smooth',
            ],
        ];
    }
}
