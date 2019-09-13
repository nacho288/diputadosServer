<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $fillable = [
        'nombre',
        'apellido',
        'foto',
        'email',
    ];

    public function oficinas()
    {
        return $this->belongsToMany(Oficina::class)->withPivot('rol');
    }

    public function internas()
    {
        return $this->hasMany(Interna::class, 'secretario_id', 'id');
    }

}
