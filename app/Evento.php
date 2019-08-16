<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    public function categorias()
    {
        return $this->morphToMany(Categoria::class, 'categorizable');
    }
}
