<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentSubmitRequest extends FormRequest
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
        $rules = [
            'price' => 'required|numeric|min:0',
            'title' => 'required',
            'documentType' => 'required',
            'numberOfPage' => 'required|numeric|min:1',
            'idLibrary' => 'required'
        ];

        if(strtolower(FormRequest::input('documentType')) == 'revue'){
            $rules['month'] = 'required';            
            $rules['year'] = 'required|numeric|min:0';            
        }elseif(strtolower(FormRequest::input('documentType')) == 'roman'){
            $rules['literary_price'] = 'required|string';
            $rules['author'] = 'required|string';
            $rules['isbn'] = 'required|max:14';
        }elseif(strtolower(FormRequest::input('documentType')) == 'guide'){
            $rules['school_level'] = 'required|numeric|min:1';
            $rules['author'] = 'required|string';
            $rules['isbn'] = 'required|min:14|max:14';
        }else{
            $rules['language'] = 'required|string';
        }

        return $rules;
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages(){

        return [
            'required' => 'Ce champ est requis.',
            'min' => 'la valeur de ce champ doit être superieur à 1',
            'isbn.min' => 'La valeur de ce champ doit être egale à 14',
            'string' => 'la valeur de ce champ doit être une chaîne de caractères',
            'numeric' => 'La valeur de ce champ doit être un nombre'
        ];
    }
}
