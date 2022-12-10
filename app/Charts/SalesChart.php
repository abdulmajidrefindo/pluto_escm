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
            ->addData('Bulan Ini', $bulanIni)
            ->addData('Bulan Lalu', $bulanLalu)
            ->setXAxis($day)
            ->setGrid();
    }

    public function bulanan($tahunIni, $tahunLalu): \ArielMejiaDev\LarapexCharts\AreaChart
    {
        $day = array_keys($tahunIni);
        foreach ($day as $key => $value) {
            $day[$key] = Carbon::createFromFormat('m', $value)->format('F');
        }
        $tahunIni = array_values($tahunIni);
        $tahunLalu = array_values($tahunLalu);

        return $this->chart->AreaChart()
            ->setTitle('Pendapatan Tahun Ini.')
            ->setSubtitle('Pendapatan Tahun Ini vs Pendapatan Tahun Lalu.')
            ->addData('Tahun Ini', $tahunIni)
            ->addData('Tahun Lalu', $tahunLalu)
            ->setXAxis($day)
            ->setGrid();
    }



}
