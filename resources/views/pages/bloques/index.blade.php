@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth
    <div class="row justify-content-center mt-5 animated fadeIn">

        <div class="col col-lg-7 col-xl-6 bg-white rounded shadow">

            
            <div class="row justify-content-between align-items-center mb-0 animated fadeIn fast">
                <div class="col col-auto mt-3">
                    <h2 class="blued mb-0">Listado de Bloques</h2>
                </div>
                <div class="col col-auto mt-3 text-right">
                    <a class="btn btn-sm btnColor" data-toggle="collapse" href="#collapseAgregar">Añadir</a>
                </div>
            </div>

            <div class="row mt-0">
                <div class="col">
                    <hr class="mt-2 mb-0">
                </div>
            </div>

            <div class="row collapse" id="collapseAgregar">
                <div class="col mx-3 mt-3 border shadow-sm p-4">

                    <div class="row">
                        <div class="col mb-2">
                            <h4 class="mb-0">Nuevo bloque</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <hr class="mt-0">
                        </div>
                    </div>

                    <form action="/bloques" method="POST" enctype="multipart/form-data">
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
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="Logo">Logo:</label>
                                    <input name="file" type="file" class="form-control-file" id="archivo" aria-describedby="archivo" placeholder="Logo...">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col text-center">
                                <hr>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col text-right">
                                <button type="submit" class="btn btnColor">Guardar</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>

            @if (count($bloques) != 0)
            <div class="row justify-content-center mt-1 mb-4">
                <div class="col">

                    <div id="accordion">
                    
                            @foreach ($bloques as $bloque)
                            <div class="card mt-3 shadow-sm">
                                <div class="card-header bg-light" id="headingOne">
                               
                                    <div class="row align-items-center">
                                        <div class="col col-auto px-0 ml-2">
                                           <img class="rounded-circle mx-0 border" height="40" width="40" data-toggle="collapse" data-target="#collapse{{$bloque->id}}" aria-expanded="false" aria-controls="collapse{{$bloque->id}}"
                                            @if ($bloque->logo)
                                            src="{{$bloque->logo}}" 
                                            @else
                                            src="{{ URL::asset('img/avatar.jpg') }}"
                                            @endif
                                            alt=""> 
                                        </div>
                                        <div class="col ml-0 px-0 ">
                                            <button class="btn btn-link text-dark ml-0 btn-lg" data-toggle="collapse" data-target="#collapse{{$bloque->id}}" aria-expanded="false" aria-controls="collapse{{$bloque->id}}">
                                            {{$bloque->nombre}}
                                            </button>
                                        </div>
                                        <div class="col col-auto m-0 p-0 text-right">
                                            <a class="btn btnColor btn-sm" data-toggle="collapse" href="#collapseSx{{$bloque->id}}" role="button" aria-expanded="false" aria-controls="collapseSx{{$bloque->id}}">añadir</a>
                                        </div>
                                        <div class="col col-auto text-right">
                                            <a class="btn btnColor btn-sm" href="/bloques/{{$bloque->id}}/edit">Editar</a>
                                        </div>
                                    </div>
                            
                                </div>

                                <div id="collapse{{$bloque->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col">

                                                <div class="row collapse align-items-center" id="collapseSx{{$bloque->id}}">
                                                    <div class="col border rounded mb-2 mx-2 shadow-sm p-3">
                                                        <form action="/subbloques" method="POST" enctype="multipart/form-data">
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
                                                                </div>
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label for="Logo">Logo:</label>
                                                                        <input name="file" type="file" class="form-control-file" id="archivo" aria-describedby="archivo" placeholder="Logo...">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" id="bloque_id" name="bloque_id" value="{{$bloque->id}}">
                                                            <div class="row">
                                                                <div class="col text-center">
                                                                    <hr>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-0">
                                                                <div class="col text-right">
                                                                    <button type="submit" class="btn btnColor">Guardar</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                                @if (count($bloque->subbloques) == 0)
                                                    <div class="row mt-2 mb-2">
                                                        <div class="col text-center">
                                                            <h5 class="text-secondary font-italic">Ningún elemento registrado</h5>
                                                        </div>
                                                    </div>    
                                                @endif           

                                                @foreach ($bloque->subbloques as $subbloque)
                                                <div class="row align-items-center">
                                                    <div class="col border rounded mb-2 mx-2 shadow-sm p-3">
                                                        <div class="row">
                                                            <div class="col col-auto pr-0">
                                                                <img class="rounded-circle border" height="40" width="40"
                                                                @if ($subbloque->logo)
                                                                src="{{$subbloque->logo}}" 
                                                                @else
                                                                src="{{ URL::asset('img/avatar.jpg') }}"
                                                                @endif
                                                                alt=""> 
                                                            </div>
                                                            <div class="col col-auto pl-0">
                                                                <a class="btn btn-link text-dark" data-toggle="collapse" href="#collapseS{{$subbloque->id}}" role="button" aria-expanded="false" aria-controls="collapseS{{$subbloque->id}}">
                                                                    {{$subbloque->nombre}}
                                                                </a>
                                                            </div>
                                                            <div class="col text-right">
                                                                <a class="btn btnColor btn-sm" href="/subbloques/{{  $subbloque->id }}/edit">Editar</a>
                                                            </div>        
                                                        </div>

                                                        <div class="collapse" id="collapseS{{$subbloque->id}}">

                                                            <div class="row">
                                                                <div class="col text-center">
                                                                    <hr>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col">
                                                                    <ul>
                                                                        @if (count($subbloque->diputados) != 0)
                                                                        <li>
                                                                            <b>Miembros: </b>
                                                                            <ul>
                                                                                @foreach ($subbloque->diputados as $diputado)
                                                                                <li>{{$diputado->apellido}} {{$diputado->nombre}}</li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </li>
                                                                        @else
                                                                        <li>
                                                                            <b>Miembros: </b> (sin miembros)
                                                                        </li>
                                                                        @endif
                                                                    </ul>
                                                                </div>
                                                                <div class="col">
                                                                    <ul>
                                                                        @if ($subbloque->presidente)
                                                                        <li>
                                                                            <b>Presidente: </b> {{$subbloque->presidente->apellido}} {{$subbloque->presidente->nombre}}
                                                                        </li> 
                                                                        @else
                                                                        <li>
                                                                            <b>Presidente: </b> (sin definir)
                                                                        </li>
                                                                        @endif
                                                                    </ul>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        

                                                    </div>
                                                </div>

                                           

                                        @endforeach
                                            </div>
                                        </div>
       
                                    </div>
                                </div>
                            </div>
                            @endforeach


                                
                            </div>

                    </div>        
                </div>

            @else
                <div class="row mt-4 mb-3">
                    <div class="col text-center">
                        <h4 class="text-secondary font-italic">Ningún elemento registrado</h4>
                    </div>
                </div>
            @endif


            </div>

            





        </div>

    </div>
@endauth


@endsection