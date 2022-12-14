<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

use App\Models\Barang;
use App\Models\User;

use App\Providers\SisaStokEvent;

use App\Notifications\SisaStokNotification;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SisaStokListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Providers\SisaStokEvent  $event
     * @return void
     */
    public function handle(SisaStokEvent $event)
    {
        //
        $id_barang = $event->id_barang;
        $batasMinimal = $event->batasMinimal;
        $stok_barang = Barang::where('id',$id_barang)->value('total_stok');
        $nama_barang = Barang::join('produk','barang.produk_id','=','produk.id')->where('barang.id',$id_barang)->value('nama_produk');
        if($stok_barang <= $batasMinimal){
            $detail = [
                'barang_id' => $id_barang,
                'nama_barang' => $nama_barang,
                'sisa_stok' => $stok_barang,

            ];
            if(!DB::table('notifications')->where('type','App\Notifications\SisaStokNotification')->where('data->barang_id',$id_barang)->exists()){
                $users = User::all();
                Notification::send($users, new SisaStokNotification($detail));
            } else {
                DB::table('notifications')->where('type','App\Notifications\SisaStokNotification')->where('data->barang_id',$id_barang)->update(['data' => json_encode($detail)]);
            }
        }
        else{
            if(DB::table('notifications')->where('type','App\Notifications\SisaStokNotification')->where('data->barang_id',$id_barang)->exists()){
                DB::table('notifications')->where('type','App\Notifications\SisaStokNotification')->where('data->barang_id',$id_barang)->delete();
            }
            return;
        }

    }
}
