<?php

namespace Database\Seeders;

use App\Models\Flight;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tables = [
            [
                'airline_id' => 1,
                'origin_airport_id' => 1,
                'destination_airport_id' => 1,
                'departure_time' => Carbon::now(),
                'arrival_time' => Carbon::now()->addDays(2),
                'price' => 3.23,
                'available_seats' => 20
            ]
            ];
            foreach ($tables as $table) {
                Flight::create($table);
            }
    }
}
