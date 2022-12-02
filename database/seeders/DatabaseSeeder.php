<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(KategoriTableSeeder::class);
        $this->call(BarangTableSeeder::class);
        $this->call(ProdukTableSeeder::class);
        $this->call(MerekTableSeeder::class);
        $this->call(PelangganTableSeeder::class);
        $this->call(PemasokTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(TransaksiBarangPelangganTableSeeder::class);
        $this->call(TransaksiBarangPemasokTableSeeder::class);
        $this->call(TransaksiPelangganTableSeeder::class);
        $this->call(TransaksiPemasokTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(UserRolesTableSeeder::class);
        $this->call(KategoriProdukTableSeeder::class);
    }
}
