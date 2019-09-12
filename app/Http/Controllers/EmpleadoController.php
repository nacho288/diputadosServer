<?php

namespace App\Http\Controllers;

use App\Empleado;
use Illuminate\Http\Request;
use App\Traits\FileOrNull;

class EmpleadoController extends Controller
{
    use FileOrNull;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.empleados.index')->with('empleados', Empleado::all()->sortBy("apellido"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.empleados.create');
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
            'nombre' => 'required',
            'apellido' => 'required',
        ]);

        $values = $request->all();
        $values['foto'] = $this->imageOrNull($request->file('file'));

        Empleado::create($values);

        return view('pages.empleados.result');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        return view('pages.empleados.show')->with('empleado', $empleado);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        return view('pages.empleados.edit')->with('empleado', $empleado);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        $data = request()->validate([
            'nombre' => 'required',
            'apellido' => 'required',
        ]);

        $values = $request->all();
        $values['foto'] = $this->imageOrNull($request->file('file'));
        $values['foto'] = $values['foto'] ?? $empleado->foto;

        $empleado
            ->fill($values)
            ->save();

        return view('pages.empleados.result');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        //
    }
}
