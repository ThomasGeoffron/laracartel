<?php

namespace Database\Seeders;

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
        $this->call(ArmeTableSeeder::class);
        $this->call(ClientTableSeeder::class);
        $this->call(EntrepotTableSeeder::class);
        $this->call(ProduitTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(StockTableSeeder::class);
        $this->call(TransportTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(VenteTableSeeder::class);
    }
}
