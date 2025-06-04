<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tables = [
            [
                'user_id' => 1,
                'flight_id' => 1,
                'passengers' => 30,
                'notes' => 'rellenar'
            ]
            ];
            foreach ($tables as $table) {
                Reservation::create($table);
            }
        
    }
}
