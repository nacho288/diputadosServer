<?php

namespace App\Http\Controllers\Api;

use App\Categoria;
use App\Http\Controllers\Controller;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Categoria::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  Categoria $categoria
     *
     * @return Categoria
     */
    public function show(Categoria $categoria)
    {
        return $categoria;
    }
}
