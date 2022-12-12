<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TransaksiBarangPemasokTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('transaksi_barang_pemasok')->delete();

        \DB::table('transaksi_barang_pemasok')->insert(array (
            0 =>
            array (
                'id' => 1,
                'transaksi_pemasok_id' => 3,
                'users_id' => 1,
                'barang_id' => 4,
                'status_transaksi' => 'Berhasil',
                'kuantitas' => 25,
                'total_harga' => 250000,
                'created_at' => '2022-12-29 17:46:22',
                'updated_at' => '2022-12-24 17:46:22',
            ),
            1 =>
            array (
                'id' => 2,
                'transaksi_pemasok_id' => 1,
                'users_id' => 1,
                'barang_id' => 3,
                'status_transaksi' => 'Berhasil',
                'kuantitas' => 50,
                'total_harga' => 250000,
                'created_at' => '2022-12-13 17:42:48',
                'updated_at' => '2022-12-23 17:42:48',
            ),
            2 =>
            array (
                'id' => 3,
                'transaksi_pemasok_id' => 1,
                'users_id' => 1,
                'barang_id' => 1,
                'status_transaksi' => 'Berhasil',
                'kuantitas' => 5,
                'total_harga' => 250000,
                'created_at' => '2022-12-12 17:18:55',
                'updated_at' => '2022-12-15 17:18:55',
            ),
            3 =>
            array (
                'id' => 4,
                'transaksi_pemasok_id' => 1,
                'users_id' => 1,
                'barang_id' => 2,
                'status_transaksi' => 'Berhasil',
                'kuantitas' => 2,
                'total_harga' => 250000,
                'created_at' => '2022-12-08 17:20:34',
                'updated_at' => '2022-12-09 17:20:34',
            ),
            4 =>
            array (
                'id' => 5,
                'transaksi_pemasok_id' => 1,
                'users_id' => 1,
                'barang_id' => 3,
                'status_transaksi' => 'Berhasil',
                'kuantitas' => 2,
                'total_harga' => 250000,
                'created_at' => '2022-12-29 17:21:53',
                'updated_at' => '2022-12-16 17:21:53',
            ),
            5 =>
            array (
                'id' => 6,
                'transaksi_pemasok_id' => 1,
                'users_id' => 1,
                'barang_id' => 6,
                'status_transaksi' => 'Berhasil',
                'kuantitas' => 2,
                'total_harga' => 250000,
                'created_at' => '2022-12-07 17:24:06',
                'updated_at' => '2022-12-08 17:24:06',
            ),
            6 =>
            array (
                'id' => 7,
                'transaksi_pemasok_id' => 2,
                'users_id' => 1,
                'barang_id' => 2,
                'status_transaksi' => 'Berhasil',
                'kuantitas' => 100,
                'total_harga' => 250000,
                'created_at' => '2022-12-22 17:26:49',
                'updated_at' => '2022-12-08 17:26:49',
            ),
            7 =>
            array (
                'id' => 8,
                'transaksi_pemasok_id' => 2,
                'users_id' => 1,
                'barang_id' => 6,
                'status_transaksi' => 'Berhasil',
                'kuantitas' => 2,
                'total_harga' => 250000,
                'created_at' => '2022-12-08 17:26:49',
                'updated_at' => '2022-12-29 17:26:49',
            ),
            8 =>
            array (
                'id' => 9,
                'transaksi_pemasok_id' => 1,
                'users_id' => 1,
                'barang_id' => 3,
                'status_transaksi' => 'Berhasil',
                'kuantitas' => 50,
                'total_harga' => 250000,
                'created_at' => '2022-12-13 17:42:48',
                'updated_at' => '2022-12-23 17:42:48',
            ),
            9 =>
            array (
                'id' => 10,
                'transaksi_pemasok_id' => 3,
                'users_id' => 1,
                'barang_id' => 5,
                'status_transaksi' => 'Berhasil',
                'kuantitas' => 100,
                'total_harga' => 250000,
                'created_at' => '2022-12-23 17:48:38',
                'updated_at' => '2022-12-17 17:48:38',
            ),
        ));


    }
}
