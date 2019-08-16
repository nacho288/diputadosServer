@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth
    <div class="row justify-content-center mt-5 animated fadeIn">

        <div class="col col-lg-6">

            <div class="row mb-0">
                <div class="col">
                    <h3 class="text-center text-secondary display-4">Listado de documentos</h3>
                </div>
            </div>


            <div class="row justify-content-center mt-3">
                <div class="col col-lg-8">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Detalles</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($documentos as $documento)
                            <tr>
                                <td>{{  $documento->nombre }}</td>
                                <td>
                                    <a href="/documentos/{{  $documento->id }}" class="badge badge-secondary">Detalles</a>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col col-lg-8 text-center">
                   <hr>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col text-center">
                    <a href="/documentos/create" class="btn btn-dark">Nuevo</a>
                </div>
            </div>

        </div>

    </div>
@endauth


@endsection