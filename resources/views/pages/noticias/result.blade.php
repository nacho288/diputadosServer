@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth

    <div class="row justify-content-center mt-5 animated fadeIn">

        <div class="col mx-sm-2 col-md-6 col-lg-4 bg-white rounded shadow-sm">

            <div class="row mb-0 animated fadeIn fast">
                <div class="col mt-3">
                    <h2 class="blued mb-0">Aviso</h2>
                </div>
            </div>

                <div class="row mt-0">
                    <div class="col">
                        <hr>
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col">
                        <h4 class="text-secondary">Operación completada con éxito.</h4>
                    </div>
                </div>

                <div class="row mt-0">
                    <div class="col">
                        <hr>
                    </div>
                </div>

                <div class="row justify-content-center mb-3">
                    <div class="col text-center">
                        <a class="btn btnColor" href="/noticias">Volver</a>
                    </div>
                </div>
            

        </div>

    </div>


@endauth


@endsection