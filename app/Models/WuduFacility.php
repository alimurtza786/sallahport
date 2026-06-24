<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WuduFacility extends Model
{
    /** @use HasFactory<\Database\Factories\WuduFacilityFactory> */
    use HasFactory;

    protected $fillable = [
        'airport_id',
        'terminal',
        'location',
        'status',
        'description',
        'sort_order',
    ];

    public function airport(): BelongsTo
    {
        return $this->belongsTo(Airport::class);
    }
}
