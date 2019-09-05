@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth
    <div class="row justify-content-center  mt-5 animated fadeIn">
        <div class="col col-auto bg-white rounded shadow-sm">
            
             <div class="row mb-0 align-items-center">
                <div class="col mt-3">
                    <h2 class="blued mb-0">Listado de categorias</h2>
                </div>
                <div class="col col-auto mt-4 text-right p-0 mr-3">
                    <a class="btn btn-sm btnColor" href="/categorias/create">Agregar</a>
                </div>
            </div>

            @if (count($categorias) != 0)
            <div class="row justify-content-center mt-3">
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorias as $categoria)
                            <tr>
                                <td>{{  $categoria->id }}</td>
                                <td>{{  $categoria->nombre }}</td>
                                <td>
                                    <a href="/categorias/{{  $categoria->id }}/edit" class="badge btnColor">editar</a>
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