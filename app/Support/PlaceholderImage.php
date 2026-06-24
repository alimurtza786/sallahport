<?php

namespace App\Support;

class PlaceholderImage
{
    public static function url(int $width, int $height, ?string $seed = null): string
    {
        $seed = substr(md5($seed ?? 'salahport'), 0, 10);

        return "https://picsum.photos/seed/salahport-{$seed}/{$width}/{$height}";
    }

    public static function hero(): string
    {
        return self::url(1400, 700, 'hero');
    }

    public static function og(): string
    {
        return self::url(1200, 630, 'og');
    }
}
