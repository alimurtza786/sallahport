<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommunityUpdateRequest extends FormRequest
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
            'author_name' => ['required', 'string', 'max:100'],
            'body' => ['required', 'string', 'max:1000'],
        ];
    }
}
