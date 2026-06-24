<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Airport extends Model
{
    /** @use HasFactory<\Database\Factories\AirportFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'slug',
        'city',
        'country',
        'description',
        'image',
        'rating',
        'reviews_count',
        'terminals_count',
        'latitude',
        'longitude',
        'prayer_times',
        'qibla_degrees',
        'is_featured',
    ];

    protected function casts(): array
    {
        return [
            'rating' => 'decimal:1',
            'prayer_times' => 'array',
            'is_featured' => 'boolean',
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'code';
    }

    public function resolveRouteBinding($value, $field = null): ?Model
    {
        return $this->where($field ?? $this->getRouteKeyName(), strtoupper($value))->first();
    }

    public function prayerRooms(): HasMany
    {
        return $this->hasMany(PrayerRoom::class)->orderBy('sort_order');
    }

    public function wuduFacilities(): HasMany
    {
        return $this->hasMany(WuduFacility::class)->orderBy('sort_order');
    }

    public function travelerTips(): HasMany
    {
        return $this->hasMany(TravelerTip::class)->orderBy('sort_order');
    }

    public function communityUpdates(): HasMany
    {
        return $this->hasMany(CommunityUpdate::class)->latest();
    }

    public function terminalsLabel(): string
    {
        return $this->terminals_count.' Terminal'.($this->terminals_count > 1 ? 's' : '');
    }
}
