<?php

namespace App\Http\Controllers\Api;

use App\Noticia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Noticia[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Noticia::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  Noticia  $noticia
     * @return Noticia
     */
    public function show(Noticia $noticia)
    {
        return $noticia;
    }
}
