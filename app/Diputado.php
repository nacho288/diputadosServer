<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diputado extends Model
{
    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'fecha_nacimiento',
        'estado_civil',
        'domicilio',
        'foto',
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
        'subbloque_id'
    ];

    public function bloque()
    {
        return $this->belongsTo(Bloque::class);
    }

    public function subbloque()
    {
        return $this->belongsTo(Subbloque::class);
    }

    public function internas()
    {
        return $this->belongsToMany(Interna::class);
    }

    public function internaTiene($interna_id)
    {
        return $this->internas->where('id', $interna_id)->count() > 0;
    }
}
