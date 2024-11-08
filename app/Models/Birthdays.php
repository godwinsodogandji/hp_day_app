<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Birthdays extends Model
{
    

    protected $fillable = [
        'user_id',
        'date',
        'notification_sent',
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
}
