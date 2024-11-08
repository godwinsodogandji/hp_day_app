<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Settings extends Model
{
    

    protected $fillable = [
        'user_id',
        'notification_preferences',
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
     * Cast pour les préférences de notification.
     *
     * @var array
     */
    protected $casts = [
        'notification_preferences' => 'array',
    ];
}
