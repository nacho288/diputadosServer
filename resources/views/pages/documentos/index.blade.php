@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth
    <div class="row justify-content-center mt-5 animated fadeIn">

        <div class="col col-md-6 col-lg-4 bg-white rounded shadow">

            <div class="row mb-0">
                <div class="col mt-3">
                    <h2 class="blued mb-0">Listado de documentos</h2>
                </div>
            </div>


            <div class="row justify-content-center mt-3 mb-0">
                <div class="col">
                    <table class="table mb-0">
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
                                    <a href="/documentos/{{  $documento->id }}" class="badge btnColor">Detalles</a>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col text-center">
                   <hr clas="mt-0">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col text-center">
                    <a href="/documentos/create" class="btn btnColor">Nuevo</a>
                </div>
            </div>

        </div>

    </div>
@endauth


@endsection