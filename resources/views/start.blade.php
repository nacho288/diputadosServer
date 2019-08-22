@extends('layouts.page')

@section('title', 'Diputados app')

@section('content')

@auth

    <div class="row justify-content-center mt-5 animated fadeIn">
        

        <div class="col col-lg-5 col-md-8 mx-sm-4 bg-light rounded py-5 shadow-sm">


            <div class="row mb-0">
                <div class="col text-center">
                    <img src="{{ URL::asset('img/logod.png') }}"  alt="">
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col col-lg-8 text-center">
                   <hr  class="blued">
                </div>
            </div>

            <div class="row justify-content-center mt-2">
                <div class="col text-center">
                    <h4 class="blued font-italic">Elija una opción para comenzar</h4>
                </div>
            </div>

        </div>

    </div>
@endauth


@endsection