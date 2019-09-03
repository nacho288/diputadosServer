<?php

namespace App\Http\Controllers;

use App\Autoridade;
use App\Diputado;
use Illuminate\Http\Request;

class AutoridadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $autoridades = Autoridade::where('id', '>', 0)->firstOrFail();
        } catch (\Throwable $th) {
            $autoridades = Autoridade::create();
        }

        $diputados = Diputado::all('id', 'apellido', 'nombre')->sortBy("apellido");;

        $pack = [
            'autoridades' => $autoridades,
            'diputados' => $diputados
        ];

        return view('pages.autoridades.index')->with('pack', $pack);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Autoridade  $autoridade
     * @return \Illuminate\Http\Response
     */
    public function show(Autoridade $autoridade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Autoridade  $autoridade
     * @return \Illuminate\Http\Response
     */
    public function edit(Autoridade $autoridade)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Autoridade  $autoridade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Autoridade $autoridade)
    {
        $values = $request->all();

        $autoridade
            ->fill($values)
            ->save();

        return view('pages.autoridades.result');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Autoridade  $autoridade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Autoridade $autoridade)
    {
        //
    }
}
