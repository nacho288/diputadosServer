<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    protected $fillable = ['nombre'];

    public function noticias()
    {
        return $this->morphedByMany(noticia::class, 'categorizable');
    }
    public function eventos()
    {
        return $this->morphedByMany(evento::class, 'categorizable');
    }
}
