<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    use HasFactory;


    protected $fillable = [
        'user',
        'vehicule',
        'depart',
        'destination'
    ];

    protected $table = "transport";

    public function user() {
        return $this->belongsTo(User::class, 'user');
    }
}
