<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model

{
    protected $table ="tickets";

    protected $fillable = [
        'titre', 'description', 'statut', 'priorite',
        'client_id', 'agent_id', 'categorie_id'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }
}