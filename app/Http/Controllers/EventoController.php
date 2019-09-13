<?php

namespace App\Http\Controllers;

use App\Evento;
use App\Categoria;
use App\Http\Requests\EventoRequest;
use App\Traits\FileOrNull;

class EventoController extends Controller
{
    use FileOrNull;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('pages.eventos.index')->with('eventos', Evento::all()->sortBy("desde"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pages.eventos.create')->with('categorias', Categoria::where('disable', false)->get()->sortBy("nombre"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\EventoRequest  $request
     *
     * @return \Illuminate\View\View
     */
    public function store(EventoRequest $request)
    {
        $values = $request->all();

        $values['imagen'] = $this->imageOrNull($request->file('file'));

        if (array_key_exists('destacado', $values)) {
            $values['destacado'] = boolval($values['destacado']);
        } else {
            $values['destacado'] = false;
        }

        $evento = Evento::create($values);

        $evento->categorias()->attach($request->categoria);

        return view('pages.eventos.result');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Evento  $evento
     *
     * @return \Illuminate\View\View
     */
    public function show(Evento $evento)
    {
        return view('pages.eventos.show')->with('evento', $evento);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Evento  $evento
     *
     * @return \Illuminate\View\View
     */
    public function edit(Evento $evento)
    {
        $categorias = Categoria::where('disable', false)
            ->orWhere('id', $evento->categorias[0]->id)
            ->get()
            ->sortBy("nombre");

        return view('pages.eventos.edit')->with("pack", [
            'evento' => $evento,
            'categorias' =>  $categorias,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\EventoRequest  $request
     * @param  \App\Evento  $evento
     *
     * @return \Illuminate\View\View
     */
    public function update(EventoRequest $request, Evento $evento)
    {
        $values = $request->all();

        if (array_key_exists('sin', $values)) {
            $values['imagen'] = null;
        } else {
            $values['imagen'] = $this->imageOrNull($request->file('file'));
            $values['imagen'] = $values['imagen'] ?? $evento->imagen;
        }

        if (array_key_exists('destacado', $values)) {
            $values['destacado'] = boolval($values['destacado']);
        } else {
            $values['destacado'] = false;
        }

        $evento
            ->fill($values)
            ->save();

        $evento->categorias()->detach();
        $evento->categorias()->attach($request->categoria);

        return view('pages.eventos.result');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Evento  $evento
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evento $evento)
    {
        $evento->delete();
        return view('pages.eventos.result');
    }
}
