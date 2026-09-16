# Gestion de Tickets Support — Backend

API REST développée avec **Laravel 12** pour la gestion de tickets de support technique, réalisée dans le cadre d'un stage à INFRAWAY.

## Stack technique

- **Framework** : Laravel 12
- **Base de données** : MySQL
- **Test API** : Postman

## Fonctionnalités

- CRUD complet sur les tickets (créer, lire, modifier, supprimer)
- Filtrage des tickets par statut et priorité
- Gestion des commentaires liés à un ticket
- Règle métier : impossible de commenter un ticket fermé
- Statistiques agrégées (nombre de tickets par statut via `groupBy`)
- Validation des données côté serveur

## Modèle de données

- **Client** — hasMany Ticket
- **Agent** — hasMany Ticket
- **Categorie** — hasMany Ticket
- **Ticket** — belongsTo Client, Agent, Categorie / hasMany Commentaire
- **Commentaire** — belongsTo Ticket

## Installation

\`\`\`bash
git clone https://github.com/mariem-moussi/gestion-tickets-backend.git
cd gestion-tickets-backend
composer install
cp .env.example .env
php artisan key:generate
# Configurer les identifiants MySQL dans .env
php artisan migrate --seed
php artisan serve
\`\`\`

L'API est alors accessible sur `http://127.0.0.1:8000/api`.

## Projet lié

Frontend Angular : [gestion-tickets-frontend](https://github.com/mariem-moussi/gestion-tickets-frontend)
