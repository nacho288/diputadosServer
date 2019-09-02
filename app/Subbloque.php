<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subbloque extends Model
{

    protected $fillable = ['nombre', 'logo', 'presidente_id', 'bloque_id'];

    public function bloque()
    {
        return $this->hasOne(Bloque::class, 'id', 'bloque_id');
    }

    public function diputados()
    {
        return $this->hasMany(Diputado::class);
    }

    public function presidente()
    {
        return $this->hasOne(Diputado::class, 'id', 'presidente_id');
    }
}
