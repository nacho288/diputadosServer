<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autoridade extends Model
{
    protected $fillable = [
        'presidente_id',
        'vice_id',
        'vice2_id',
        'parlamentario_id',
        'admistrativo_id',
        'subsecretario_id',
    ];

    public function presidente()
    {
        return $this->hasOne(Diputado::class, 'id', 'presidente_id');
    }

    public function vice()
    {
        return $this->hasOne(Diputado::class, 'id', 'vice_id');
    }

    public function vice2()
    {
        return $this->hasOne(Diputado::class, 'id', 'vice2_id');
    }

    public function parlamentario()
    {
        return $this->hasOne(Empleado::class, 'id', 'parlamentario_id');
    }

    public function admistrativo()
    {
        return $this->hasOne(Empleado::class, 'id', 'admistrativo_id');
    }

    public function subsecretario()
    {
        return $this->hasOne(Empleado::class, 'id', 'subsecretario_id');
    }
}
