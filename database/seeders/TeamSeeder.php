<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    public const TEAMS = [
        [
            'name' => 'MANCHESTER CITY',
            'strength' => 0.95,
        ],
        [
            'name' => 'LIVERPOOL',
            'strength' => 0.90,
        ],
        [
            'name' => 'CHELSEA',
            'strength' => 0.88,
        ],
        [
            'name' => 'TOTTENHAM HOTSPUR',
            'strength' => 0.85,
        ],
        [
            'name' => 'MANCHESTER UNITED',
            'strength' => 0.82,
        ],
        [
            'name' => 'ARSENAL',
            'strength' => 0.81,
        ],
        [
            'name' => 'WEST HAM UNITED',
            'strength' => 0.80,
        ],
        [
            'name' => 'WOLVERHAMPTON WANDERERS',
            'strength' => 0.79,
        ],
        [
            'name' => 'LEICESTER CITY',
            'strength' => 0.78,
        ],
        [
            'name' => 'BRIGHTON & HOVE ALBION',
            'strength' => 0.76,
        ],
        [
            'name' => 'BRENTFORD',
            'strength' => 0.74,
        ],
        [
            'name' => 'SOUTHAMPTON',
            'strength' => 0.72,
        ],
        [
            'name' => 'CRYSTAL PALACE',
            'strength' => 0.71,
        ],
        [
            'name' => 'ASTON VILLA',
            'strength' => 0.70,
        ],
        [
            'name' => 'NEWCASTLE UNITED',
            'strength' => 0.70,
        ],
        [
            'name' => 'LEEDS',
            'strength' => 0.69,
        ],
        [
            'name' => 'EVERTON',
            'strength' => 0.68,
        ],
        [
            'name' => 'BURNLEY',
            'strength' => 0.67,
        ],
        [
            'name' => 'WATFORD',
            'strength' => 0.66,
        ],
        [
            'name' => 'NORWICH CITY',
            'strength' => 0.65,
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();

        foreach (self::TEAMS as $team) {
            Team::create(array_merge($team,[
                'created_at' => $now,
                'updated_at' => $now
            ]));
        }
    }
}
