<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class MediaStorage
{
    public static function url(?string $path, int $width = 800, int $height = 600): string
    {
        if (config('salahport.use_dummy_images', true)) {
            return PlaceholderImage::url($width, $height, $path);
        }

        if ($path === null || $path === '') {
            return PlaceholderImage::url($width, $height);
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        return Storage::disk('public')->url($path);
    }

    public static function store(?UploadedFile $file, string $directory): ?string
    {
        if ($file === null) {
            return null;
        }

        return $file->store($directory, 'public');
    }

    /**
     * @param  array<int, UploadedFile>  $files
     * @return list<string>
     */
    public static function storeMany(array $files, string $directory): array
    {
        $paths = [];

        foreach ($files as $file) {
            if ($file instanceof UploadedFile) {
                $stored = self::store($file, $directory);
                if ($stored !== null) {
                    $paths[] = $stored;
                }
            }
        }

        return $paths;
    }

    public static function delete(?string $path): void
    {
        if ($path === null || $path === '' || str_starts_with($path, 'http')) {
            return;
        }

        Storage::disk('public')->delete($path);
    }

    /**
     * @param  list<string>|null  $paths
     */
    public static function deleteMany(?array $paths): void
    {
        if ($paths === null) {
            return;
        }

        foreach ($paths as $path) {
            self::delete($path);
        }
    }
}
