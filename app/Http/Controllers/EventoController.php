<?php

namespace App\Http\Controllers;

use App\Evento;
use App\Categoria;
use App\Http\Requests\EventoRequest;
use Illuminate\Http\Request;
use App\Traits\FileOrNull;


class EventoController extends Controller
{
    use FileOrNull;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.eventos.index')->with('eventos', Evento::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.eventos.create')->with('categorias', Categoria::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventoRequest $request)
    {
//        $request->validate([
//            'categoria' => 'required'
//        ]);

        $values = $request->all();

        $values['image'] = $this->fileOrNull($request->file('file'));

        $values['destacado'] = boolval($values['destacado']);

        $evento = Evento::create($values);

//        $evento->categorias()->attach($request->categoria);

        return view('pages.eventos.result');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        return view('pages.eventos.show')->with('evento', $evento);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit(Evento $evento)
    {
        return view('pages.eventos.edit')->with("pack", [
            'evento' => $evento,
            'categorias' => Categoria::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(EventoRequest $request, Evento $evento)
    {
//        $request->validate([
//            'categoria' => 'required'
//        ]);

        $values = $request->all();

        $values['image'] = $this->fileOrNull($request->file('file'));

        $values['destacado'] = boolval($values['destacado']);

//        $evento->categorias()->sync($request->categoria);

        $evento
            ->fill($values)
            ->save();

        return view('pages.eventos.result');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evento $evento)
    {
        //
    }
}
