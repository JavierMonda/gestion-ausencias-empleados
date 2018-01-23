<nav class="navbar navbar-expand-lg navbar-light fixed-top">
  <div class="container">
  @if (Auth::user()->email == 'personal@fuerteventuraoasispark.com')
    <a class="navbar-brand" href="/rrhh">
  @elseif (Auth::user()->email == 'gestion@fuerteventuraoasispark.com')
    <a class="navbar-brand" href="/rrhh">
  @elseif (Auth::user()->email == 'julian.hernandez@fuerteventuraoasispark.com')
    <a class="navbar-brand" href="/servicio-tecnico">
  @elseif (Auth::user()->email == 'informatica@fuerteventuraoasispark.com')
    <a class="navbar-brand" href="/admin">
  @else
    <a class="navbar-brand" href="/">
  @endif
      <img src="{{ url('img/logo-oasis.png') }}" width="30" height="30" class="d-inline-block align-top" alt="Oasis App">
      Oasis Park
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-list" aria-hidden="true"></i>  Secciones
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="{{ url('/empresas/') }}">
              <i class="fa fa-briefcase" aria-hidden="true"></i> Empresas
            </a>
            <a class="dropdown-item" href="{{ url('/centros/') }}">
              <i class="fa fa-archive" aria-hidden="true"></i> Departamentos
            </a>
            <a class="dropdown-item" href="{{ url('/departamentos/') }}">
              <i class="fa fa-folder-open" aria-hidden="true"></i> Almacenes
            </a>
            <a class="dropdown-item" href="{{ url('/trabajadores/') }}">
              <i class="fa fa-user" aria-hidden="true"></i> Trabajadores
            </a>
            <a class="dropdown-item" href="{{ url('/ausencias/') }}">
              <i class="fa fa-user-times" aria-hidden="true"></i> Ausencias
            </a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user-o"></i> Usuario
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
