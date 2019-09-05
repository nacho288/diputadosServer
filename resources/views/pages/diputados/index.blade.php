@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth
      <div class="row justify-content-center mt-5 animated fadeIn">

        <div class="col col-auto bg-white rounded shadow-sm">

            <div class="row justify-content-between align-items-center mb-0 animated fadeIn fast">
                <div class="col mt-3">
                    <h2 class="blued mb-0">Listado de diputados</h2>
                </div>
                <div class="col col-auto mt-3 text-right">
                    <a class="btn btn-sm btnColor" href="/diputados/create">Agregar</a>
                </div>
            </div>

            @if (count($diputados) != 0)
            <div class="row justify-content-center mt-3">
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Diputados</th>
                                <th scope="col">Bloque</th>
                                <th scope="col ml-4"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($diputados as $diputado)
                            <tr>
                                <td><img class="rounded-circle mr-3" height="40" width="40"
                                    @if ($diputado->foto)
                                    src="{{$diputado->foto}}" 
                                    @else
                                    src="{{ URL::asset('img/avatar.jpg') }}"
                                    @endif
                                    alt=""><b class="mr-4">{{  $diputado->apellido }} {{  $diputado->nombre }}</b></td>
                                <td>{{  $diputado->subbloque['bloque']['nombre'] }}</td>
                                <td>
                                    <a href="/diputados/{{  $diputado->id }}" class="ml-4 badge btnColor">Detalles</a>
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

                <div class="row mt-3 mb-3">
                    <div class="col text-center">
                        <h4 class="text-secondary font-italic">Ningún elemento registrado</h4>
                    </div>
                </div>
            @endif



        </div>

    </div>
@endauth


@endsection