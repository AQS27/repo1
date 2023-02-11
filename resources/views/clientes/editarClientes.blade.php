<?php
    use Illuminate\Support\Str;
?>

@extends('layouts.dashboard')

@section('content')

        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Editar Cliente</h3>
                    </div>
                    <div class="col text-right">
                        <a href="{{ url('/clientes')}}" class="btn btn-sm btn-success">
                        <i class="fas fa-undo"></i>Regresar</a>
                    </div>
                </div>
            </div>
            <div class="card-body">

                @if($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        <i class="	fas fa-exclamation-triangle"></i>
                        <strong>Por favor!!</strong> {{ $error }}
                    </div>
                    @endforeach
                @endif

                <form action="{{ url('/clientes/'.$cliente->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nombre de Cliente</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $cliente->name)}}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input type="text" name="email" class="form-control" value="{{ old('email', $cliente->email)}}">
                    </div>

                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="text" name="dni" class="form-control" value="{{ old('dni', $cliente->dni)}}">
                    </div>

                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" name="direccion" class="form-control" value="{{ old('direccion', $cliente->direccion)}}">
                    </div>

                    <div class="form-group">
                        <label for="telefono">Teléfono / Móvil</label>
                        <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $cliente->telefono)}}">
                    </div>

                    <div class="form-group">
                        <label for="password">Contaseña</label>
                        <input type="text" name="password" class="form-control">
                        <small class="text-warnig">Solo llena el campo si deseas cambiar la contraseña</small>
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary">Guardar Cambios</button>
                </form>
            </div>
        </div>
@endsection