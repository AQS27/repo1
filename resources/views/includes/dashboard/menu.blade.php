
<h6 class="navbar-heading text-muted">
    @if (auth()->user()->role == 'admin')
        Gestión
    @else
        Menú
    @endif
</h6>

<ul class="navbar-nav">

        @if (auth()->user()->rol == 'admin')
                    <li class="nav-item  active ">
                        
                        <a class="nav-link  active " href="{{ url('/') }}">
                            <i class="ni ni-tv-2 text-danger"></i> Panel de Datos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ url('/actividades') }}">
                            <i class="ni ni-user-run text-blue"></i> Actividades
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ url('/entrenadores') }}">
                            <i class="ni ni-circle-08 text-orange"></i> Entrenadores
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ url('/clientes') }}">
                            <i class="ni ni-single-02 text-blue"></i> Clientes
                        </a>
                    </li>

            @elseif (auth()->user()->rol == 'entrenador')

                    <li class="nav-item">
                        <a class="nav-link " href="{{ url('/clientes') }}">
                            <i class="ni ni-calendar-grid-58 text-primary"></i> Gestionar Horarios
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ url('/clientes') }}">
                            <i class="fas fa-clock text-info"></i> Mis Actividades
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ url('/clientes') }}">
                            <i class="fas fa-bed text-danger"></i> Mis Alumnos
                        </a>
                    </li>
            @else
            <li class="nav-item">
                
                        <a class="nav-link " href="{{ url('/clientes') }}">
                            <i class="ni ni-calendar-grid-58 text-primary"></i> Reservar Actividad
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ url('/clientes') }}">
                            <i class="fas fa-clock text-info"></i> Mis Actividades
                        </a>
                    </li>
        @endif
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout')}}"
                            onclick="event.preventDefault(); document.getElementById('formLogout').submit();"
                        >
                            <i class="fas fa-sign-in-alt"></i> Cerrar Sesión
                        </a>
                        <form action="{{ route('logout')}}" method="POST" style="display: none;" id="formLogout">
                        @csrf
                        </form>
                        
                    </li>
                </ul>
        @if (auth()->user()->role == 'admin')
                <!-- Divider -->
                <hr class="my-3">
                <!-- Heading -->
                <h6 class="navbar-heading text-muted">Reportes</h6>
                <!-- Navigation -->
                <ul class="navbar-nav mb-md-3">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="ni ni-books text-black"></i> Reservas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="ni ni-chart-bar-32 text-black"></i>Nivel del Entrenador
                        </a>
                    </li>
                    
                </ul>
        @endif