<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ticket;
use App\Models\Client;
use App\Models\Agent;
use App\Models\Categorie;

class TicketSeeder extends Seeder
{
    public function run(): void
    {
        $clientIds = Client::pluck('id');
        $agentIds = Agent::pluck('id');
        $categorieIds = Categorie::pluck('id');

        for ($i = 0; $i < 20; $i++) {
            Ticket::create([
                'titre' => fake()->randomElement([
    'Impossible de se connecter au VPN',
    'Facture de mars non reçue',
    'Écran bleu au démarrage',
    'Remboursement commande #4521',
    'Lenteur anormale sur le portail client',
    'Mot de passe oublié, réinitialisation impossible',
    'Imprimante réseau introuvable',
    'Erreur 500 sur la page de paiement',
    'Synchronisation email en échec',
    'Accès refusé au dossier partagé',
    'Mise à jour logicielle bloquée',
    'Perte de connexion Wifi intermittente',
    'Compte utilisateur verrouillé',
    'Fichier corrompu après export',
    'Licence logicielle expirée',
    'Double facturation sur la commande #3187',
    'Application mobile qui plante au lancement',
    'Demande de changement d\'adresse de livraison',
    'Notification push non reçue',
    'Export PDF vide sans erreur affichée',
]),
                'description' => fake()->paragraph(),
                'statut' => fake()->randomElement(['nouveau', 'en_cours', 'resolu', 'ferme']),
                'priorite' => fake()->randomElement(['basse', 'moyenne', 'haute']),
                'client_id' => $clientIds->random(),
                'agent_id' => $agentIds->random(),
                'categorie_id' => $categorieIds->random(),
            ]);
        }
    }
}
