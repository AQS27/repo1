@extends('layouts.dashboard')

@section('content')

        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Entrenadores</h3>
                    </div>
                    <div class="col text-right">
                        <a href="{{ url('/entrenadores/create')}}" class="btn btn-sm btn-primary">Nuevo Entrenador</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if (session('notificacion'))
                <div class="alert alert-success" role="alert">
                    {{ session('notificacion')}}
                </di>
                @endif
            </div>
            <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
                            <th scope="col">DNI</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($entrenadores as $entrenador)
                        <tr>
                            <th scope="row">
                                {{ $entrenador->name }}
                            </th>
                            <td>
                                {{ $entrenador->email }}
                            </td>
                            <td>
                                {{ $entrenador->dni }}
                            </td>
                            <td>
                                
                                <form action="{{ url('/entrenadores/'.$entrenador->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ url('/entrenadores/'.$entrenador->id.'/edit')}}" class="btn btn-sm btn-primary">Editar</a>
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-body">
                {{ $entrenadores->links() }}
            </div>
        </div>
@endsection