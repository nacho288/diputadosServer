<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bloque extends Model
{
    protected $fillable = ['nombre', 'logo'];

    public function subbloques()
    {
        return $this->hasMany(Subbloque::class);
    }

    public function diputados()
    {
        return $this->hasManyThrough(Diputado::class, Subbloque::class);
    }
}
