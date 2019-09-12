<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oficina extends Model
{
    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'email',
    ];

    public function empleados()
    {
        return $this->belongsToMany(Empleado::class)->withPivot('rol');
    }

}
