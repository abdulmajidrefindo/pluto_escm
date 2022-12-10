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

    public function harian($mingguIni, $mingguLalu): \ArielMejiaDev\LarapexCharts\AreaChart
    {
        $day = array_keys($mingguIni);

        foreach ($day as $key => $value) {
            $day[$key] = Carbon::parse($value)->format('l');
        }

        $mingguIni = array_values($mingguIni);
        $mingguLalu = array_values($mingguLalu);
        return $this->chart->AreaChart()
            ->setTitle('Pendapatan Harian.')
            ->setSubtitle('Pendapatan Harian Minggu Ini vs Minggu Lalu.')
            ->addData('Minggu Ini', $mingguIni)
            ->addData('Minggu Lalu', $mingguLalu)
            ->setXAxis($day)
            ->setGrid();
    }

    public function mingguan($bulanIni, $bulanLalu): \ArielMejiaDev\LarapexCharts\AreaChart
    {

        if (count($bulanIni) >= $bulanLalu) {
            $day = array_keys($bulanIni);
        } else {
            $day = array_keys($bulanLalu);
        }

        foreach ($day as $key => $value) {
            $day[$key] = Carbon::parse($value)->format('d');
        }

        $bulanIni = array_values($bulanIni);
        $bulanLalu = array_values($bulanLalu);

        return $this->chart->AreaChart()
            ->setTitle('Pendapatan Bulan Ini.')
            ->setSubtitle('Pendapatan Bulan Ini vs Pendapatan Bulan Lalu.')
            ->addData('Physical sales', $bulanIni)
            ->addData('Digital sales', $bulanLalu)
            ->setXAxis($day)
            ->setGrid();
    }

    public function bulanan(): \ArielMejiaDev\LarapexCharts\BarChart
    {

        return $this->chart->barChart()
            ->setTitle('Penjualan Minggu Ini.')
            ->setSubtitle('Physical sales vs Digital sales.')
            ->addData('Minggu Ini', [70, 29, 77, 28, 55, 45, 66, 44])
            ->addData('Digital sales', [70, 29, 77, 28, 55, 45, 66, 44])
            ->setXAxis(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']);
    }



}
