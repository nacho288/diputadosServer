<?php

namespace App\Http\Controllers;

use App\Bloque;
use Illuminate\Http\Request;
use App\Traits\FileOrNull;


class BloqueController extends Controller
{

    use FileOrNull;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bloques = Bloque::with('subbloques.diputados')->get();
        return view('pages.bloques.index')->with('bloques', $bloques);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'nombre' => 'required|min:3'
        ]);

        $values = $request->all();
        $values['logo'] = $this->imageOrNull($request->file('file'));

        Bloque::create($values);

        return view('pages.bloques.result');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bloque  $bloque
     * @return \Illuminate\Http\Response
     */
    public function show(Bloque $bloque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bloque  $bloque
     * @return \Illuminate\Http\Response
     */
    public function edit(Bloque $bloque)
    {
        return view('pages.bloques.edit')->with('bloque', $bloque);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bloque  $bloque
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bloque $bloque)
    {
        $data = request()->validate([
            'nombre' => 'required|min:3'
        ]);

        $values = $request->all();
        $values['logo'] = $this->imageOrNull($request->file('file'));
        $values['logo'] = $values['logo'] ?? $bloque->logo;

        $bloque
            ->fill($values)
            ->save();

        return view('pages.bloques.result');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bloque  $bloque
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bloque $bloque)
    {
        //
    }
}
