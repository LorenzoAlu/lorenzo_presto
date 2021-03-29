<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ErrorRequest extends FormRequest
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
            'title' => 'min:3|max:20',
            'body' => 'min:3|max:300'
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'body.min' => "La descrizione è obbligatoria",
    //         'title.min' => "Il titolo è obbligatorio"
    //     ];
    // }
}
