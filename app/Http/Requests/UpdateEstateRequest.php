<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEstateRequest extends FormRequest
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
            'interest_type' => ['required'],
            'city' => ['required', 'string', 'min:2', 'max:150'],
            'address' => ['required', 'string', 'min:2', 'max:150'],
            'surface' => ['required', 'numeric'],
            'built_surface' => ['nullable', 'numeric'],
            'rooms' => ['required', 'numeric'],
            'baths' => ['required', 'numeric'],
            'wardrobe' => ['nullable'],
            'lobbies' => ['nullable', 'numeric'],
            'lobbies_surface' => ['nullable', 'numeric'],
            'furnished' => ['required'],
            'separate_dining_room' => ['nullable'],
            'dining_room_surface' => ['nullable', 'numeric'],
            'furnished_kitchen' => ['nullable'],
            'kitchen_type' => ['nullable'],
            'terraces' => ['nullable', 'numeric'],
            'terraces_surface' => ['nullable', 'numeric'],
            'balcony' => ['nullable'],
            'balcony_surface' => ['nullable', 'numeric'],
            'courtyard' => ['nullable'],
            'courtyard_surface' => ['nullable', 'numeric'],
            'courtyard_location' => ['nullable'],
            'situation' => ['nullable'],
            'ceiling_height' => ['nullable'],
            'garage' => ['nullable'],
            'garage_surface' => ['nullable', 'numeric'],
            'storage_room' => ['nullable'],
            'storage_room_surface' => ['nullable', 'numeric'],
            'basement' => ['nullable'],
            'basement_surface' => ['nullable', 'numeric'],
            'heating' => ['nullable'],
            'heating_type' => ['nullable'],
            'air_conditioning' => ['nullable'],
            'air_conditioning_type' => ['nullable'],
            'building_type' => ['nullable'],
            'floors' => ['nullable', 'numeric'],
            'floor' => ['nullable', 'numeric'],
            'pool' => ['nullable'],
            'elevator' => ['nullable'],
            'urbanization' => ['nullable'],
            'garden' => ['nullable'],
            'garden_surface' => ['nullable', 'numeric'],
            'building_date' => ['nullable', 'date'],
            'conservation_state' => ['nullable'],
            'latitude' => ['nullable'],
            'longitude' => ['nullable'],
            'google_maps' => ['nullable'],
        ];
    }
}
