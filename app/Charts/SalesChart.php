<?php

namespace App\Charts;


use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;



class SalesChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function harian($data): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $day = array_keys($data);

        foreach ($day as $key => $value) {
            $day[$key] = Carbon::parse($value)->format('l');
        }

        $data = array_values($data);
        return $this->chart->barChart()
            ->setTitle('Pendapatan Harian.')
            ->setSubtitle('Pendapatan Harian Minggu Ini vs Minggu Lalu.')
            ->addData('Minggu Ini', $data)
            ->addData('Minggu Lalu', [700, 1229, 7007, 28000, 6655, 1145,6600,12144])
            ->setXAxis($day)
            ->setGrid();
    }

    public function mingguan(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        return $this->chart->lineChart()
            ->setTitle('Sales during 2021.')
            ->setSubtitle('Physical sales vs Digital sales.')
            ->addData('Physical sales', [40, 93, 35, 42, 18, 82])
            ->addData('Digital sales', [70, 29, 77, 28, 55, 45])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
    }

    public function bulanan(): \ArielMejiaDev\LarapexCharts\BarChart
    {

        return $this->chart->barChart()
            ->setTitle('Penjualan Minggu Ini.')
            ->setSubtitle('Physical sales vs Digital sales.')
            ->addData('Minggu Ini', [70, 29, 77, 28, 55, 45,66,44])
            ->addData('Digital sales', [70, 29, 77, 28, 55, 45,66,44])
            ->setXAxis(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']);
    }



}
