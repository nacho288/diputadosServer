<?php

namespace App\Http\Controllers;

use App\Documento;
use App\Http\Requests\DocumentoRequest;
use App\Traits\FileOrNull;

class DocumentoController extends Controller
{
    use FileOrNull;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('pages.documentos.index')->with('documentos', Documento::all()->sortBy("nombre"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pages.documentos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\DocumentoRequest  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentoRequest $request)
    {
        $values = $request->all();

        $retry = $this->docOrNull($request->file('file'));

        $values['path'] = $retry['path'];
        $values['url'] = asset("storage/docs/{$retry['nombre']}");

        Documento::create($values);

        return view('pages.documentos.result');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Documento  $documento
     *
     * @return \Illuminate\View\View
     */
    public function show(Documento $documento)
    {
        return view('pages.documentos.show')->with('documento', $documento);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Documento  $documento
     *
     * @return \Illuminate\View\View
     */
    public function edit(Documento $documento)
    {
        return view('pages.documentos.edit')->with('documento', $documento);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\DocumentoRequest  $request
     * @param  \App\Documento  $documento
     *
     * @return \Illuminate\Http\Response
     */
    public function update(DocumentoRequest $request, Documento $documento)
    {
        $values = $request->all();

        $retry = $this->docOrNull($request->file('file'));

        if ($retry['path']) {
            $values['path'] = $retry['path'];
            $values['url'] = asset("storage/docs/{$retry['nombre']}");
        } else {
            $values['path'] = $documento->path;
            $values['url'] = $documento->url;
        }

        $documento
            ->fill($values)
            ->save();

        return view('pages.documentos.result');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Documento  $documento
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Documento $documento)
    {
        //
    }
}
