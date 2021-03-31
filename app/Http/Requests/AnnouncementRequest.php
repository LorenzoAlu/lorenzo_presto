<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementRequest extends FormRequest
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
            'title' => 'min:3 | max:30 | required',
            'body' => 'min:3 | max:300 | required',
            'price' => 'required | max:10 '
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'title.min' => 'Il titolo deve contenere almeno 3 caratteri',
            'title.max' => 'Il titolo deve contenere meno di 30 caratteri',
            'body.required' => 'La descrizione è obbligatoria',
            'body.min' => 'La descrizione deve contenere almeno 3 caratteri',
            'body.max' => 'La descrizione deve contenere meno di 300 caratteri',
            'price.required' => 'Il prezzo è obbligatorio',
            'price.max' => 'Il prezzo non è valido'

        ];
    }
}
