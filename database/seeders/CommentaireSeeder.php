<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Commentaire;
use App\Models\Ticket;

class CommentaireSeeder extends Seeder
{
    public function run(): void
    {
        $ticketIds = Ticket::pluck('id');

        foreach ($ticketIds as $ticketId) {
            $nombreCommentaires = rand(0, 3);

            for ($i = 0; $i < $nombreCommentaires; $i++) {
                Commentaire::create([
                    'ticket_id' => $ticketId,
                    'auteur' => fake()->name(),
                    'message' => fake()->sentence(10),
                ]);
            }
        }
    }
}
