<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $table ="agents";
    protected $fillable = ['nom', 'email'];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}