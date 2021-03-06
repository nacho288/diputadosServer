<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoticiaRequest;
use App\Noticia;
use App\Categoria;
use App\Traits\FileOrNull;

class NoticiaController extends Controller
{
    use FileOrNull;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('pages.noticias.index')->with('noticias', Noticia::all()->sortBy("desde"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pages.noticias.create')->with('categorias', Categoria::where('disable', false)->get()->sortBy("nombre"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\NoticiaRequest  $request
     *
     * @return \Illuminate\View\View
     */
    public function store(NoticiaRequest $request)
    {

        $values = $request->all();

        $values['imagen'] = $this->imageOrNull($request->file('file'));

        if (array_key_exists('destacado', $values)) {
            $values['destacado'] = boolval($values['destacado']);
        }   else {
            $values['destacado'] = false;
        }

        $noticia = Noticia::create($values);

        $noticia->categorias()->attach($request->categoria);

        return view('pages.noticias.result');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Noticia  $noticia
     *
     * @return \Illuminate\View\View
     */
    public function show(Noticia $noticia)
    {
        return view('pages.noticias.show')->with('noticia', $noticia);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Noticia  $noticia
     *
     * @return \Illuminate\View\View
     */
    public function edit(Noticia $noticia)
    {
        $categorias = Categoria::where('disable', false)
                                ->orWhere('id', $noticia->categorias[0]->id)
                                ->get()
                                ->sortBy("nombre");

        return view('pages.noticias.edit', [
            'pack' => [
                'noticia' => $noticia,
                'categorias' => $categorias,
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\NoticiaRequest  $request
     * @param  \App\Noticia  $noticia
     *
     * @return \Illuminate\View\View
     */
    public function update(NoticiaRequest $request, Noticia $noticia)
    {
        $values = $request->all();

        if (array_key_exists('sin', $values)) {
            $values['imagen'] = null;
        } else {
            $values['imagen'] = $this->imageOrNull($request->file('file'));
            $values['imagen'] = $values['imagen'] ?? $noticia->imagen;
        }

        if (array_key_exists('destacado', $values)) {
            $values['destacado'] = boolval($values['destacado']);
        } else {
            $values['destacado'] = false;
        }

        $noticia
            ->fill($values)
            ->save();

        // $noticia->categorias()->sync($request->categoria);
        $noticia->categorias()->detach();
        $noticia->categorias()->attach($request->categoria);

        return view('pages.noticias.result');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Noticia  $noticia
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noticia $noticia)
    {
        $noticia->delete();
        return view('pages.noticias.result');
    }
}
