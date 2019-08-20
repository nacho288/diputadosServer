<?php

namespace App\Http\Controllers\Api;

use App\Evento;
use App\Http\Controllers\Controller;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Evento[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Evento::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  Evento  $evento
     * @return Evento
     */
    public function show(Evento $evento)
    {
        return $evento;
    }
}
