<?php

namespace App\Http\Controllers\Api;

use App\Evento;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $now = Carbon::now();

        return Evento::with('categorias')
            ->where('desde', '<=', $now)
            ->where('hasta', '>=', $now)
            ->orderBy('desde', 'asc')
            ->get();
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
