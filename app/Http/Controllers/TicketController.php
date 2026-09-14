<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(Request $request)
    {
        $query = Ticket::with('client', 'agent', 'categorie', 'commentaires');

        if ($request->has('statut') && $request->statut !== '') {
            $query->where('statut', $request->statut);
        }

        if ($request->has('priorite') && $request->priorite !== '') {
            $query->where('priorite', $request->priorite);
        }

        $tickets = $query->get();

        return response()->json(['reponse' => $tickets]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'statut' => 'in:nouveau,en_cours,resolu,ferme',
            'priorite' => 'in:basse,moyenne,haute',
            'client_id' => 'required|exists:clients,id',
            'agent_id' => 'required|exists:agents,id',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        $ticket = Ticket::create($validated);

        return response()->json(['reponse' => $ticket], 201);
    }

    public function show($id)
    {
        $ticket = Ticket::with('client', 'agent', 'categorie', 'commentaires')->findOrFail($id);
        return response()->json(['reponse' => $ticket]);
    }

    public function update(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);

        $validated = $request->validate([
            'titre' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'statut' => 'sometimes|in:nouveau,en_cours,resolu,ferme',
            'priorite' => 'sometimes|in:basse,moyenne,haute',
        ]);

        $ticket->update($validated);

        return response()->json(['reponse' => $ticket]);
    }

    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        return response()->json(['reponse' => 'Ticket supprimé avec succès']);
    }
}