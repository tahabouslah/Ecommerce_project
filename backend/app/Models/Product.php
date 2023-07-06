<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function Ligne_de_commandes()
    {
        return $this->hasMany(LigneDeCommande::class);
    }

    public function catrgory()
    {
        return $this->belongsTo(Category::class);
    }
}
