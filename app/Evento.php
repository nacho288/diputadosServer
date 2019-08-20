<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = [
        'titulo',
        'extracto',
        'cuerpo',
        'imagen',
        'desde',
        'hasta',
        'destacado',
        'url_video',
        'url_audio',
    ];

    public function categorias()
    {
        return $this->morphToMany(Categoria::class, 'categorizable');
    }
}
