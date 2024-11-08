<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Ajoutez cette ligne
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profiles extends Model
{
    use HasFactory; // Ajoutez cette ligne

    protected $fillable = [
        'user_id',
        'full_name',
        'bio',
        'avatar',
        'birthday',
    ];

    /**
     * Relation avec l'utilisateur (user).
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Cast pour le champ birthday.
     *
     * @var array
     */
    protected $casts = [
        'birthday' => 'date',
    ];
}
