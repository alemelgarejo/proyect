<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEstateRequest extends FormRequest
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
            'owner_id' => ['required'],
            'status' => ['required'],
            'value' => ['required', 'numeric'],
            'type' => ['required'],
            'city' => ['required', 'string', 'min:2', 'max:150'],
            'address' => ['required', 'string', 'min:2', 'max:150'],
            'surface' => ['required', 'numeric'],
            'rooms' => ['required', 'numeric'],
            'baths' => ['required', 'numeric'],
            'furnished' => ['required'],
        ];
    }
}
