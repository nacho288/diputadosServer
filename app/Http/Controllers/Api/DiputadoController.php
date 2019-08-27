<?php

namespace App\Http\Controllers\Api;

use App\Diputado;
use App\Http\Controllers\Controller;

class DiputadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Diputado::orderBy('apellido', 'asc')->orderBy('nombre', 'asc')->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  Diputado $diputado
     * @return Diputado
     */
    public function show(Diputado $diputado)
    {
        return $diputado;
    }
}
