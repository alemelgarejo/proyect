<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOwnerRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:150'],
            'dni' => ['required', 'string', 'max:9', 'unique:owners'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:owners'],
            'phone' => ['required', 'string', 'max:9', 'unique:owners'],
            'address' => ['required', 'string', 'max:150', 'unique:owners'],
            'city' => ['required', 'string', 'max:150'],
            'observations' => ['nullable', 'string', 'max:500'],
            'status' => ['required'],
            'birthdate' => ['required'],
        ];
    }
}
