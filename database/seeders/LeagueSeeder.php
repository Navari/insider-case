<?php

namespace Database\Seeders;

use App\Enums\LeagueEnum;
use App\Models\League;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PHPUnit\Framework\Constraint\LessThan;

class LeagueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        League::create([
            'name' => 'premier league',
            'status' => LeagueEnum::NOT_STARTED,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
