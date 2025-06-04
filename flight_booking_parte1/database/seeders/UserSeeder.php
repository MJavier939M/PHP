<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tables = [
            [
                'name' => 'Javier',
                'email' => 'prueba@example.com',
                'password' => '1234'
            ]
            ];

            foreach ($tables as $table) {
                User::create($table);
            }
    }
}
