<?php
namespace App\Helpers;

use App\Models\TransaksiPelanggan;
use App\Models\TransaksiSupplier;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PendapatanHelper{
    public function getPendapatanHarian($yesterWeek = false)
    {

        if ($yesterWeek) {
            $start = Carbon::now()->subWeeks(2)->format('Y-m-d') . ' 00:00:01';
            $end = Carbon::now()->subWeek()->subDay()->format('Y-m-d') . ' 23:59:59';
        } else {
            $start = Carbon::now()->subWeek()->addDay()->format('Y-m-d') . ' 00:00:01';
            $end = Carbon::now()->format('Y-m-d') . ' 23:59:59';
        }


        //mendapat total penjualan dalam rentang waktu seminggu
        $sales = TransaksiPelanggan::select(DB::raw('DATE(created_at) as date'), DB::raw('sum(total_harga) as total'))
            ->whereBetween('created_at', [$start, $end])
            ->groupBy('date')
            ->get()->pluck('total', 'date')->all();

        if ($yesterWeek) {
            for ($i = Carbon::now()->subWeeks(2); $i <= Carbon::now()->subWeek()->subDay(); $i->addDay()) {
                $date = $i->format('Y-m-d');
                if (!isset($sales[$date])) {
                    $sales[$date] = 0;
                }
            }
        } else {
            for ($i = Carbon::now()->subWeek()->addDay(); $i <= Carbon::now(); $i->addDay()) {
                $date = $i->format('Y-m-d');
                if (!isset($sales[$date])) {
                    $sales[$date] = 0;
                }
            }
        }

        return collect($sales)->sortKeys()->all();

    }

    //get weekly sales
    public function getPendapatanMingguan($yesterMonth = false)
    {

        if ($yesterMonth) {
            $start = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->format('Y-m-d') . ' 00:00:01';
            $end = Carbon::now()->subMonthsNoOverflow()->endOfMonth()->format('Y-m-d') . ' 23:59:59';
        } else {
            $start = Carbon::now()->startOfMonth()->format('Y-m-d') . ' 00:00:01';
            $end = Carbon::now()->endOfMonth()->format('Y-m-d') . ' 23:59:59';
        }


        //mendapat total penjualan dalam rentang waktu seminggu
        $sales = TransaksiPelanggan::select(DB::raw('DATE(created_at) as date'), DB::raw('sum(total_harga) as total'))
            ->whereBetween('created_at', [$start, $end])
            ->groupBy('date')
            ->get()->pluck('total', 'date')->all();

        if ($yesterMonth) {
            for ($i = Carbon::now()->startOfMonth()->subMonthsNoOverflow(); $i <= Carbon::now()->subMonthsNoOverflow()->endOfMonth(); $i->addDay()) {
                $date = $i->format('Y-m-d');
                if (!isset($sales[$date])) {
                    $sales[$date] = 0;
                }
            }
        } else {
            for ($i = Carbon::now()->startOfMonth(); $i <= now()->endOfMonth()->format('Y-m-d'); $i->addDay()) {
                $date = $i->format('Y-m-d');
                if (!isset($sales[$date])) {
                    $sales[$date] = 0;
                }
            }
        }

        return collect($sales)->sortKeys()->all();

    }

    public function getPendapatanBulanan($yesterYear = false)
    {

        if ($yesterYear) {
            $start = Carbon::now()->startOfYear()->subYearsNoOverflow()->format('Y-m-d') . ' 00:00:01';
            $end = Carbon::now()->subYearsNoOverflow()()->endOfYear()->format('Y-m-d') . ' 23:59:59';
        } else {
            $start = Carbon::now()->startOfYear()->format('Y-m-d') . ' 00:00:01';
            $end = Carbon::now()->endOfYear()->format('Y-m-d') . ' 23:59:59';
        }



        //get monthly sales
        $sales = TransaksiPelanggan::select(DB::raw('MONTH(created_at) as month'), DB::raw('sum(total_harga) as total'))
            ->whereBetween('created_at', [$start, $end])
            ->groupBy('month')
            ->get()->pluck('total', 'month')->all();

        if ($yesterYear) {
            for ($i = Carbon::now()->startOfYear()->subYearsNoOverflow(); $i <= Carbon::now()->subYearsNoOverflow()->endOfYear(); $i->addMonth()) {
                $month = $i->format('m');
                if (!isset($sales[$month])) {
                    $sales[$month] = 0;
                }
            }
        } else {
            for ($i = Carbon::now()->startOfYear(); $i <= Carbon::now()->endOfYear(); $i->addMonth()) {
                $month = $i->format('m');
                if (!isset($sales[$month])) {
                    $sales[$month] = 0;
                }
            }
        }

        return response()->json($sales);


    }
}
?>
