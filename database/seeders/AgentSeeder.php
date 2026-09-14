<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Agent;

class AgentSeeder extends Seeder
{
    public function run(): void
    {
        $noms = [
            'Yassine Karray', 'Rania Ben Ali', 'Omar Trabelsi', 'Dorra Msalmi',
            'Skander Yahyaoui', 'Ghofrane Sfaxi', 'Chokri Bouassida', 'Meriem Zouari',
        ];

        foreach ($noms as $nom) {
            Agent::create([
                'nom' => $nom,
                'email' => fake()->unique()->safeEmail(),
            ]);
        }
    }
}