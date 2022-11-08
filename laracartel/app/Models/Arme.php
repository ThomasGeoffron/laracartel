<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arme extends Model
{
    use HasFactory;

    protected $table = "arme";

    protected $fillable = [
        'designation',
        'description',
        'munition'
    ];
}
