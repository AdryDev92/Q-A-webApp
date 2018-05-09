<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateQuestionsRequest extends FormRequest
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
            'title' => [
                'required', 'max: 80', 'min: 4'
            ],
            'content' => [
                'required', 'max: 500'
            ],
            'category' => [
                'required'
            ],
            'hashtag' => [
                'required'
            ]

        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Por favor, introduce un título válido',
            'title.max' => 'El número máximo de caracteres es 80',
            'title.min' => 'El número minimo de caracteres es 4',
            'content.required' => 'El contenido es inválido',
            'content.max' => 'El número máximo de caracteres es 500',
            'category.required' => 'Por favor, selecciona una categoría'
        ];
    }

    public function validarTitulo(){
        return 'required|string|min:15|max:200';
    }



}
