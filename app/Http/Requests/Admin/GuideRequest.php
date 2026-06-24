<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GuideRequest extends FormRequest
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
        $guideId = $this->route('guide')?->id;

        return [
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('guides', 'slug')->ignore($guideId)],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'body' => ['required', 'string'],
            'read_time' => ['required', 'string', 'max:30'],
            'image_file' => ['nullable', 'image', 'max:5120'],
            'image_url' => ['nullable', 'url', 'max:500'],
            'published_at' => ['nullable', 'date'],
        ];
    }
}
