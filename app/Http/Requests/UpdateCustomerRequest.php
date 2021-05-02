<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
            'dni' => 'required|string|max:9|unique:customers,dni,'.$this->route('customer')->id,
            'email' => 'required|string|email|max:255|unique:customers,email,'.$this->route('customer')->id,
            'phone' => 'required|string|max:9|unique:customers,phone,'.$this->route('customer')->id,
            'address' => 'required|string|max:150|unique:customers,address,'.$this->route('customer')->id,
            'city' => ['required', 'string', 'max:150'],
            'status' => ['required'],
            'birthdate' => ['required'],
        ];
    }
}
