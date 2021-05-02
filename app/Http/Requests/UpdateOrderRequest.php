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
            'estate_type' => ['required'],
            'min_value' => ['required', 'numeric'],
            'max_value' => ['required', 'numeric'],
            'min_surface' => ['required', 'numeric'],
            'max_surface' => ['required', 'numeric'],
            'min_rooms' => ['required', 'numeric'],
            'max_rooms' => ['required', 'numeric'],
            'furnished' => ['nullable'],
            'elevator' => ['nullable'],
            'garage' => ['nullable'],
            'terraces' => ['nullable'],
            'courtyard' => ['nullable'],
            'heating' => ['nullable'],
            'air_conditioning' => ['nullable'],
            'garden' => ['nullable'],
            'pool' => ['nullable'],
            'situation' => ['required'],
            'conservation_state' => ['required'],
            'need_loan' => ['required'],
            'observations' => ['nullable', 'max:500'],
        ];
    }
}
