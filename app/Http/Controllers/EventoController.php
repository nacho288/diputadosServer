<?php

namespace App\Http\Controllers;

use App\Evento;
use App\Categoria;
use App\Http\Requests\EventoRequest;
use Illuminate\Http\Request;
use DB;


class EventoController extends Controller
{
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
        $request->validate([
            'titulo' => 'required|string',
            'cuerpo' => 'required|string',
            'desde' => 'required|date',
            'hasta' => 'required|date',
            'categoria' => 'required'
        ]);

        $imagen = "";
        if ($request->file) {
            $nombre = "img-" . time() . '.' . $request->file->getClientOriginalExtension();
            $request->file->storeAs('img', $nombre);
            $imagen = "/storage/img/" . $nombre;
        }

        $destacado = $request->destacado;

        $evento = Evento::create([
            'titulo' => $request->titulo,
            'extracto' => $request->extracto,
            'cuerpo' => $request->cuerpo,
            'desde' => $request->desde,
            'hasta' => $request->hasta,
            'imagen' => $imagen,
            'url_video' => $request->url_video,
            'destacado' => $destacado,
        ]);

        $evento->categorias()->attach($request->categoria);

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
        $request->validate([
            'titulo' => 'required|string',
            'cuerpo' => 'required|string',
            'desde' => 'required|date',
            'hasta' => 'required|date',
            'categoria' => 'required'
        ]);

        $imagen = "";
        if ($request->file) {
            $nombre = "img-" . time() . '.' . $request->file->getClientOriginalExtension();
            $request->file->storeAs('img', $nombre);
            $imagen = "/storage/img/" . $nombre;
        } else {
            $imagen = $evento->imagen;
        }

        $destacado = true;
        if ($request->has('destacado')) {
            $destacado = true;
        } else {
            $destacado = false;
        }

        $evento->categorias()->detach();
        $evento->categorias()->attach($request->categoria);

        $evento->titulo = $request->titulo;
        $evento->extracto = $request->extracto;
        $evento->cuerpo = $request->cuerpo;
        $evento->desde = $request->desde;
        $evento->hasta = $request->hasta;
        $evento->imagen = $imagen;
        $evento->url_video = $request->url_video;
        $evento->destacado = $destacado;

        $evento->save();

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
