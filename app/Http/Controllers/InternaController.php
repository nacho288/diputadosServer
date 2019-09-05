<?php

namespace App\Http\Controllers;

use App\Interna;
use Illuminate\Http\Request;
use App\Traits\FileOrNull;

class InternaController extends Controller
{

    use FileOrNull;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('pages.internas.index', ['internas' => Interna::orderBy('nombre', 'asc')->get()]);
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
        Interna::create($values);

        return view('pages.internas.result');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Interna  $interna
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Interna $interna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Interna  $interna
     *
     * @return \Illuminate\View\View
     */
    public function edit(Interna $interna)
    {
        return view('pages.internas.edit')->with('interna', $interna);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Interna  $interna
     *
     * @return \Illuminate\View\View
     */
    public function update(Request $request, Interna $interna)
    {
        $data = request()->validate([
            'nombre' => 'required|min:3'
        ]);

        $values = $request->all();

        $interna
            ->fill($values)
            ->save();

        return view('pages.internas.result');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Interna  $interna
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Interna $interna)
    {
        //
    }
}
