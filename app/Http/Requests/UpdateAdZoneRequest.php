<?php

namespace App\Http\Requests;

use App\Enum\AdZoneLocation;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAdZoneRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'ad_client' => 'required|string|max:50|regex:/^ca-pub-\d+$/',
            'ad_slot' => 'required|string|max:20',
            'location' => 'required|in:' . implode(',', AdZoneLocation::getValues()),
            'full_width_responsive' => 'boolean',
        ];
    }
}
