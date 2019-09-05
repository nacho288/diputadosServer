<?php

namespace App\Http\Controllers\Api;

use App\Bloque;
use App\Http\Controllers\Controller;

class BloqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Bloque::with('subbloques.diputados')->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bloque  $bloque
     * @return \App\Bloque
     */
    public function show(Bloque $bloque)
    {
        $bloque->subbloques;

        return $bloque;
    }
}
