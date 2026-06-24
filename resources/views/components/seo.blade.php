@php
    $title = trim($__env->yieldContent('title')) ?: 'SalahPort — Never Miss a Salah While Traveling';
    $description = trim($__env->yieldContent('meta_description')) ?: 'Find airport prayer rooms, wudu facilities, prayer times and helpful tips for Muslim travelers worldwide.';
    $canonical = trim($__env->yieldContent('canonical')) ?: url()->current();
    $ogImage = trim($__env->yieldContent('og_image')) ?: \App\Support\PlaceholderImage::og();
@endphp

<title>{{ $title }}</title>
<meta name="description" content="{{ $description }}">
<link rel="canonical" href="{{ $canonical }}">
<meta name="robots" content="index, follow">

<meta property="og:type" content="website">
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:url" content="{{ $canonical }}">
<meta property="og:image" content="{{ $ogImage }}">
<meta property="og:site_name" content="SalahPort">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:description" content="{{ $description }}">
<meta name="twitter:image" content="{{ $ogImage }}">

@stack('structured_data')
