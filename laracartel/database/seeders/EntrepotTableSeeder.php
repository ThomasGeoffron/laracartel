<?php

namespace Database\Seeders;

use App\Models\Entrepot;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntrepotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Entrepot::truncate();

        Entrepot::create([
            'localisation' => '8 allée Léon Jouhaux, 77183 Croissy-Beaubourg',
            'capacite' => '150000',
            'gerant' => '1',
        ]);

        Entrepot::create([
            'localisation' => '2 Rue Denis Papin, 77290 Mitry-Mory',
            'capacite' => '50000',
            'gerant' => '2',
        ]);
    }
}
