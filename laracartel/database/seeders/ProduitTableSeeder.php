<?php

namespace Database\Seeders;

use App\Models\Produit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProduitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produit::truncate();

        Produit::create([
            'designation' => 'NZT',
            'description' => 'Pilule permettant de décupler les facultés cognitives durant quelques heures',
            'pu' => '1500.00'
        ]);

        Produit::create([
            'designation' => 'MDMA',
            'description' => 'Amine sympathicomimétique, molécule psychostimulante de la classe des amphétamines',
            'pu' => '29.99'
        ]);

        Produit::create([
            'designation' => 'Canabis',
            'description' => 'Se présente sous forme de fleurs, de feuilles, de résine ou d\'huile',
            'pu' => '9.99'
        ]);

        Produit::create([
            'designation' => 'Héroïne',
            'description' => 'Drogue utilisée pour ses puissants effets antidouleur et euphorisants.',
            'pu' => '34.99'
        ]);

    }
}
