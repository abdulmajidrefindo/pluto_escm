<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProdukTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('produk')->delete();

        \DB::table('produk')->insert(array (
            0 =>
            array (
                'id' => 1,
                'nama_produk' => 'Tolak Angin',
                'unit' => 'PCS',
                'keterangan' => 'Buat masuk angin',
                'jenis_produk' => 'Barang Jadi',
                'created_at' => '2022-12-09 15:53:09',
                'updated_at' => '2022-12-29 15:53:09',
            ),
            1 =>
            array (
                'id' => 2,
                'nama_produk' => 'Konimex',
                'unit' => 'PCS',
                'keterangan' => 'Batuk',
                'jenis_produk' => 'Barang Jadi',
                'created_at' => '2022-12-13 15:53:09',
                'updated_at' => '2022-12-22 15:53:09',
            ),
            2 =>
            array (
                'id' => 3,
                'nama_produk' => 'Aqua Galon',
                'unit' => 'Galon',
                'keterangan' => 'Untuk Minum',
                'jenis_produk' => 'Barang Jadi',
                'created_at' => '2022-12-01 15:54:41',
                'updated_at' => '2022-12-02 15:54:41',
            ),
            3 =>
            array (
                'id' => 4,
                'nama_produk' => 'Fanta Oren',
                'unit' => 'Botol',
                'keterangan' => 'Awas diabetes',
                'jenis_produk' => 'Barang Jadi',
                'created_at' => '2022-12-08 15:54:41',
                'updated_at' => '2022-12-15 15:54:41',
            ),
            4 =>
            array (
                'id' => 5,
                'nama_produk' => 'Sutra',
                'unit' => 'Sachet',
                'keterangan' => 'Kamu ngga akan pernah memakainya',
                'jenis_produk' => 'Barang Jadi',
                'created_at' => '2022-12-14 16:27:49',
                'updated_at' => '2022-12-16 16:27:49',
            ),
            5 =>
            array (
                'id' => 6,
                'nama_produk' => 'Baygon Kaleng',
                'unit' => 'Kaleng',
                'keterangan' => 'Racun secara universal',
                'jenis_produk' => 'Barang Jadi',
                'created_at' => '2022-12-01 16:27:49',
                'updated_at' => '2022-12-02 16:27:49',
            ),
        ));


    }
}
