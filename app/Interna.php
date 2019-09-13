<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interna extends Model
{
    protected $fillable = [
        'nombre',
        'presidente_id',
        'vice_id',
        'descripcion',
        'reunion',
        'secretario_id',
        'direccion',
        'telefono',
        'email',
    ];

    public function diputados()
    {
        return $this->belongsToMany(Diputado::class);
    }

    public function presidente()
    {
        return $this->hasOne(Diputado::class, 'id', 'presidente_id');
    }

    public function vice()
    {
        return $this->hasOne(Diputado::class, 'id', 'vice_id');
    }

    public function secretario()
    {
        return $this->hasOne(Empleado::class, 'id', 'secretario_id');
    }
}
