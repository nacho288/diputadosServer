<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['nombre', 'disable'];

    public function noticias()
    {
        return $this->morphedByMany(Noticia::class, 'categorizable');
    }
    public function eventos()
    {
        return $this->morphedByMany(Evento::class, 'categorizable');
    }
}
