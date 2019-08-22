@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth
    <div class="row justify-content-center mt-5 animated fadeIn">

        <div class="col mx-sm-2 col-md-8 col-lg-6 bg-white rounded shadow-sm">

            <div class="row justify-content-between align-items-center mb-0 animated fadeIn fast">
                <div class="col mt-3">
                    <h2 class="blued mb-0">Listado de noticias</h2>
                </div>
                <div class="col mt-3 text-right">
                    <a class="btn btn-sm btnColor" href="/noticias/create">Agregar</a>
                </div>
            </div>

            @if (count($noticias) != 0)
                <div class="row justify-content-center mt-3">
                    <div class="col">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Titulo</th>
                                    <th scope="col">Inicia en</th>
                                    <th scope="col">finaliza en</th>
                                    <th scope="col">Destacada</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($noticias as $noticia)
                                <tr>
                                    <th>{{  $noticia->titulo }}</th>
                                    <td>{{  $noticia->desde }}</td>
                                    <td>{{  $noticia->hasta }}</td>
                                    @if ( $noticia->destacado )
                                        <td>Si</td>
                                    @else
                                        <td>No</td>
                                    @endif
                                    <td>
                                        <a href="/noticias/{{  $noticia->id }}" class="badge btnColor">Detalles</a>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="row mt-0">
                    <div class="col">
                        <hr>
                    </div>
                </div>

                <div class="row mt-3 mb-4">
                    <div class="col text-center">
                        <h4 class="text-secondary font-italic">Ningún elemento registrado</h4>
                    </div>
                </div>
            @endif
            

        </div>

    </div>
@endauth


@endsection