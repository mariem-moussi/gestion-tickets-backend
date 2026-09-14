<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        $noms = [
            'Amel Trabelsi', 'Mehdi Sassi', 'Sami Gharbi', 'Nour Chaabane',
            'Ines Bouazizi', 'Karim Jendoubi', 'Salma Fekih', 'Wassim Hammami',
            'Mariem Belhaj', 'Ahmed Cherif', 'Rania Mzoughi', 'Bilel Souissi',
            'Nadia Ayari', 'Youssef Khelifi', 'Emna Rekik', 'Hedi Baccouche',
            'Sarra Mansour', 'Anis Ouertani', 'Lina Chtioui', 'Fares Jaziri',
        ];

        foreach ($noms as $nom) {
            Client::create([
                'nom' => $nom,
                'email' => fake()->unique()->safeEmail(),
                'telephone' => fake()->numerify('+216 ## ### ###'),
            ]);
        }
    }
}