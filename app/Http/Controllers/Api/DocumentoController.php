<?php

namespace App\Http\Controllers\Api;

use App\Documento;
use App\Http\Controllers\Controller;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Documento::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  Documento $documento
     * @return Documento
     */
    public function show(Documento $documento)
    {
        return $documento;
    }
}
