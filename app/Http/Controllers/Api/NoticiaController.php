<?php

namespace App\Http\Controllers\Api;

use App\Noticia;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $now = Carbon::now();

        return Noticia::with('categorias')
            ->where('desde', '<=', $now)
            ->where('hasta', '>=', $now)
            ->orderBy('desde', 'asc')
            ->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  Noticia  $noticia
     *
     * @return Noticia
     */
    public function show(Noticia $noticia)
    {
        $noticia->categorias;

        return $noticia;
    }
}
