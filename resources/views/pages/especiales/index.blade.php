@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth
    <div class="row justify-content-center mb-3 mt-5 animated fadeIn ">

        <div class="col col-md-8 col-lg-6 bg-white rounded shadow">

            
            <div class="row justify-content-between align-items-center mb-0 animated fadeIn fast">
                <div class="col col-auto mt-3">
                    <h2 class="blued mb-0">Comiciones especiales</h2>
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
                            <h4 class="mb-0">Nueva comición especial</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <hr class="mt-0">
                        </div>
                    </div>

                    <form action="/especiales" method="POST" enctype="multipart/form-data">
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
                                    <label for="ley">Ley:</label>
                                    <input name="ley" type="text" class="form-control" id="ley" aria-describedby="ley" placeholder="Ley...">
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

            


            @if (count($especiales) != 0)
            @foreach ($especiales as $especial)
            <div class="row">
                
                <div class="col mx-3 mb-3 border shadow-sm p-2">
                    <div class="row">
                        <div class="col mt-2 mb-2">
                                <a class="btn btn-link text-dark" data-toggle="collapse" href="#collapseS{{$especial->id}}" role="button" aria-expanded="false" aria-controls="collapseS{{$especial->id}}">
                                    <h5 class="mb-0">{{$especial->nombre}}</h5>
                                </a>                                
                        </div>
                    </div>

                    <div class="collapse" id="collapseS{{$especial->id}}">

                        <div class="row mt-0 mb-3 p-3 pt-0 ">
                            <div class="col">
                                
                                <div class="row mt-0">
                                    <div class="col">
                                        <hr class="mt-0">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <p class="text-justify">{{$especial->ley}}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <hr class="mt-0">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <h6><b>Miembros: </b>
                                        @if ((count($especial->diputados) == 0))   
                                            (sin miembros)
                                        @endif
                                        </h6>
                                        <ul class="pl-3">
                                            @if ((count($especial->diputados) != 0))
                                            @foreach ($especial->diputados as $diputado)
                                                <li>{{$diputado->apellido}} {{$diputado->nombre}}</li>
                                            @endforeach 
                                            @endif
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
                                        <a class="btn btnColor" href="/especiales/{{  $especial->id }}/edit">Editar</a>
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