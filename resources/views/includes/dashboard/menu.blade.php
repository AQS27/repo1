
<h6 class="navbar-heading text-muted">Gestión</h6>

<ul class="navbar-nav">
                    <li class="nav-item  active ">
                        <a class="nav-link  active " href="./index.html">
                            <i class="ni ni-tv-2 text-danger"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ url('/actividades') }}">
                            <i class="ni ni-user-run text-blue"></i> Actividades
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="./examples/maps.html">
                            <i class="ni ni-circle-08 text-orange"></i> Entrenadores
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="./examples/profile.html">
                            <i class="ni ni-single-02 text-blue"></i> Clientes
                        </a>
                    </li>
                    
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout')}}"
                            onclick="event.preventDefault(); document.getElementById('formLogout').submit();"
                        >
                            <i class="fas fa-sign-in-alt"></i> Cerrar Sesión
                        </a>
                        <form action="{{ route('logout')}}" method="POST" style="display: none;" id="formLogout"></form>
                        @csrf
                    </li>
                </ul>
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
                