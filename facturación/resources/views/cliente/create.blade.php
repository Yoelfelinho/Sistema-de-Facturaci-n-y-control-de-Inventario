@extends('layouts.app')

@section('content')
<div class="container py-4">

    <!-- ENCABEZADO -->
    <div class="mb-4">
        <h2 class="fw-bold">
            <i class="bi bi-person-plus-fill"></i> Registrar Cliente
        </h2>
        <small class="text-muted">
            Ingrese los datos del nuevo cliente
        </small>
    </div>

    <!-- CARD -->
    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white">
            <i class="bi bi-card-checklist"></i> Datos del Cliente
        </div>

        <div class="card-body">
            <form action="{{ route('cliente.store') }}" method="POST">
                @csrf

                <!-- FILA 1 -->
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Documento</label>
                        <input type="text" name="Documento" class="form-control" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Nombres</label>
                        <input type="text" name="Nombres" class="form-control" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Apellidos</label>
                        <input type="text" name="Apellidos" class="form-control" required>
                    </div>
                </div>

                <!-- FILA 2 -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Dirección</label>
                        <input type="text" name="Direccion" class="form-control"
                               placeholder="Av. / Calle / Jr.">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label fw-semibold">Ciudad</label>
                        <select name="cod_ciudad" class="form-select" required>
                            <option value="">Seleccione una ciudad</option>
                            @foreach($ciudades as $ciudad)
                                <option value="{{ $ciudad->Codigo_ciudad }}">
                                    {{ $ciudad->nombre_ciudad }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label fw-semibold">Teléfono</label>
                        <input type="text" name="Telefono" class="form-control"
                               placeholder="999-999-999">
                    </div>
                </div>

                <!-- BOTONES -->
                <div class="d-flex justify-content-end mt-4 gap-2">
                    <a href="{{ route('cliente.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Cancelar
                    </a>

                    <button type="submit" class="btn btn-success px-4">
                        <i class="bi bi-save"></i> Guardar Cliente
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
