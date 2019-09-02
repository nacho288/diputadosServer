@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth
    <div class="row justify-content-center mb-3 mt-5 animated fadeIn ">

        <div class="col col-md-8 col-lg-6 bg-white rounded shadow">

            
            <div class="row justify-content-between align-items-center mb-0 animated fadeIn fast">
                <div class="col col-auto mt-3">
                    <h2 class="blued mb-0">Comiciones internas</h2>
                </div>
                <div class="col col-auto mt-3 text-right">
                    <a class="btn btn-sm btnColor" data-toggle="collapse" href="#collapseAgregar">Agregar</a>
                </div>
            </div>

            <div class="row mt-0">
                    <div class="col">
                        <hr>
                    </div>
            </div>

            <div class="row collapse" id="collapseAgregar">
                <div class="col mx-3 mb-3 border shadow-sm p-4">

                    <div class="row">
                        <div class="col mb-2">
                            <h4 class="mb-0">Nueva comición interna</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <hr class="mt-0">
                        </div>
                    </div>

                    <form action="/internas" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col">
                                <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                    <input name="nombre" type="text" class="form-control" id="nombre" aria-describedby="nombre" placeholder="Nombre...">
                                    @error('nombre')
                                        <small id="emailHelp" class="form-text text-danger">Este campo es obligatorio.</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="secretario">Secretario:</label>
                                    <input name="secretario" type="text" class="form-control" id="secretario" aria-describedby="secretario" placeholder="Secretario/a...">
                                </div>
                                <div class="form-group">
                                    <label for="direccion">Dirección:</label>
                                    <input name="direccion" type="text" class="form-control" id="direccion" aria-describedby="direccion" placeholder="Dirección...">
                                </div>
                                <div class="form-group">
                                    <label for="telefono">Teléfono:</label>
                                    <input name="telefono" type="text" class="form-control" id="telefono" aria-describedby="telefono" placeholder="Teléfono...">
                                </div>
                                
                                <div class="form-group">
                                    <label for="email">E-mail:</label>
                                    <input name="email" type="text" class="form-control" id="email" aria-describedby="email" placeholder="E-mail...">
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="reunion">Reuniones:</label>
                                    <input name="reunion" type="text" class="form-control" id="reunion" aria-describedby="reunion" placeholder="Reuniones...">
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripción:</label>
                                    <textarea name="descripcion" class="form-control" id="descripcion" placeholder="Descripción..." rows="11"></textarea>
                                </div>
                            </div>
                            

                        </div>
                        <div class="row">
                            <div class="col text-center">
                                <hr>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col text-center">
                                <button type="submit" class="btn btnColor">Guardar</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>

            


            @if (count($internas) != 0)
            @foreach ($internas as $interna)
            <div class="row">
                
                <div class="col mx-3 mb-3 border shadow-sm p-2">
                    <div class="row">
                        <div class="col mt-2 mb-2">
                                <a class="btn btn-link text-dark" data-toggle="collapse" href="#collapseS{{$interna->id}}" role="button" aria-expanded="false" aria-controls="collapseS{{$interna->id}}">
                                    <h4 class="mb-0">{{$interna->nombre}}</h4>
                                </a>                                
                        </div>
                    </div>

                    <div class="collapse" id="collapseS{{$interna->id}}">

                        <div class="row mt-0 mb-3 p-3 pt-0 ">
                            <div class="col">
                                
                                <div class="row mt-0">
                                    <div class="col">
                                        <hr class="mt-0">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <h5>Descripción:</h5>
                                    </div>
                                </div>
                                
                                
                                <div class="row">
                                    <div class="col">
                                        <p class="text-justify">{{$interna->descripcion}}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <hr class="mt-0">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <ul class="pl-3">
                                            @if ($interna->presidente)
                                                <li><b>Presidente: </b>{{$interna->presidente->apellido}} {{$interna->presidente->nombre}}</li>
                                            @endif
                                            @if ($interna->vice)
                                                <li><b>Vicepresidente: </b>{{$interna->vice->apellido}} {{$interna->vice->nombre}}</li>
                                            @endif
                                            <li><b>Secretario/a: </b>{{$interna->secretario}}</li>
                                            <li><b>Direccion: </b>{{$interna->direccion}}</li>
                                            <li><b>Teléfono: </b>{{$interna->telefono}}</li>
                                            <li><b>Reuniones: </b>{{$interna->reunion}}</li>
                                            <li><b>E-mail: </b>{{$interna->email}}</li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <h6><b>Miembros:</b></h6>
                                        <ul class="pl-3">
                                            @foreach ($interna->diputados as $diputado)
                                                <li>{{$diputado->apellido}} {{$diputado->nombre}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <hr class="mt-0">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col text-right">
                                        <a class="btn btnColor" href="/internas/{{  $interna->id }}/edit">Editar</a>
                                    </div>
                                </div>

                            </div>
                        </div>

                        
                    


                    </div>

                </div>
                
            </div>
            @endforeach

            
            @else
                <div class="row mt-0">
                    <div class="col">
                        <hr>
                    </div>
                </div>

                <div class="row mt-3 mb-2">
                    <div class="col text-center">
                        <h4 class="text-secondary font-italic">Ningún elemento registrado</h4>
                    </div>
                </div>
            @endif

        </div>

    </div>
@endauth


@endsection