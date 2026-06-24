<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TravelerTip extends Model
{
    /** @use HasFactory<\Database\Factories\TravelerTipFactory> */
    use HasFactory;

    protected $fillable = [
        'airport_id',
        'title',
        'icon',
        'description',
        'sort_order',
    ];

    public function airport(): BelongsTo
    {
        return $this->belongsTo(Airport::class);
    }
}
