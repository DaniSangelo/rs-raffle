<?php

namespace Database\Seeders;

use App\Models\Applicant;
use App\Models\Raffle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RaffleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Raffle::factory()->count(30)
            ->has(Applicant::factory()->count(10), 'applicants')
            ->create();
    }
}
