@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth
    <div class="row justify-content-center mt-5 animated fadeIn">

        <div class="col col-lg-6">

            <div class="row mb-0">
                <div class="col">
                    <h3 class="text-center text-secondary display-4">Listado de categorias</h3>
                </div>
            </div>

            <div class="row ">
                <div class="col">
                    <hr>
                </div>
            </div>

            <div class="row justify-content-center mt-3">
                <div class="col col-lg-4">
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
                                    <a href="/categorias/{{  $categoria->id }}/edit" class="badge badge-secondary">editar</a>
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