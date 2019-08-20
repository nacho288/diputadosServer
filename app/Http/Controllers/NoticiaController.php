<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoticiaRequest;
use App\Noticia;
use App\Categoria;
use Illuminate\Http\Request;
use App\Traits\FileOrNull;


class NoticiaController extends Controller
{
    use FileOrNull;
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
//        $request->validate([
//            'categoria' => 'required'
//        ]);

        $values = $request->all();

        $values['image'] = $this->fileOrNull($request->file('file'));

        $values['destacado'] = boolval($values['destacado']);

        $evento = Noticia::create($values);

//        $evento->categorias()->attach($request->categoria);

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
//        $request->validate([
//            'categoria' => 'required'
//        ]);

        $values = $request->all();

        $values['image'] = $this->fileOrNull($request->file('file'));

        $values['destacado'] = boolval($values['destacado']);

//        $noticia->categorias()->sync($request->categoria);

        $noticia
            ->fill($values)
            ->save();

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
