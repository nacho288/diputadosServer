<?php

namespace App\Http\Controllers;

use App\Diputado;
use App\Http\Requests\DiputadoRequest;
use App\Traits\FileOrNull;

class DiputadoController extends Controller
{
    use FileOrNull;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.diputados.index')->with('diputados', Diputado::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.diputados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiputadoRequest $request)
    {
        $values = $request->all();

        $values['foto'] = $this->imageOrNull($request->file('file'));

        Diputado::create($values);

        return view('pages.diputados.result');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Diputado  $diputado
     * @return \Illuminate\Http\Response
     */
    public function show(Diputado $diputado)
    {
        return view('pages.diputados.show')->with('diputado', $diputado);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Diputado  $diputado
     * @return \Illuminate\Http\Response
     */
    public function edit(Diputado $diputado)
    {
        return view('pages.diputados.edit')->with('diputado', $diputado);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Diputado  $diputado
     * @return \Illuminate\Http\Response
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

        return view('pages.diputados.result');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Diputado  $diputado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diputado $diputado)
    {
        //
    }
}
