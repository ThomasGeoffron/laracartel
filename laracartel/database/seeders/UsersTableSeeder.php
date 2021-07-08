<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $admin = User::create([
            'name' => 'El Jefe',
            'email' => 'admin@exemple.com',
            'password' => Hash::make('password')
        ]);

        $gerant = User::create([
            'name' => 'Jean-Michel patron Infogramme',
            'email' => 'patron@infogramme.com',
            'password' => Hash::make('password')
        ]);

        $livreur = User::create([
            'name' => 'Jean-Michel Euro Truck Simulator 2',
            'email' => 'eurotruck@exemple.com',
            'password' => Hash::make('password')
        ]);

        $dealer = User::create([
            'name' => 'Jean-Michel Racaillou',
            'email' => 'racaillou@exemple.com',
            'password' => Hash::make('password')
        ]);

        $guetteur = User::create([
            'name' => 'Jean-Michel Hubble',
            'email' => 'hubble@exemple.com',
            'password' => Hash::make('password')
        ]);

        $adminRole = Role::where('name', 'jefe')->first();
        $gerantRole = Role::where('name', 'encargado')->first();
        $livreurRole = Role::where('name', 'repartidor')->first();
        $dealerRole = Role::where('name', 'camello')->first();
        $guetteurRole = Role::where('name', 'vigía')->first();

        $admin->roles()->attach($adminRole);
        $gerant->roles()->attach($gerantRole);
        $livreur->roles()->attach($livreurRole);
        $dealer->roles()->attach($dealerRole);
        $guetteur->roles()->attach($guetteurRole);
    }
}
