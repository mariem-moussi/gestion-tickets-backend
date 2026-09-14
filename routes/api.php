<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\TicketController;
use App\Http\Controllers\CommentaireController;




Route::get('/tickets', [TicketController::class, 'index']);
Route::post('/tickets', [TicketController::class, 'store']);
Route::get('/tickets/{id}', [TicketController::class, 'show']);
Route::patch('/tickets/{id}', [TicketController::class, 'update']);
Route::delete('/tickets/{id}', [TicketController::class, 'destroy']);

Route::post('/tickets/{id}/commentaires', [CommentaireController::class, 'store']);



Route::get('/clients', function () {
    return response()->json(['reponse' => \App\Models\Client::all()]);
});

Route::get('/agents', function () {
    return response()->json(['reponse' => \App\Models\Agent::all()]);
});

Route::get('/categories', function () {
    return response()->json(['reponse' => \App\Models\Categorie::all()]);
});
Route::get('/tickets-stats', function () {
    $stats = \App\Models\Ticket::groupBy('statut')
        ->selectRaw('statut, count(*) as total')
        ->get();

    return response()->json(['reponse' => $stats]);
});