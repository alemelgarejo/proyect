<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'role_id' => ['required'],
            'dni' => 'required|string|max:9|unique:users,dni,' . $this->route('user')->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->route('user')->id,
            'comertial' => 'nullable|string|max:6',
            'phone' => 'required|string|max:9|unique:users,phone,' . $this->route('user')->id,
            'birthdate' => ['required'],
            'description' => ['required', 'max:70'],
            'facebook_link' => ['nullable'],
            'twitter_link' => ['nullable'],
            'instagram_link' => ['nullable'],
            'pinterest_link' => ['nullable'],
            'dribble_link' => ['nullable'],
        ];
    }
}
