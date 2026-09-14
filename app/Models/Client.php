<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table ="clients";
    protected $fillable = ['nom', 'email', 'telephone'];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
