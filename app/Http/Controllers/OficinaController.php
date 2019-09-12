<?php

namespace App\Http\Controllers;

use App\Oficina;
use App\Empleado;
use Illuminate\Http\Request;

class OficinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.oficinas.index')->with('oficinas', Oficina::all()->sortBy("nombre"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.oficinas.create');
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
            'nombre' => 'required'
        ]);

        Oficina::create($request->all());

        return view('pages.oficinas.result');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Oficina  $oficina
     * @return \Illuminate\Http\Response
     */
    public function show(Oficina $oficina)
    {
        return view('pages.oficinas.show')->with([
            'oficina' => $oficina,
            'empleados' => Empleado::all()->sortBy("apellido")
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Oficina  $oficina
     * @return \Illuminate\Http\Response
     */
    public function edit(Oficina $oficina)
    {
        return view('pages.oficinas.edit')->with('oficina', $oficina);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Oficina  $oficina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Oficina $oficina)
    {
        $data = request()->validate([
            'nombre' => 'required'
        ]);

        $oficina
            ->fill($request->all())
            ->save();

        return view('pages.oficinas.result');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Oficina  $oficina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Oficina $oficina)
    {
        //
    }

    public function storeRol(Request $request, $id)
    {
        $data = request()->validate([
            'empleado_id' => 'required'
        ]);

        $oficina  = Oficina::findOrFail($id);
        $oficina->empleados()->attach($request->empleado_id, ['rol' => $request->rol]);

        return redirect('oficinas/' . $oficina->id);
    }

    public function destroyRol(Request $request, $id)
    {
        $data = request()->validate([
            'empleado_id' => 'required'
        ]);

        $oficina = Oficina::findOrFail($id);
        $oficina->empleados()->detach($request->empleado_id);

        return redirect('oficinas/' . $oficina->id);
    }
}
