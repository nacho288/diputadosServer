<?php

namespace App\Http\Controllers\Api;

use App\Diputado;
use App\Http\Controllers\Controller;

class DiputadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Diputado[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Diputado::all();
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
