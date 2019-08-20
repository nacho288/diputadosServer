<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticiaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method())
        {
            case 'POST':
            case 'PUT':
            case 'PATCH':
                return [
                    'titulo' => 'required|string',
                    'extracto' => 'nullable|string',
                    'cuerpo' => 'required|string',
                    'file' => 'nullable|image',
                    'desde' => 'required|date',
                    'hasta' => 'required|date|after:desde',
                    'destacado' => 'required|boolean',
                    'url_video' => 'nullable|url',
                    'url_audio' => 'nullable|url',
                ];

            default:
                return [];
        }
    }
}
