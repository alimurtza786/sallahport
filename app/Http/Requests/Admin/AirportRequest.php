<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AirportRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    public function rules(): array
    {
        $airportId = $this->route('airport')?->id;

        return [
            'name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:8', Rule::unique('airports', 'code')->ignore($airportId)],
            'city' => ['required', 'string', 'max:100'],
            'country' => ['required', 'string', 'max:100'],
            'description' => ['nullable', 'string'],
            'image_file' => ['nullable', 'image', 'max:5120'],
            'image_url' => ['nullable', 'url', 'max:500'],
            'rating' => ['required', 'numeric', 'min:0', 'max:5'],
            'reviews_count' => ['required', 'integer', 'min:0'],
            'terminals_count' => ['required', 'integer', 'min:1', 'max:20'],
            'latitude' => ['nullable', 'numeric', 'between:-90,90'],
            'longitude' => ['nullable', 'numeric', 'between:-180,180'],
            'qibla_degrees' => ['nullable', 'integer', 'min:0', 'max:360'],
            'is_featured' => ['nullable', 'boolean'],
            'prayer_names' => ['nullable', 'array'],
            'prayer_names.*' => ['string', 'max:20'],
            'prayer_times' => ['nullable', 'array'],
            'prayer_times.*' => ['string', 'max:20'],
        ];
    }
}
