<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommunityUpdate extends Model
{
    /** @use HasFactory<\Database\Factories\CommunityUpdateFactory> */
    use HasFactory;

    protected $fillable = [
        'airport_id',
        'author_name',
        'body',
        'is_verified',
    ];

    protected function casts(): array
    {
        return [
            'is_verified' => 'boolean',
        ];
    }

    public function airport(): BelongsTo
    {
        return $this->belongsTo(Airport::class);
    }
}
