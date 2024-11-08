<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Friends extends Model
{
    

    protected $fillable = [
        'user_id',
        'friend_id',
    ];

    /**
     * Relation avec l'utilisateur (user).
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relation avec l'ami (friend).
     *
     * @return BelongsTo
     */
    public function friend(): BelongsTo
    {
        return $this->belongsTo(User::class, 'friend_id');
    }
}
