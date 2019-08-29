<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentoRequest extends FormRequest
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
        switch ($this->method())
        {
            case 'POST':
                return [
                    'nombre' => 'required|string',
                    'descripcion' => 'nullable|string',
                    'file' => 'required|file',
                ];

            case 'PUT':
            case 'PATCH':
                return [
                    'nombre' => 'required|string',
                    'descripcion' => 'nullable|string',
                    'file' => 'nullable|file',
                ];

            default:
                return [];
        }
    }
}
