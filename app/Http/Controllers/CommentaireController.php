<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Ticket;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function store(Request $request, $ticketId)
    {
        $ticket = Ticket::findOrFail($ticketId);

        if ($ticket->statut === 'ferme') {
            return response()->json(['erreur' => 'Impossible de commenter un ticket fermé'], 403);
        }

        $validated = $request->validate([
            'auteur' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $validated['ticket_id'] = $ticket->id;
        $commentaire = Commentaire::create($validated);

        return response()->json(['reponse' => $commentaire], 201);
    }
}