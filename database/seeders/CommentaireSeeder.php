<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Commentaire;
use App\Models\Ticket;

class CommentaireSeeder extends Seeder
{
    public function run(): void
    {
        $auteurs = [
            'Amel Trabelsi', 'Mehdi Sassi', 'Yassine Karray', 'Rania Ben Ali',
            'Sami Gharbi', 'Nour Chaabane', 'Omar Trabelsi', 'Dorra Msalmi',
        ];

        $messages = [
            'Le problème persiste, pouvez-vous vérifier de votre côté ?',
            'Merci pour votre réactivité, je vous tiens au courant.',
            'J\'ai essayé de redémarrer mais rien n\'a changé.',
            'C\'est résolu de mon côté, merci beaucoup !',
            'Pouvez-vous préciser quand cela a commencé ?',
            'Je transmets ce ticket à l\'équipe technique.',
            'Le correctif a bien été appliqué, à confirmer.',
            'Toujours pas de réponse, avez-vous des nouvelles ?',
            'J\'ai joint une capture d\'écran par email.',
            'Ce problème est urgent, merci de le traiter en priorité.',
            'Après vérification, tout semble fonctionner normalement.',
            'Je relance ce ticket, aucune action depuis 2 jours.',
        ];

        $ticketIds = Ticket::pluck('id');

        foreach ($ticketIds as $ticketId) {
            $nombreCommentaires = rand(0, 3);

            for ($i = 0; $i < $nombreCommentaires; $i++) {
                Commentaire::create([
                    'ticket_id' => $ticketId,
                    'auteur' => fake()->randomElement($auteurs),
                    'message' => fake()->randomElement($messages),
                ]);
            }
        }
    }
}