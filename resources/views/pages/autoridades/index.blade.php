@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth
    <div class="row justify-content-center mb-3 mt-5 animated fadeIn ">

        <div class="col col-md-8 col-lg-6 bg-white rounded shadow">

            
            <div class="row justify-content-between align-items-center mb-0 animated fadeIn fast">
                <div class="col col-auto mt-3">
                    <h2 class="blued mb-0">Autoridades de la cámara</h2>
                </div>
                <div class="col col-auto mt-3 text-right">
                    <a class="btn btn-sm btnColor" data-toggle="collapse" href="#collapseAgregar">Editar</a>
                </div>
            </div>

            <div class="collapse" id="collapseAgregar">

                <div class="row mt-0">
                    <div class="col">
                        <hr>
                    </div>
                </div>

                <div class="card card-body shadow-sm m-3">
                    <div class="row">
                        <div class="col">
                            <form action="/autoridades/{{ $pack['autoridades']->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                                <div class="form-group">
                                    <label for="presidente_id">Presidente:</label>
                                    <select name="presidente_id" class="form-control" id="presidente_id">
                                        <option value="{{null}}">sin definir</option>
                                        @foreach ($pack['diputados'] as $diputado)
                                            <option value="{{$diputado->id}}"
                                            @if ($pack['autoridades']->presidente_id == $diputado->id)
                                            selected    
                                            @endif
                                            >{{$diputado->apellido}} {{$diputado->nombre}}</option>  
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="vice_id">Vicepresidente 1°:</label>
                                    <select name="vice_id" class="form-control" id="vice_id">
                                        <option value="{{null}}">sin definir</option>
                                        @foreach ($pack['diputados'] as $diputado)
                                            <option value="{{$diputado->id}}"
                                            @if ($pack['autoridades']->vice_id == $diputado->id)
                                            selected    
                                            @endif
                                            >{{$diputado->apellido}} {{$diputado->nombre}}</option>  
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="vice2_id">Vicepresidente 2°:</label>
                                    <select name="vice2_id" class="form-control" id="vice2_id">
                                        <option value="{{null}}">sin definir</option>
                                        @foreach ($pack['diputados'] as $diputado)
                                            <option value="{{$diputado->id}}"
                                            @if ($pack['autoridades']->vice2_id == $diputado->id)
                                            selected    
                                            @endif
                                            >{{$diputado->apellido}} {{$diputado->nombre}}</option>  
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="parlamentario_id">Secretario parlamentario:</label>
                                    <select name="parlamentario_id" class="form-control" id="parlamentario_id">
                                        <option value="{{null}}">sin definir</option>
                                        @foreach ($pack['diputados'] as $diputado)
                                            <option value="{{$diputado->id}}"
                                            @if ($pack['autoridades']->parlamentario_id == $diputado->id)
                                            selected    
                                            @endif
                                            >{{$diputado->apellido}} {{$diputado->nombre}}</option>  
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="admistrativo_id">Secretario admistrativo:</label>
                                    <select name="admistrativo_id" class="form-control" id="admistrativo_id">
                                        <option value="{{null}}">sin definir</option>
                                        @foreach ($pack['diputados'] as $diputado)
                                            <option value="{{$diputado->id}}"
                                            @if ($pack['autoridades']->admistrativo_id == $diputado->id)
                                            selected    
                                            @endif
                                            >{{$diputado->apellido}} {{$diputado->nombre}}</option>  
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="subsecretario_id">Subsecretario:</label>
                                    <select name="subsecretario_id" class="form-control" id="subsecretario_id">
                                        <option value="{{null}}">sin definir</option>
                                        @foreach ($pack['diputados'] as $diputado)
                                            <option value="{{$diputado->id}}"
                                            @if ($pack['autoridades']->subsecretario_id == $diputado->id)
                                            selected    
                                            @endif
                                            >{{$diputado->apellido}} {{$diputado->nombre}}</option>  
                                        @endforeach
                                    </select>
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
                </div>

            </div>

            <div class="row mt-0">
                    <div class="col">
                        <hr>
                    </div>
            </div>

            @if(
                !$pack['autoridades']->presidente_id &&
                !$pack['autoridades']->vice_id &&
                !$pack['autoridades']->vice2_id &&
                !$pack['autoridades']->parlamentario_id &&
                !$pack['autoridades']->admistrativo_id &&
                !$pack['autoridades']->subsecretario_id
                )
                
                <div class="row mt-2 mb-2">
                    <div class="col text-center">
                        <h4 class="text-secondary font-italic">Ningún elemento registrado</h4>
                    </div>
                </div>
            @else

            <div class="row justify-content-center">
                
                @if ($pack['autoridades']->presidente_id)
                    <div class="col col-4 p-3 pl-3">

                        <div class="row px-3">
                            <div class="col navColor rounded shadow-sm">

                                 <div class="row mt-3">
                                    <div class="col text-center">
                                        <img class="rounded-circle " height="120" width="120"
                                        @if ($pack['autoridades']->presidente->foto)
                                        src="{{$pack['autoridades']->presidente->foto}}" 
                                        @else
                                        src="{{ URL::asset('img/avatar.jpg') }}"
                                        @endif
                                        alt=""> 
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col">
                                        <h6 class="text-white font-weight-bold">{{$pack['autoridades']->presidente->apellido}}, {{$pack['autoridades']->presidente->nombre}}</h5>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <h6 class="text-white">Presidente</h6>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col">
                                        <h6 class="text-white">{{$pack['autoridades']->presidente->subbloque->bloque->nombre}}</h6>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>    
                @endif
                
                @if ($pack['autoridades']->vice_id)
                <div class="col col-4 p-3 pl-3">

                    <div class="row px-3">
                        <div class="col navColor rounded shadow-sm">

                                <div class="row mt-3">
                                <div class="col text-center">
                                    <img class="rounded-circle " height="120" width="120"
                                    @if ($pack['autoridades']->vice->foto)
                                    src="{{$pack['autoridades']->vice->foto}}" 
                                    @else
                                    src="{{ URL::asset('img/avatar.jpg') }}"
                                    @endif
                                    alt=""> 
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col">
                                    <h6 class="text-white font-weight-bold">{{$pack['autoridades']->vice->apellido}}, {{$pack['autoridades']->vice->nombre}}</h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <h6 class="text-white">Vicepresidente 1°</h6>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col">
                                    <h6 class="text-white">{{$pack['autoridades']->vice->subbloque->bloque->nombre}}</h6>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>        
                @endif

                @if ($pack['autoridades']->vice2_id)
                <div class="col col-4 p-3 pl-3">

                    <div class="row px-3">
                        <div class="col navColor rounded shadow-sm">

                                <div class="row mt-3">
                                <div class="col text-center">
                                    <img class="rounded-circle " height="120" width="120"
                                    @if ($pack['autoridades']->vice2->foto)
                                    src="{{$pack['autoridades']->vice2->foto}}" 
                                    @else
                                    src="{{ URL::asset('img/avatar.jpg') }}"
                                    @endif
                                    alt=""> 
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col">
                                    <h6 class="text-white font-weight-bold">{{$pack['autoridades']->vice2->apellido}}, {{$pack['autoridades']->vice2->nombre}}</h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <h6 class="text-white">Vicepresidente 2°</h6>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col">
                                    <h6 class="text-white">{{$pack['autoridades']->vice2->subbloque->bloque->nombre}}</h6>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>        
                @endif

            </div>

            <div class="row justify-content-center">
                
                @if ($pack['autoridades']->parlamentario_id)
                    <div class="col col-4 p-3 pl-3">

                        <div class="row px-3">
                            <div class="col navColor rounded shadow-sm">

                                 <div class="row mt-3 p-0 align-items-center">
                                    <div class="col col-auto p-0 ml-3">
                                        <img class="rounded-circle " height="80" width="80"
                                        @if ($pack['autoridades']->parlamentario->foto)
                                        src="{{$pack['autoridades']->parlamentario->foto}}" 
                                        @else
                                        src="{{ URL::asset('img/avatar.jpg') }}"
                                        @endif
                                        alt=""> 
                                    </div>

                                    <div class="col">
                                        <div class="row align-items-center">
                                            <div class="col col-12">
                                                <h6 class="text-white font-weight-bold">{{$pack['autoridades']->parlamentario->apellido}}</h5>
                                            </div>
                                            <div class="col col-12">
                                                <h6 class="text-white font-weight-bold">{{$pack['autoridades']->parlamentario->nombre}}</h5>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col text-center">
                                        <h6 class="text-white my-3">Secretario parlamentario</h6>
                                    </div>
                                </div>

                            </div>
                        </div>
                        
                    </div>    
                @endif
                
                @if ($pack['autoridades']->admistrativo_id)
                <div class="col col-4 p-3 pl-3">

                    <div class="row px-3">
                        <div class="col navColor rounded shadow-sm">

                                <div class="row mt-3 p-0 align-items-center">
                                <div class="col col-auto p-0 ml-3">
                                    <img class="rounded-circle " height="80" width="80"
                                    @if ($pack['autoridades']->admistrativo->foto)
                                    src="{{$pack['autoridades']->admistrativo->foto}}" 
                                    @else
                                    src="{{ URL::asset('img/avatar.jpg') }}"
                                    @endif
                                    alt=""> 
                                </div>

                                <div class="col">
                                    <div class="row align-items-center">
                                        <div class="col col-12">
                                            <h6 class="text-white font-weight-bold">{{$pack['autoridades']->admistrativo->apellido}}</h5>
                                        </div>
                                        <div class="col col-12">
                                            <h6 class="text-white font-weight-bold">{{$pack['autoridades']->admistrativo->nombre}}</h5>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col text-center">
                                    <h6 class="text-white my-3">Secretario admistrativo</h6>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                </div>    
                @endif

                @if ($pack['autoridades']->subsecretario_id)
                <div class="col col-4 p-3 pl-3">

                    <div class="row px-3">
                        <div class="col navColor rounded shadow-sm">

                                <div class="row mt-3 p-0 align-items-center">
                                <div class="col col-auto p-0 ml-3">
                                    <img class="rounded-circle " height="80" width="80"
                                    @if ($pack['autoridades']->subsecretario->foto)
                                    src="{{$pack['autoridades']->subsecretario->foto}}" 
                                    @else
                                    src="{{ URL::asset('img/avatar.jpg') }}"
                                    @endif
                                    alt=""> 
                                </div>

                                <div class="col">
                                    <div class="row align-items-center">
                                        <div class="col col-12">
                                            <h6 class="text-white font-weight-bold">{{$pack['autoridades']->subsecretario->apellido}}</h5>
                                        </div>
                                        <div class="col col-12">
                                            <h6 class="text-white font-weight-bold">{{$pack['autoridades']->subsecretario->nombre}}</h5>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col text-center">
                                    <h6 class="text-white my-3">Subsecretario</h6>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                </div>         
                @endif

            </div>
                
            @endif

        </div>

    </div>
@endauth


@endsection