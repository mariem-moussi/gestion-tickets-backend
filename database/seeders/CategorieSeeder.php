<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['réseau', 'facturation', 'technique', 'autre'];

        foreach ($categories as $nom) {
            Categorie::create(['nom' => $nom]);
        }
    }
}
