<?php

namespace Database\Seeders;

use App\Models\Airport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AirportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tables = [
            [
                'name' => 'Aeropuerto_Sevilla',
                'code' => 'AS',
                'city' => 'Sevilla',
                'country' => 'España'
            ]
            ];

            foreach ($tables as $table) {
                Airport::create($table);
            }
    }
}
