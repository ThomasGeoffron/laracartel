<?php

namespace Database\Seeders;

use App\Models\Vente;
use Illuminate\Database\Seeder;

class VenteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vente::truncate();
    }
}
