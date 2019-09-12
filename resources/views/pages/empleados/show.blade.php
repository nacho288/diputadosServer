@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth




    <div class="row justify-content-center mt-5 animated fadeIn mb-5">

        <div class="col col-auto bg-white rounded shadow-sm">

            <div class="row align-items-center p-0 mt-3">

                <div class="col">
                    <div class="row align-items-center">

                        <div class="col col-auto">
                            @if ($empleado->foto)
                                <img class="rounded-circle shadow-sm" src="{{$empleado->foto}}" height="80" width="80" alt="">
                            @else
                                <img class="rounded-circle shadow-sm" src="{{URL::asset('img/avatar.jpg')}}" height="80" width="80" alt="">
                            @endif
                        </div>
                        
                        <div class="col p-0">
                            <div class="row">
                                <div class="col">
                                    <h2 class="blued m-0">{{  $empleado->apellido }} {{  $empleado->nombre }}</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5 class="text-secondary font-italic">
                                        {{  $empleado->email }}
                                    </h5>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col col-auto ml-3 mr-3 text-right">
                    <a  class="btn btnColor" href="/empleados/{{  $empleado->id  }}/edit">Editar</a>
                </div>

            </div>

            <div class="row my-3">
                <div class="col">
                    <hr class="my-0">
                </div>
            </div>

            @if (count($empleado->oficinas) != 0)
                <div class="row">
                    <div class="col">
                        <h4>Oficinas asociadas:</h4>
                    </div>
                </div>

                <div class="row justify-content-center mt-2 mb-3">
                <div class="col">
                        <table  id="example" class="table">
                        <thead>
                            <tr>
                                <th scope="col">Oficina</th>
                                <th scope="col">Rol</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($empleado->oficinas as $oficina)
                            <tr>
                                <td>
                                    <b class="">{{  $oficina->nombre }}</b></td>
                                <td>
                                    {{  $oficina->pivot->rol }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @else
                <div class="row justify-content-between my-4">
                <div class="col text-center">
                    <h4 class="mb-0 text-secondary font-italic">... Sin oficinas asignadas ...</h4>
                </div>
            </div>
            @endif

            
         
        </div>
    
    </div>
@endauth


@endsection