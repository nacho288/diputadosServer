@extends('layouts.page')

@section('content')
<div class="row my-xl-3"></div><div class="row my-lg-5"></div><div class="row my-md-5"></div>

<div class="row justify-content-center mt-5 animated fadeIn">

    <div class="col col-md-6 col-lg-4 px-3 bg-white rounded shadow">

        <div class="row mt-3">
            <div class="col text-center">
                <img class="img-fluid" src="{{ URL::asset('img/logod.png') }}"  alt="">
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input id="email" name="email" type="email" class="form-control" aria-describedby="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="remember" id="remember">
                        <label class="form-check-label" for="exampleCheck1">recordar</label>
                    </div>
                    <div class="row justify-content-center mb-3">
                        @if(! \App::environment('production'))
                        <div class="col text-center">
                            <a href="{{ route('register') }}" class="btn btnColor mt-4">Registrarse</a>
                        </div>
                        @endif
                        <div class="col text-center">
                            <button type="submit" class="btn btnColor mt-4">Enviar</button>
                        </div>
                    </div>
                </form>

                 @error('email')

                <div class="row justify-content-center">
                    <div class="col text-center">
                        <hr>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col text-center">
                        <p class="text-danger">E-mail incorrrecto</p>
                    </div>
                </div>

                @enderror

                @error('password')

                <div class="row justify-content-center">
                    <div class="col text-center">
                        <hr>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col text-center">
                        <p class="text-danger">Contraseña incorrecta</p>
                    </div>
                </div>

                @enderror

            </div>
        </div>

    </div>

</div>
@endsection
