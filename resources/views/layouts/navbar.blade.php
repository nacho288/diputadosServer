
</nav>

    <nav class="navbar navbar-expand-lg navbar-dark navColor p-0">
        <a class="navbar-brand my-0" href="/">Diputados App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navbarNavDropdown" class="navbar-collapse collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle btn-ripple navBtn" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Noticias
                    </a>
                    <div class="dropdown-menu mt-3" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/noticias">Listado</a>
                    <a class="dropdown-item" href="/noticias/create">Nueva</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Eventos
                    </a>
                    <div class="dropdown-menu mt-3" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/eventos">Listado</a>
                    <a class="dropdown-item" href="/eventos/create">Nuevo</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Documentos
                    </a>
                    <div class="dropdown-menu mt-3" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/documentos">Listado</a>
                    <a class="dropdown-item" href="/documentos/create">Nuevo</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Diputados
                    </a>
                    <div class="dropdown-menu mt-3" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/diputados">Listado</a>
                    <a class="dropdown-item" href="/diputados/create">Añadir</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Categorias
                    </a>
                    <div class="dropdown-menu mt-3" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/categorias">Listado</a>
                    <a class="dropdown-item" href="/categorias/create">Nueva</a>
                    </div>
                </li>
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Usuarios
                    </a>
                    <div class="dropdown-menu mt-3" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Administrativos</a>
                    <a class="dropdown-item" href="#">Diputados</a>
                    </div>
                </li> --}}

            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle btn-outline" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right mt-3" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">cerrar session</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>


