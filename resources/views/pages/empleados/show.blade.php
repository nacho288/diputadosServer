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

            <div class="row mt-3">
                <div class="col">
                    <hr class="my-0">
                </div>
            </div>

            @if ($autoridades->parlamentario_id != $empleado->id &&
                $autoridades->admistrativo_id != $empleado->id &&
                $autoridades->subsecretario_id != $empleado->id &&
                count($empleado->internas) == 0 &&
                count($empleado->oficinas) == 0)
            <div class="row justify-content-between my-4">
                <div class="col text-center">
                    <h4 class="mb-0 text-secondary font-italic">... Sin asignaciones ...</h4>
                </div>
            </div>
            @endif

            @if ($autoridades->parlamentario_id == $empleado->id)
            <div class="row mt-3">
                <div class="col border mx-3 p-3 rounded shadow-sm text-center blued">
                    <h5>Secretaria/o parlamentario de la cámara</h5>
                </div>
            </div>
            @endif

            @if ($autoridades->admistrativo_id == $empleado->id)
            <div class="row mt-3">
                <div class="col border mx-3 p-3 rounded shadow-sm text-center blued">
                    <h5>Secretaria/o administrativo de la cámara</h5>
                </div>
            </div>
            @endif

            @if ($autoridades->subsecretario_id == $empleado->id)
            <div class="row mt-3">
                <div class="col border mx-3 p-3 rounded shadow-sm text-center blued">
                    <h5>Subsecretaria/o de la cámara</h5>
                </div>
            </div>
            @endif

            @if (count($empleado->oficinas) != 0)
            <div class="row mt-3">
                <div class="col border mx-3 p-3 rounded shadow-sm">
                    <div class="row">
                        <div class="col">
                            <h4>Oficinas asociadas:</h4>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-2">
                        <div class="col">
                                <table  id="example" class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Oficinas</th>
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
                </div>
            </div>
            @endif

            @if (count($empleado->internas) != 0)
            <div class="row mt-3">
                <div class="col border mx-3 p-3 rounded shadow-sm">
                    <div class="row">
                        <div class="col">
                            <h4>Comisiones asociadas:</h4>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-2">
                        <div class="col">
                                <table  id="example" class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Comision</th>
                                        <th scope="col">Rol</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($empleado->internas as $interna)
                                    <tr>
                                        <td>
                                            <b class="">{{  $interna->nombre }}</b></td>
                                        <td>
                                            Secretaria/o
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
                
            @endif

            <div class="row mt-3">
                <div class="col">
                    <hr class="my-0">
                </div>
            </div>

            <div class="row my-3">
                <div class="col text-center">
                    <a href="/empleados" class="btn btnColor">Volver</a>
                </div>
            </div>

        </div>
    
    </div>
@endauth


@endsection