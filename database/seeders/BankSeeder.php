<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bank::factory()->create([
            'name' => 'Halyk Bank'
        ]);

        Bank::factory()->create([
            'name' => 'Kaspi'
        ]);

        Bank::factory()->create([
            'name' => 'Jusan'
        ]);
    }
}
