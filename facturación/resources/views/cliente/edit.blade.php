@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Editar Cliente</h1>

    <form action="{{ route('cliente.update', $cliente->Documento) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nombres</label>
            <input type="text" name="Nombres" class="form-control" value="{{ $cliente->Nombres }}" required>
        </div>

        <div class="mb-3">
            <label>Apellidos</label>
            <input type="text" name="Apellidos" class="form-control" value="{{ $cliente->Apellidos }}" required>
        </div>

        <div class="mb-3">
            <label>Dirección</label>
            <input type="text" name="Direccion" class="form-control" value="{{ $cliente->Direccion }}">
        </div>

        <div class="mb-3">
            <label>Ciudad</label>
            <select name="cod_ciudad" class="form-control">
                @foreach($ciudades as $ciudad)
                    <option value="{{ $ciudad->Codigo_ciudad }}"
                            @if($cliente->cod_ciudad == $ciudad->Codigo_ciudad) selected @endif>
                        {{ $ciudad->nombre_ciudad }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Teléfono</label>
            <input type="text" name="Telefono" class="form-control" value="{{ $cliente->Telefono }}">
        </div>

        <button class="btn btn-primary">Actualizar</button>
    </form>

</div>
@endsection
