@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

    @auth
        <div class="row justify-content-center mb-3 mt-5 animated fadeIn ">

            <div class="col col-md-8 col-lg-7 bg-white rounded shadow">


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

                    <div class="card card-body shadow-sm p-3">
                        <div class="row">
                            <div class="col">
                                <form action="/autoridades/{{ $pack['autoridades']->id}}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6">
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
                                        </div>
                                        <div class="col-lg-4 col-md-6">
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
                                        </div>
                                        <div class="col-lg-4 col-md-6">
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
                                        </div>

                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-group">
                                                <label for="parlamentario_id">Secretario parlamentario:</label>
                                                <select name="parlamentario_id" class="form-control"
                                                        id="parlamentario_id">
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
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-group">
                                                <label for="admistrativo_id">Secretario admistrativo:</label>
                                                <select name="admistrativo_id" class="form-control"
                                                        id="admistrativo_id">
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
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-group">
                                                <label for="subsecretario_id">Subsecretario:</label>
                                                <select name="subsecretario_id" class="form-control"
                                                        id="subsecretario_id">
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
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col text-center">
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col text-right">
                                            <button type="submit" class="btn btnColor">Guardar</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
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

                    <div class="row justify-content-center mt-3">

                        <div class="col">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Diputados</th>
                                    <th scope="col">Bloque</th>
                                    <th scope="col">Rol</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if ($pack['autoridades']->presidente_id)
                                    <tr>
                                        <td><img class="rounded-circle mr-3" height="40" width="40"
                                                 @if ($pack['autoridades']->presidente->foto)
                                                 src="{{$pack['autoridades']->presidente->foto}}"
                                                 @else
                                                 src="{{ URL::asset('img/avatar.jpg') }}"
                                                 @endif
                                                 alt=""><b class="mr-4">{{$pack['autoridades']->presidente->apellido}}
                                                , {{$pack['autoridades']->presidente->nombre}}</b></td>
                                        <td>
                                            @if ($pack['autoridades']->presidente->subbloque)
                                                {{$pack['autoridades']->presidente->subbloque->bloque->nombre}}
                                            @endif
                                        </td>
                                        <td>
                                            Presidente
                                        </td>
                                    </tr>
                                @endif

                                @if ($pack['autoridades']->vice_id)
                                    <tr>
                                        <td><img class="rounded-circle mr-3" height="40" width="40"
                                                 @if ($pack['autoridades']->vice->foto)
                                                 src="{{$pack['autoridades']->vice->foto}}"
                                                 @else
                                                 src="{{ URL::asset('img/avatar.jpg') }}"
                                                 @endif
                                                 alt=""><b class="mr-4">{{$pack['autoridades']->vice->apellido}}
                                                , {{$pack['autoridades']->vice->nombre}}</b></td>
                                        <td>
                                            @if ($pack['autoridades']->vice->subbloque)
                                                {{$pack['autoridades']->vice->subbloque->bloque->nombre}}
                                            @endif
                                        </td>
                                        <td>
                                            Vicepresidente 1°
                                        </td>
                                    </tr>
                                @endif

                                @if ($pack['autoridades']->vice2_id)
                                    <tr>
                                        <td><img class="rounded-circle mr-3" height="40" width="40"
                                                 @if ($pack['autoridades']->vice2->foto)
                                                 src="{{$pack['autoridades']->vice2->foto}}"
                                                 @else
                                                 src="{{ URL::asset('img/avatar.jpg') }}"
                                                 @endif
                                                 alt=""><b class="mr-4">{{$pack['autoridades']->vice2->apellido}}
                                                , {{$pack['autoridades']->vice2->nombre}}</b></td>
                                        <td>
                                            @if ($pack['autoridades']->vice2->subbloque)
                                                {{$pack['autoridades']->vice2->subbloque->bloque->nombre}}
                                            @endif
                                        </td>
                                        <td>
                                            Vicepresidente 2°
                                        </td>
                                    </tr>
                                @endif

                                @if ($pack['autoridades']->parlamentario_id)
                                    <tr>
                                        <td><img class="rounded-circle mr-3" height="40" width="40"
                                                 @if ($pack['autoridades']->parlamentario->foto)
                                                 src="{{$pack['autoridades']->parlamentario->foto}}"
                                                 @else
                                                 src="{{ URL::asset('img/avatar.jpg') }}"
                                                 @endif
                                                 alt=""><b
                                                class="mr-4">{{$pack['autoridades']->parlamentario->apellido}}
                                                , {{$pack['autoridades']->parlamentario->nombre}}</b></td>
                                        <td>
                                            @if ($pack['autoridades']->parlamentario->subbloque)
                                                {{$pack['autoridades']->parlamentario->subbloque->bloque->nombre}}
                                            @endif
                                        </td>
                                        <td>
                                            Secretario parlamentario
                                        </td>
                                    </tr>
                                @endif

                                @if ($pack['autoridades']->admistrativo_id)
                                    <tr>
                                        <td><img class="rounded-circle mr-3" height="40" width="40"
                                                 @if ($pack['autoridades']->admistrativo->foto)
                                                 src="{{$pack['autoridades']->admistrativo->foto}}"
                                                 @else
                                                 src="{{ URL::asset('img/avatar.jpg') }}"
                                                 @endif
                                                 alt=""><b class="mr-4">{{$pack['autoridades']->admistrativo->apellido}}
                                                , {{$pack['autoridades']->admistrativo->nombre}}</b></td>
                                        <td>
                                            @if ($pack['autoridades']->admistrativo->subbloque)
                                                {{$pack['autoridades']->admistrativo->subbloque->bloque->nombre}}
                                            @endif
                                        </td>
                                        <td>
                                            Secretario admistrativo
                                        </td>
                                    </tr>
                                @endif

                                @if ($pack['autoridades']->subsecretario_id)
                                    <tr>
                                        <td><img class="rounded-circle mr-3" height="40" width="40"
                                                 @if ($pack['autoridades']->subsecretario->foto)
                                                 src="{{$pack['autoridades']->subsecretario->foto}}"
                                                 @else
                                                 src="{{ URL::asset('img/avatar.jpg') }}"
                                                 @endif
                                                 alt=""><b
                                                class="mr-4">{{$pack['autoridades']->subsecretario->apellido}}
                                                , {{$pack['autoridades']->subsecretario->nombre}}</b></td>
                                        <td>
                                            @if ($pack['autoridades']->subsecretario->subbloque)
                                                {{$pack['autoridades']->subsecretario->subbloque->bloque->nombre}}
                                            @endif
                                        </td>
                                        <td>
                                            Subsecretario
                                        </td>
                                    </tr>
                                @endif


                                </tbody>
                            </table>

                        </div>


                    </div>



                @endif

            </div>

        </div>
    @endauth


@endsection
