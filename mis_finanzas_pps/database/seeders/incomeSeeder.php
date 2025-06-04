<?php

namespace Database\Seeders;

use App\Models\Income;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class incomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Income::create(["cantidad" => 1000,"fecha" => "2023-01-01", "categoria" => "Salario"]);
        Income::create(["cantidad" => 2000,"fecha" => "2023-02-01", "categoria" => "Inversiones"]);
        Income::create(["cantidad" => 1500,"fecha" => "2023-03-01", "categoria" => "Otros"]);
        Income::create(["cantidad" => 2500,"fecha" => "2023-04-01", "categoria" => "Salario"]);   
    }
}
