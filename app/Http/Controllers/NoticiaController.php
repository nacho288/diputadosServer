<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoticiaRequest;
use App\Noticia;
use App\Categoria;
use Illuminate\Http\Request;
use DB;


class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.noticias.index')->with('noticias', Noticia::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.noticias.create')->with('categorias', Categoria::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoticiaRequest $request)
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

        $noticia = Noticia::create([
            'titulo' => $request->titulo,
            'extracto' => $request->extracto,
            'cuerpo' => $request->cuerpo,
            'desde' => $request->desde,
            'hasta' => $request->hasta,
            'imagen' => $imagen,
            'url_video' => $request->url_video,
            'destacado' => $destacado,
        ]);

        $noticia->categorias()->attach($request->categoria);

        return view('pages.noticias.result');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function show(Noticia $noticia)
    {
        return view('pages.noticias.show')->with('noticia', $noticia);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function edit(Noticia $noticia)
    {
        return view('pages.noticias.edit')->with( "pack" ,[
            'noticia' => $noticia,
            'categorias' => Categoria::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(NoticiaRequest $request, Noticia $noticia)
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
            $imagen = $noticia->imagen;
        }

        $destacado = true;
        if ($request->has('destacado')) {
            $destacado = true;
        } else {
            $destacado = false;
        }

        $noticia->categorias()->detach();
        $noticia->categorias()->attach($request->categoria);

        $noticia->titulo = $request->titulo;
        $noticia->extracto = $request->extracto;
        $noticia->cuerpo = $request->cuerpo;
        $noticia->desde = $request->desde;
        $noticia->hasta = $request->hasta;
        $noticia->imagen = $imagen;
        $noticia->url_video = $request->url_video;
        $noticia->destacado = $destacado;

        $noticia->save();

        return view('pages.noticias.result');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noticia $noticia)
    {
        //
    }
}
