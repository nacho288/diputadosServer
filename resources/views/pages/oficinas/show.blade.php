@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth

    <div class="row justify-content-center mt-5 animated fadeIn mb-5">

        <div class="col col-auto bg-white rounded shadow-sm">

            <div class="row justify-content-between align-items-center mb-0">
                <div class="col col-auto mt-3">
                    <h2 class="blued mb-0">{{$oficina->nombre}}</h2>
                </div>
                <div class="col col-auto mt-3 text-right">
                    <a class="btn btn-sm btnColor" href="/oficinas/{{  $oficina->id }}/edit">Editar</a>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col">
                    <hr class="my-0">
                </div>
            </div>

            <div class="row">
                <div class="col m-3 pt-3 border rounded shadow-sm">
                    <div class="row mb-0">
                        <div class="col mb-0">
                            <ul>
                            @if ($oficina->direccion)
                            <li><b>Dirección:</b> {{$oficina->direccion}}</li>     
                            @endif   
                            @if ($oficina->telefono)
                            <li><b>Teléfono:</b> {{$oficina->telefono}}</li>    
                            @endif
                            </ul>
                        </div>
                        <div class="col mb-0">
                            @if ($oficina->email)
                            <ul>
                            <li><b>email:</b> {{$oficina->email}}</li>
                            </ul>    
                            @endif
                        </div>
                    </div>
                </div>
            </div>



            @if (true)
            <div class="row">
                <div class="col border shadow-sm p-3 mx-3">
                    <div class="row justify-content-between ">
                        <div class="col col-auto">
                            <h3 class="mb-0">Listado de miembros:</h3>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-3 mb-0">
                        <div class="col">
                                <table  id="example" class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Empleado</th>
                                        <th scope="col">Rol</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($oficina->empleados as $empleado)
                                    <tr>
                                        <td><img class="rounded-circle mr-3" height="40" width="40"
                                            @if ($empleado->foto)
                                            src="{{$empleado->foto}}" 
                                            @else
                                            src="{{ URL::asset('img/avatar.jpg') }}"
                                            @endif
                                            alt="">
                                            <a class="text-dark" href="/empleados/{{$empleado->id}}">
                                                <b class="mr-4">{{  $empleado->apellido }} {{  $empleado->nombre }}</b></td>
                                            </a>
                                            
                                        <td>
                                            {{  $empleado->pivot->rol }}
                                        </td>
                                        <td>
                                            <form action="/roles/{{$oficina->id}}" method="POST" enctype="multipart/form-data">
                                            @method('delete')
                                            @csrf
                                            <input type="hidden" name="empleado_id" value="{{$empleado->id}}">
                                            <button type="submit" class="btn btn-sm ml-3 btnColor">quitar</button>
                                            </form>    
                                        </td>
                                    </tr>
                                    @endforeach
                                    <form action="/roles/{{$oficina->id}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <select name="empleado_id" class="form-control" id="empleado_id">
                                                    <option selected>Nuevo empleado</option>
                                                    @foreach ($empleados as $empleado)
                                                        <option value="{{$empleado->id}}">{{$empleado->apellido}} {{$empleado->nombre}}</option>  
                                                    @endforeach
                                                </select>
                                            </div>
                                        <td>
                                            <div class="form-group">
                                                <input name="rol" type="text" class="form-control" id="rol" aria-describedby="rol" placeholder="Rol...">
                                            </div>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-sm btnColor ml-3">añadir</button>
                                        </td>
                                    </tr>
                                    
                                    </form>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            @else
            <div class="row mt-3 mb-3">
                <div class="col ">
                    <hr class="my-0">
                </div>
            </div>

            <div class="row justify-content-between my-4">
                <div class="col text-center">
                    <h4 class="mb-0 text-secondary font-italic">... Sin asignar ...</h4>
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
                    <a href="/oficinas" class="btn btnColor">Volver</a>
                </div>
            </div>



        </div>
    
    </div>
@endauth


@endsection