<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $table ="commentaires";
    protected $fillable = ['ticket_id', 'auteur', 'message'];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}