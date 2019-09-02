<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiputadoRequest extends FormRequest
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
            case 'PUT':
            case 'PATCH':
                return [
                    'nombre' => 'required|string',
                    'apellido' => 'required|string',
                    'dni' => 'required|string',
                    'fecha_nacimiento' => 'required|date',
                    'estado_civil' => 'required|string',
                    'domicilio' => 'required|string',
                    'domicilio_en_santa_fe' => 'required|string',
                    'localidad' => 'required|string',
                    'departamento' => 'required|string',
                ];

            default:
                return [];
        }
    }
}
