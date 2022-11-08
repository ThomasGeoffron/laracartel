<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::truncate();

        Client::create([
            'nom' => 'FSociety',
            'raisonsoc' => 'Hacker Group',
            'siege' => 'Fun Society Arcade, Coney Island'
        ]);

        Client::create([
            'nom' => 'Coca-Cola',
            'raisonsoc' => 'SAS',
            'siege' => 'Atlanta, Géorgie, États-Unis'
        ]);

        Client::create([
            'nom' => 'Findus',
            'raisonsoc' => 'SAS',
            'siege' => 'Bjuv; Suède'
        ]);
    }
}
