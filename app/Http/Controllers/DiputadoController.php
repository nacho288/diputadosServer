<?php

namespace App\Http\Controllers;

use App\Diputado;
use App\Http\Requests\DiputadoRequest;
use App\Traits\FileOrNull;
use App\Bloque;
use App\Especiale;
use App\Interna;



class DiputadoController extends Controller
{
    use FileOrNull;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('pages.diputados.index')->with('diputados', Diputado::all()->sortBy("apellido"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $pack = [
            'bloques' => Bloque::all(),
            'internas' => Interna::all(),
            'especiales' => Especiale::all(),
        ];

        return view('pages.diputados.create')->with('pack', $pack);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\DiputadoRequest  $request
     *
     * @return \Illuminate\View\View
     */
    public function store(DiputadoRequest $request)
    {
        $values = $request->all();

        $values['foto'] = $this->imageOrNull($request->file('file'));

        $diputado = Diputado::create($values);

        if ($request->internas) {
            $diputado->internas()->attach($request->internas);
        }

        if ($request->especiales) {
            $diputado->especiales()->attach($request->especiales);
        }

        return view('pages.diputados.result');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Diputado  $diputado
     *
     * @return \Illuminate\View\View
     */
    public function show(Diputado $diputado)
    {
        return view('pages.diputados.show')->with('diputado', $diputado);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Diputado  $diputado
     *
     * @return \Illuminate\View\View
     */
    public function edit(Diputado $diputado)
    {
        $pack= [
            'diputado' => $diputado,
            'bloques' => Bloque::all(),
            'internas' => Interna::all(),
            'especiales' => Especiale::all(),
        ];

        return view('pages.diputados.edit')->with('pack', $pack);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\DiputadoRequest  $request
     * @param  \App\Diputado  $diputado
     *
     * @return \Illuminate\View\View
     */
    public function update(DiputadoRequest $request, Diputado $diputado)
    {
        $values = $request->all();

        if (array_key_exists('sin', $values)) {
            $values['foto'] = null;
        } else {
            $values['foto'] = $this->imageOrNull($request->file('file'));
            $values['foto'] = $values['foto'] ?? $diputado->foto;
        }

        $diputado
            ->fill($values)
            ->save();

        $diputado->internas()->sync($request->internas);
        $diputado->especiales()->sync($request->especiales);

        return view('pages.diputados.result');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Diputado  $diputado
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diputado $diputado)
    {
        //
    }
}
