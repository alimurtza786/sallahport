<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PrayerRoomRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, string>>
     */
    public function rules(): array
    {
        return [
            'airport_id' => ['required', 'exists:airports,id'],
            'terminal' => ['required', 'string', 'max:100'],
            'location' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:50'],
            'gender_access' => ['required', 'string', 'max:50'],
            'description' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'photos' => ['nullable', 'array'],
            'photos.*' => ['image', 'max:5120'],
            'remove_photos' => ['nullable', 'array'],
            'remove_photos.*' => ['string', 'max:500'],
        ];
    }
}
