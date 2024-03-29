<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        Role::create(['name' => 'jefe']);
        Role::create(['name' => 'encargado']);
        Role::create(['name' => 'repartidor']);
        Role::create(['name' => 'camello']);
        Role::create(['name' => 'vigía']);
    }
}
