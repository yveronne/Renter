<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuildingRequest extends FormRequest
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
            'buildingLocation' => 'required',
            'floorsNumber' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            "buildingLocation.required" => 'La localisation de la propriété est requise',
            'floorsNumber.required' => 'Le nombre d\'étages est requis',
            'floorsNumber.integer' => 'Le nombre d\'étages doit être un entier'
        ];
    }
}
