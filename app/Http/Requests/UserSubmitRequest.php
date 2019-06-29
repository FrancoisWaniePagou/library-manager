<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserSubmitRequest extends FormRequest
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
            'name' => 'required',
            'owner' => 'required',
            'phoneNumber' => 'required|numeric|min:9',
            'city' => 'required',
            'quarter' => 'required',
            'fieldValue' => 'sometimes'
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages(){

        return [
            'required' => 'Ce champ est requis.',
            'phoneNumber.numeric' => 'Le numero de téléphone doit contenir uniquement des chiffres.',
            'phoneNumeric.min' => 'Le numero de téléphone doit contenir au minimum 9 chiffres',
        ];
    }
}
