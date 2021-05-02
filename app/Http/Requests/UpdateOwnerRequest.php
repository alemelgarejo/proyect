<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOwnerRequest extends FormRequest
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
            'dni' => 'required|string|max:9|unique:owners,dni,'.$this->route('owner')->id,
            'email' => 'required|string|email|max:255|unique:owners,email,'.$this->route('owner')->id,
            'phone' => 'required|string|max:9|unique:owners,phone,'.$this->route('owner')->id,
            'address' => 'required|string|max:150|unique:owners,address,'.$this->route('owner')->id,
            'city' => ['required', 'string', 'max:150'],
            'status' => ['required'],
            'observations' => ['nullable', 'max:500'],
            'birthdate' => ['required'],
        ];
    }
}
