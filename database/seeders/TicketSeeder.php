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

        $tickets = [
            ['titre' => 'Impossible de se connecter au VPN', 'description' => 'Depuis ce matin, la connexion VPN échoue systématiquement avec un message d\'erreur de type "timeout". Le problème touche plusieurs collaborateurs en télétravail.'],
            ['titre' => 'Facture de mars non reçue', 'description' => 'Le client n\'a toujours pas reçu sa facture du mois de mars par email. Merci de vérifier si elle a bien été générée et envoyée depuis le système de facturation.'],
            ['titre' => 'Écran bleu au démarrage', 'description' => 'Le poste redémarre en boucle avec un écran bleu affichant un code d\'erreur système. Le problème est apparu après la dernière mise à jour Windows.'],
            ['titre' => 'Remboursement commande #4521', 'description' => 'Le client demande le remboursement de sa commande #4521, reçue endommagée. Une photo du colis a été transmise par email à l\'équipe support.'],
            ['titre' => 'Lenteur anormale sur le portail client', 'description' => 'Le portail client met plus de 10 secondes à charger chaque page depuis hier. Le problème semble concerner uniquement le module de facturation.'],
            ['titre' => 'Mot de passe oublié, réinitialisation impossible', 'description' => 'L\'utilisateur ne reçoit pas l\'email de réinitialisation de mot de passe malgré plusieurs tentatives. Le compte n\'est pas bloqué côté administration.'],
            ['titre' => 'Imprimante réseau introuvable', 'description' => 'L\'imprimante du 2ème étage n\'apparaît plus dans la liste des périphériques disponibles depuis le changement de switch réseau la semaine dernière.'],
            ['titre' => 'Erreur 500 sur la page de paiement', 'description' => 'Plusieurs clients signalent une erreur serveur au moment de valider leur paiement en ligne. La transaction ne semble pas être débitée.'],
            ['titre' => 'Synchronisation email en échec', 'description' => 'Les emails ne se synchronisent plus entre le client mail et le serveur depuis la mise à jour de sécurité de mardi dernier.'],
            ['titre' => 'Accès refusé au dossier partagé', 'description' => 'L\'utilisateur ne peut plus accéder au dossier partagé "Comptabilité" alors que ses droits n\'ont pas été modifiés récemment.'],
            ['titre' => 'Mise à jour logicielle bloquée', 'description' => 'La mise à jour du logiciel de gestion reste bloquée à 45% depuis plus d\'une heure, sans message d\'erreur visible.'],
            ['titre' => 'Perte de connexion Wifi intermittente', 'description' => 'Le wifi se déconnecte de façon aléatoire plusieurs fois par heure dans la zone open-space, rendant le travail difficile pour toute l\'équipe.'],
            ['titre' => 'Compte utilisateur verrouillé', 'description' => 'Le compte a été automatiquement verrouillé après plusieurs tentatives de connexion échouées que l\'utilisateur affirme ne pas avoir effectuées.'],
            ['titre' => 'Fichier corrompu après export', 'description' => 'Le fichier Excel exporté depuis le système est illisible à l\'ouverture, avec un message d\'erreur de format non reconnu.'],
            ['titre' => 'Licence logicielle expirée', 'description' => 'Le logiciel affiche un message de licence expirée alors que le renouvellement avait été effectué le mois dernier.'],
            ['titre' => 'Double facturation sur la commande #3187', 'description' => 'Le client a été débité deux fois pour la même commande. Les deux transactions apparaissent sur son relevé bancaire.'],
            ['titre' => 'Application mobile qui plante au lancement', 'description' => 'L\'application mobile se ferme immédiatement après l\'écran de chargement, sur plusieurs modèles de téléphones différents.'],
            ['titre' => 'Demande de changement d\'adresse de livraison', 'description' => 'Le client souhaite modifier l\'adresse de livraison de sa commande en cours avant expédition.'],
            ['titre' => 'Notification push non reçue', 'description' => 'Les notifications push ne s\'affichent plus sur le téléphone du client depuis la dernière mise à jour de l\'application.'],
            ['titre' => 'Export PDF vide sans erreur affichée', 'description' => 'L\'export PDF se génère correctement mais le fichier obtenu est totalement vide, sans aucun message d\'erreur côté interface.'],
        ];

        foreach ($tickets as $t) {
            Ticket::create([
                'titre' => $t['titre'],
                'description' => $t['description'],
                'statut' => fake()->randomElement(['nouveau', 'en_cours', 'resolu', 'ferme']),
                'priorite' => fake()->randomElement(['basse', 'moyenne', 'haute']),
                'client_id' => $clientIds->random(),
                'agent_id' => $agentIds->random(),
                'categorie_id' => $categorieIds->random(),
            ]);
        }
    }
}