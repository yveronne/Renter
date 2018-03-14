<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApartmentRequest extends FormRequest
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
            'apartmentNumber' => 'integer|required',
            'monthlyRent' => 'integer|required',
            'livingRoomsNumber' => 'required|integer',
            'kitchensNumber' => 'required|integer',
            'bedroomsNumber' => 'required|integer',
            'bathroomsNumber' => 'required|integer'
        ];
    }
}
