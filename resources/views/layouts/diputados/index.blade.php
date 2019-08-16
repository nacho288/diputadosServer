@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth
    <div class="row justify-content-center mt-5 animated fadeIn">

        <div class="col col-lg-6">

            <div class="row mb-0">
                <div class="col">
                    <h3 class="text-center text-secondary display-4">Listado de diputados</h3>
                </div>
            </div>


            <div class="row justify-content-center mt-3">
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Detalles</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($diputados as $diputado)
                            <tr>
                                <td>{{  $diputado->apellido }} {{  $diputado->nombre }}</td>
                                <td>
                                    <a href="/diputados/{{  $diputado->id }}" class="badge badge-secondary">Detalles</a>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col text-center">
                   <hr>
                </div>
            </div>

        </div>

    </div>
@endauth


@endsection