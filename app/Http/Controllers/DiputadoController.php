<?php

namespace App\Http\Controllers;

use App\diputado;
use Illuminate\Http\Request;

class DiputadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.diputados.index')->with('diputados', diputado::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.diputados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'dni' => 'required|string',
            'fecha_naciminento' => 'required|date',
            'estado_civil' => 'required|string',
            'domicilio' => 'required|string',
            'domicilio_en_santa_fe' => 'required|string',
            'localidad' => 'required|string',
            'departamento' => 'required|string'
        ]);

        $diputado = new diputado();

        $diputado->nombre = $request->nombre;
        $diputado->apellido = $request->apellido;
        $diputado->dni = $request->dni;
        $diputado->fecha_naciminento = $request->fecha_naciminento;
        $diputado->estado_civil = $request->estado_civil;
        $diputado->domicilio = $request->domicilio;
        $diputado->localidad = $request->localidad;
        $diputado->departamento = $request->departamento;
        $diputado->telefono_particular = $request->telefono_particular;
        $diputado->telefono_celular = $request->telefono_celular;
        $diputado->email = $request->email;
        $diputado->profesion = $request->profesion;
        $diputado->domicilio_en_santa_fe = $request->domicilio_en_santa_fe;
        $diputado->conyugue = $request->conyugue;
        $diputado->secretaria = $request->secretaria;
        $diputado->telefono_particular_secretaria = $request->telefono_particular_secretaria;
        $diputado->telefono_celular_secretaria = $request->telefono_celular_secretaria;
        $diputado->email_secretaria = $request->email_secretaria;

        $diputado->save();

        return  view('layouts.diputados.result');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\diputado  $diputado
     * @return \Illuminate\Http\Response
     */
    public function show(diputado $diputado)
    {
        return view('layouts.diputados.show')->with('diputado', $diputado);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\diputado  $diputado
     * @return \Illuminate\Http\Response
     */
    public function edit(diputado $diputado)
    {
        return view('layouts.diputados.edit')->with('diputado', $diputado);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\diputado  $diputado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, diputado $diputado)
    {
        $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'dni' => 'required|string',
            'fecha_naciminento' => 'required|date',
            'estado_civil' => 'required|string',
            'domicilio' => 'required|string',
            'domicilio_en_santa_fe' => 'required|string',
            'localidad' => 'required|string',
            'departamento' => 'required|string'
        ]);

        $diputado->update($request->all());
        return view('layouts.diputados.result');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\diputado  $diputado
     * @return \Illuminate\Http\Response
     */
    public function destroy(diputado $diputado)
    {
        //
    }
}
