<?php

namespace App\Http\Controllers;

use App\Autoridade;
use App\Diputado;
use App\Empleado;
use Illuminate\Http\Request;

class AutoridadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $autoridades = Autoridade::firstOrCreate([]);

        $diputados = Diputado::all('id', 'apellido', 'nombre')->sortBy("apellido");;

        $pack = [
            'autoridades' => $autoridades,
            'diputados' => $diputados,
            'empleados' => Empleado::all()
        ];

        return view('pages.autoridades.index', ['pack' => $pack]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Autoridade  $autoridade
     *
     * @return \Illuminate\View\View
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
