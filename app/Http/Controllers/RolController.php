<?php

namespace App\Http\Controllers;

use App\Oficina;
use App\Empleado;
use Illuminate\Http\Request;

class RolController extends Controller
{

    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'empleado_id' => 'required'
        ]);

        $oficina  = Oficina::findOrFail($id);

        $oficina->empleados()->attach($request->empleado_id, ['rol' => $request->rol]);

        return view('pages.oficinas.show')->with([
            'oficina' => $oficina,
            'empleados' => Empleado::all()->sortBy("apellido")
        ]);
    }
}
