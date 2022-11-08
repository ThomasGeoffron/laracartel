<?php

namespace Database\Seeders;

use App\Models\Arme;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArmeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Arme::truncate();

        Arme::create([
            'designation' => 'FAMAS',
            'description' => 'Otan de type bullpup, initialement fabriqué par la Manufacture d\'armes de Saint-Étienne.',
            'munition' => '5,56 × 45 mm'
        ]);

        Arme::create([
            'designation' => 'UZI',
            'description' => 'Pistolet-mitrailleur semi-automatique développé en Israël',
            'munition' => '9 mm Parabellum / 45 ACP'
        ]);

        Arme::create([
            'designation' => 'MP5',
            'description' => 'Pistolet-mitrailleur produit par la firme allemande Heckler & Koch',
            'munition' => '9 mm Parabellum'
        ]);

        Arme::create([
            'designation' => 'AK-47',
            'description' => 'Fusil d\'assaut conçu par l\'ingénieur soviétique Mikhaïl Kalachnikov',
            'munition' => '7,62 x 39mm'
        ]);

        Arme::create([
            'designation' => 'Remington 870',
            'description' => 'Fusil à pompe fabriqué aux États-Unis depuis 1950 par Remington Arms',
            'munition' => 'Calibre .12'
        ]);

        Arme::create([
            'designation' => 'HK416',
            'description' => 'Fusil d\'assaut de la firme allemande Heckler & Koch, une version améliorée de la carabine M4',
            'munition' => '5,56 × 45 mm'
        ]);
    }
}
