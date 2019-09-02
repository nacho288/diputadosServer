<?php

namespace App\Http\Controllers;

use App\Subbloque;
use Illuminate\Http\Request;
use App\Traits\FileOrNull;


class SubbloqueController extends Controller
{

    use FileOrNull;


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Subbloque::all();
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
            'nombre' => 'required|min:3',
            'bloque_id' => 'required'
        ]);

        $values = $request->all();
        $values['logo'] = $this->imageOrNull($request->file('file'));

        Subbloque::create($values);

        return view('pages.bloques.result');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subbloque  $subbloque
     * @return \Illuminate\Http\Response
     */
    public function show(Subbloque $subbloque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subbloque  $subbloque
     * @return \Illuminate\Http\Response
     */
    public function edit(Subbloque $subbloque)
    {
        return view('pages.subbloques.edit')->with('subbloque', $subbloque);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subbloque  $subbloque
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subbloque $subbloque)
    {
        $data = request()->validate([
            'nombre' => 'required|min:3'
        ]);

        $values = $request->all();
        $values['logo'] = $this->imageOrNull($request->file('file'));
        $values['logo'] = $values['logo'] ?? $subbloque->logo;

        $subbloque
            ->fill($values)
            ->save();

        return view('pages.bloques.result');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subbloque  $subbloque
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subbloque $subbloque)
    {
        //
    }
}
