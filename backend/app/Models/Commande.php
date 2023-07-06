<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function Ligne_De_Commandes()
    {
        return $this->hasMany(LigneDeCommande::class);
    }

    protected $guarded = [];
}
