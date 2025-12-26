@extends('layouts.app')

@section('content')
<div class="container py-4">

    <!-- ENCABEZADO -->
    <div class="mb-4">
        <h2 class="fw-bold">
            <i class="bi bi-person-plus-fill"></i> Registrar Proveedor
        </h2>
        <p class="text-muted mb-0">
            Complete los datos para registrar un nuevo proveedor
        </p>
    </div>

    <!-- CARD -->
    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white">
            <i class="bi bi-card-text"></i> Datos del Proveedor
        </div>

        <div class="card-body">

            <form action="{{ route('proveedores.store') }}" method="POST">
                @csrf

                <div class="row g-3">

                    <!-- DOCUMENTO -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">No Documento</label>
                        <input type="text" name="No_documento" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Tipo Documento</label>
                        <select name="cod_tipo_documento" class="form-select">
                            @foreach($tipos as $t)
                                <option value="{{ $t->id_tipo_documento }}">
                                    {{ $t->Descripcion }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- NOMBRES -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Nombre</label>
                        <input type="text" name="Nombre" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Apellido</label>
                        <input type="text" name="Apellido" class="form-control">
                    </div>

                    <!-- COMERCIAL -->
                    <div class="col-md-12">
                        <label class="form-label fw-semibold">Nombre Comercial</label>
                        <input type="text" name="nombre_comercial" class="form-control">
                    </div>

                    <!-- DIRECCIÓN -->
                    <div class="col-md-12">
                        <label class="form-label fw-semibold">Dirección</label>
                        <input type="text" name="direccion" class="form-control">
                    </div>

                    <!-- UBICACIÓN -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Ciudad</label>
                        <select name="cod_ciudad" class="form-select">
                            @foreach($ciudades as $c)
                                <option value="{{ $c->Codigo_ciudad }}">
                                    {{ $c->nombre_ciudad }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Teléfono</label>
                        <input type="text" name="Telefono" class="form-control">
                    </div>

                </div>

                <!-- BOTONES -->
                <div class="mt-4 d-flex justify-content-end gap-2">
                    <a href="{{ route('proveedores.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Cancelar
                    </a>

                    <button class="btn btn-success px-4">
                        <i class="bi bi-save"></i> Guardar Proveedor
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
