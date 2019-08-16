@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth
    <div class="row my-5"></div><div class="row my-5"></div><div class="row my-5"></div><div class="row my-5"></div>

    <div class="row justify-content-center mt-5 animated fadeIn">

        <div class="col col-lg-6">

            <div class="row mb-0">
                <div class="col">
                    <h1 class="text-center text-secondary display-3">Bienvenido</h1>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col text-center">
                   <hr>
                </div>
            </div>

            <div class="row justify-content-center mt-2">
                <div class="col text-center">
                    <h3 class="text-secondary">Elija una opción para comenzar</h3>
                </div>
            </div>

        </div>

    </div>
@endauth


@endsection