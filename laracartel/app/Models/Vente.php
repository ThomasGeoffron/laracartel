<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    use HasFactory;

    protected $table = "vente";

    public function stock() {
        return $this->belongsTo(Stock::class, 'stock');
    }

    public function transport() {
        return $this->belongsTo(Transport::class, 'transport');
    }

    public function client() {
        return $this->belongsTo(Client::class, 'client');
    }
}
