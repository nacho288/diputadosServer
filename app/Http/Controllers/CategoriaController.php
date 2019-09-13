<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Http\Requests\CategoriaRequest;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('pages.categorias.index', ['categorias' => Categoria::where('disable', false)->get()->sortBy("nombre")]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pages.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CategoriaRequest  $request
     *
     * @return \Illuminate\View\View
     */
    public function store(CategoriaRequest $request)
    {
        Categoria::create($request->all());

        return view('pages.categorias.result');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     *
     * @return \Illuminate\View\View
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoria  $categoria
     *
     * @return \Illuminate\View\View
     */
    public function edit(Categoria $categoria)
    {
        return view('pages.categorias.edit', ['categoria' => $categoria]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CategoriaRequest  $request
     * @param  \App\Categoria  $categoria
     *
     * @return \Illuminate\View\View
     */
    public function update(CategoriaRequest $request, Categoria $categoria)
    {
        $categoria
            ->fill($request->all())
            ->save();

        return view('pages.categorias.result');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categoria
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->disable = true;
        $categoria->save();
        return view('pages.categorias.result');
    }
}
