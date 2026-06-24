<?php

namespace App\Models;

use App\Support\MediaStorage;
use App\Support\PlaceholderImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class PrayerRoom extends Model
{
    /** @use HasFactory<\Database\Factories\PrayerRoomFactory> */
    use HasFactory;

    protected $fillable = [
        'airport_id',
        'terminal',
        'location',
        'status',
        'gender_access',
        'description',
        'photos',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'photos' => 'array',
        ];
    }

    public function airport(): BelongsTo
    {
        return $this->belongsTo(Airport::class);
    }

    /**
     * @return list<string>
     */
    public function resolvedPhotoUrls(): array
    {
        return collect($this->photos ?? [])->map(function (string $photo): string {
            if (config('salahport.use_dummy_images', true)) {
                return PlaceholderImage::url(200, 200, $photo);
            }

            if (str_starts_with($photo, 'http://') || str_starts_with($photo, 'https://')) {
                return $photo;
            }

            if (Storage::disk('public')->exists($photo)) {
                return MediaStorage::url($photo, 200, 200);
            }

            return PlaceholderImage::url(200, 200, $photo);
        })->all();
    }
}
