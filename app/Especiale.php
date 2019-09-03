<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especiale extends Model
{
    protected $fillable = [
        'nombre',
        'ley'
    ];

    public function diputados()
    {
        return $this->belongsToMany(Diputado::class);
    }

}
