<nav class="navbar navbar-expand-lg navbar-light fixed-top">
  <div class="container">
    <a class="navbar-brand" href="/">
      <img src="{{ url('img/logo_GAE.png') }}" width="30" height="30" class="d-inline-block align-top" alt="Oasis App">
      Oasis Park
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> 
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Secciones
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="{{ url('/empresas/') }}">Empresas</a>
            <a class="dropdown-item" href="{{ url('/centros/') }}">Departamentos</a>
            <a class="dropdown-item" href="{{ url('/datafonos/') }}">Datafonos</a>
            <a class="dropdown-item" href="{{ url('/departamentos/') }}">Almacenes</a>
            <a class="dropdown-item" href="{{ url('/extensiones/') }}">Extensiones</a>
            <a class="dropdown-item" href="{{ url('/trabajadores/') }}">Trabajadores</a>
            <a class="dropdown-item" href="{{ url('/ausencias/') }}">Ausencias</a>
            <a class="dropdown-item" href="{{ url('/trabajadortlfs/') }}">Teléfonos</a>
            <a class="dropdown-item" href="{{ url('/trabajos/') }}">Trabajos</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Usuario
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          @guest
            <a class="dropdown-item" href="{{ route('login') }}">Login</a>
            <a class="dropdown-item" href="{{ route('register') }}">Registro</a>
          @else
            <a href="#" class="dropdown-item" data-toggle="dropdown" role="button" aria-expanded="false">
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Cerrar sesión
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          @endguest
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>