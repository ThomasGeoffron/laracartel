<?php

namespace Database\Seeders;

use App\Models\Transport;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transport::truncate();
    }
}
