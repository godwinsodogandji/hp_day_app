<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Les attributs qui peuvent être assignés en masse.
     *
     * @var array<string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'birthday', 
    ];

    /**
     * Les attributs qui doivent être cachés lors de la sérialisation.
     *
     * @var array<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Les attributs qui doivent être castés.
     *
     * @return array<string, string>
     */
    protected $casts = [
        
        'email_verified_at' => 'datetime',
        
    ];
   // User.php
public function friends()
{
    return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id')
                ->withPivot('status')
                ->withTimestamps();
}


    // Relation inverse pour les utilisateurs qui ont ajouté cet utilisateur comme ami
   // User.php
public function friendOf()
{
    return $this->belongsToMany(User::class, 'friends', 'friend_id', 'user_id')
                ->withPivot('status')
                ->withTimestamps();
}

}
