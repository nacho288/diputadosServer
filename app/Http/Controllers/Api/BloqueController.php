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
        return Bloque::with(['subbloques' => function ($query) {
            $query->with([
                'presidente:id,nombre,apellido,foto,subbloque_id',
                'diputados:id,nombre,apellido,foto,subbloque_id',
            ]);
        }])->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bloque  $bloque
     *
     * @return \App\Bloque
     */
    public function show(Bloque $bloque)
    {
        $bloque->subbloques = $bloque
            ->subbloques()
            ->with([
                'presidente:id,nombre,apellido,foto,subbloque_id',
                'diputados:id,nombre,apellido,foto,subbloque_id',
            ])
            ->get();

        return $bloque;
    }
}
