<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class noticia extends Model
{
    public function categorias()
    {
        return $this->morphToMany(categoria::class, 'categorizable');
    }
}
