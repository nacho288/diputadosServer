@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth
    <div class="row justify-content-center mt-5 animated fadeIn">

        <div class="col col-lg-6">

            <div class="row mb-0 animated fadeIn fast">
                <div class="col">
                    <h3 class="text-center text-secondary display-4">Listado de noticias</h3>
                </div>
            </div>


            <div class="row justify-content-center mt-3 animated fadeIn">
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
                                    <a href="/noticias/{{  $noticia->id }}" class="badge badge-secondary">Detalles</a>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
@endauth


@endsection