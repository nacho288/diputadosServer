<?php

namespace App\Http\Controllers;

use App\Especiale;
use Illuminate\Http\Request;

class EspecialeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('pages.especiales.index', ['especiales' => Especiale::orderBy('nombre', 'asc')->get()]);
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
     *
     * @return \Illuminate\View\View
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'nombre' => 'required|min:3'
        ]);

        $values = $request->all();
        Especiale::create($values);

        return view('pages.especiales.result');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Especiale  $especial
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Especiale $especial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Especiale  $especial
     *
     * @return \Illuminate\View\View
     */
    public function edit(Especiale $especiale)
    {
        return view('pages.especiales.edit')->with('especial', $especiale);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Especiale  $especial
     *
     * @return \Illuminate\View\View
     */
    public function update(Request $request, Especiale $especiale)
    {
        $data = request()->validate([
            'nombre' => 'required|min:3'
        ]);

        $values = $request->all();

        $especiale
            ->fill($values)
            ->save();

        return view('pages.especiales.result');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Especiale  $especial
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Especiale $especiale)
    {
        $especiale->diputados()->detach();
        $especiale->delete();
        return view('pages.especiales.result');
    }
}
