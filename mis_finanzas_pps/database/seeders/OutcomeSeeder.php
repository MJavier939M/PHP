<?php

namespace Database\Seeders;

use App\Models\Outcome;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OutcomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Outcome::create(["cantidad" => 1000,"fecha" => "2023-01-01", "categoria" => "Salario"]);
       Outcome::create(["cantidad" => 2000,"fecha" => "2023-02-01", "categoria" => "Inversiones"]);
       Outcome::create(["cantidad" => 1500,"fecha" => "2023-03-01", "categoria" => "Inversiones"]);
       Outcome::create(["cantidad" => 2500,"fecha" => "2023-04-01", "categoria" => "Salario"]);   
    }
}
