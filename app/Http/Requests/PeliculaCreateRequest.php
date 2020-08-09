<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeliculaCreateRequest extends FormRequest
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
            'titulo' => 'min:3|max:100|required',
            'costo' => 'numeric|required',
            'resumen' => 'min:3|max:500|required',
            'estreno' => 'required',
        ];
    }
}
