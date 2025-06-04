<?php

namespace Database\Seeders;

use App\Models\Airline;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AirlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tables = [
            [
                'name' => 'Ryanair',
                'code' => 'RY',
                'description'  => 'ryan'
            ]
            ];
            foreach ($tables as $table) {
                Airline::create($table);
            }

    }
}
