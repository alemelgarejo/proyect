<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type' => ['required'],
            'city' => ['required', 'max:150', 'min:2'],
            'min_value' => ['nullable', 'numeric'],
            'max_value' => ['nullable', 'numeric'],
            'min_surface' => ['nullable', 'numeric'],
            'max_surface' => ['nullable', 'numeric'],
            'min_rooms' => ['nullable', 'numeric'],
            'max_rooms' => ['nullable', 'numeric'],
            'furnished' => ['nullable'],
            'elevator' => ['nullable'],
            'garage' => ['nullable'],
            'terraces' => ['nullable'],
            'courtyard' => ['nullable'],
            'heating' => ['nullable'],
            'air_conditioning' => ['nullable'],
            'garden' => ['nullable'],
            'pool' => ['nullable'],
            'situation' => ['nullable'],
            'conservation_state' => ['nullable'],
            'need_loan' => ['nullable'],
            'observations' => ['nullable', 'max:500'],
        ];
    }
}
