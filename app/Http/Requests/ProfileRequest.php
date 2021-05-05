<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique((new User)->getTable())->ignore(auth()->id())],
            'dni' => ['required',  Rule::unique((new User)->getTable())->ignore(auth()->id())],
            'comertial' => ['required',  Rule::unique((new User)->getTable())->ignore(auth()->id())],
            'phone' => ['required',  Rule::unique((new User)->getTable())->ignore(auth()->id())],
            'birthdate' => ['required'],
            'description' => ['required', 'max:70'],
            //'photo' => ['nullable', 'image'],
        ];
    }
}
