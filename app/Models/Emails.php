<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Emails extends Model
{
    
    protected $fillable = [
        'user_id',
        'recipient',
        'subject',
        'body',
        'status',
        'sent_at',
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
     * Cast pour le champ sent_at.
     *
     * @var array
     */
    protected $casts = [
        'sent_at' => 'datetime',
    ];
}
