@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth
    <div class="row justify-content-center mt-5 animated fadeIn">

        <div class="col col-lg-6">

            <div class="row mb-0">
                <div class="col">
                    <h3 class="text-center text-secondary display-4">Listado de eventos</h3>
                </div>
            </div>


            <div class="row justify-content-center mt-3">
                <div class="col">
                    @if (count($eventos) != 0)
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
                            @foreach ($eventos as $evento)
                            <tr>
                                <th>{{  $evento->titulo }}</th>
                                <td>{{  $evento->desde }}</td>
                                <td>{{  $evento->hasta }}</td>
                                @if ( $evento->destacado )
                                    <td>Si</td>
                                @else
                                    <td>No</td>
                                @endif
                                <td>
                                    <a href="/eventos/{{  $evento->id }}" class="badge badge-secondary">Detalles</a>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    @else

                        <div class="row justify-content-center">
                            <div class="col text-center">
                            <hr>
                            </div>
                        </div>


                        <div class="row justify-content-center mt-2">
                            <div class="col text-center">
                                <h3 class="text-secondary">... no hay elementos ...</h3>
                            </div>
                        </div>


                    @endif

                        <div class="row justify-content-center">
                            <div class="col text-center">
                            <hr>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col text-center">
                            <a class="btn btn-dark" href="/eventos/create">Añadir</a>
                            </div>
                        </div>


                </div>
            </div>

        </div>

    </div>
@endauth


@endsection