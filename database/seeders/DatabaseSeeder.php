<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ClientSeeder::class,
            AgentSeeder::class,
            CategorieSeeder::class,
            TicketSeeder::class,
            CommentaireSeeder::class,
        ]);
    }
}