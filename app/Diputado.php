<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diputado extends Model
{
    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'fecha_naciminento',
        'estado_civil',
        'domicilio',
        'localidad',
        'departamento',
        'telefono_celular',
        'telefono_particular',
        'email',
        'profesion',
        'domicilio_en_santa_fe',
        'conyugue',
        'secretaria',
        'telefono_particular_secretaria',
        'telefono_celular_secretaria',
        'email_secretaria',
    ];
}
