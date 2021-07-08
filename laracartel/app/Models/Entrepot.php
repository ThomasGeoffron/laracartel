<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrepot extends Model
{
    use HasFactory;

    protected $table = "entrepot";

    public function gerant() {
        return $this->belongsTo(User::class, 'gerant');
    }
}
