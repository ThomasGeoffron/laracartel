<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $table = "stock";

    public function produit() {
        return $this->belongsTo(Produit::class, 'produit');
    }

    public function arme() {
        return $this->belongsTo(Arme::class, 'arme');
    }

    public function entrepot() {
        return $this->belongsTo(Entrepot::class, 'entrepot');
    }
}
