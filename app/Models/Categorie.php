<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table ="categories";
    protected $fillable = ['nom'];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}