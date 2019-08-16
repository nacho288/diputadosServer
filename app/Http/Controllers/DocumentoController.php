<?php

namespace App\Http\Controllers;

use App\Documento;
use Illuminate\Http\Request;



class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.documentos.index')->with('documentos', Documento::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.documentos.create');
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
            'file' => 'required|file'
        ]);

        $archivo = $request->file('file');

        $nombre = "doc-" . time() . '.' . $archivo->getClientOriginalExtension();

        $archivo->storeAs('public/docs', $nombre);

        $values = $request->all();
        $values['path'] = storage_path("app/public/docs/$nombre");
        $values['url'] = asset("storage/docs/$nombre");

        Documento::create($values);

        // php artisan storage:link

        return view('pages.documentos.result');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function show(Documento $documento)
    {
        return view('pages.documentos.show')->with('documento', $documento);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function edit(Documento $documento)
    {
        return view('pages.documentos.edit')->with('documento', $documento);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Documento $documento)
    {
        $request->validate([
            'nombre' => 'required|string',
        ]);

        if ($request->hasFile('file')) {
            $nombre = "doc-" . time() . '.' . $request->file->getClientOriginalExtension();
            $request->file->storeAs('docs', $nombre);
            $documento->path = "/storage/docs/" . $nombre;
            $documento->url = "/storage/docs/" . $nombre;
        }

        $documento->nombre = $request->nombre;
        $documento->descripcion = $request->descripcion;
        $documento->save();

        return view('pages.documentos.result');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Documento $documento)
    {
        //
    }
}
