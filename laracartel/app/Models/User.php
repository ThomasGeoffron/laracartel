<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function superieur() {
        return $this->belongsTo(User::class, 'superieur');
    }

    public function roles() {
        return $this->belongsToMany('App\Models\Role');
    }

    public function isAdmin() {
        $this->roles()->where('name', 'jefe')->first();
    }

    public function hasPermission(array $roles) {
        return $this->roles()->whereIn('name', $roles)->first();
    }

    public function isTransport() {
        return $this->roles()->whereIn('name', 'repartidor');
    }
}
