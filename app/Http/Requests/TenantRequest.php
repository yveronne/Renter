<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TenantRequest extends FormRequest
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
            'lastName' => 'required|string',
            'firstName' => 'string',
            'email' => 'email',
            'cniNumber'=> 'required|string',
            'profession' => 'string',
            'phoneNumber' => 'required|string',
            'tenureDate' => 'date',
            'maritalStatus' => 'string'
        ];
    }
}
