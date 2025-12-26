@extends('layouts.app')

@section('content')
<div class="container py-4">

    <!-- ENCABEZADO -->
    <div class="mb-4">
        <h2 class="fw-bold">
            <i class="bi bi-box-seam"></i> Registrar Artículo
        </h2>
        <small class="text-muted">
            Ingrese la información del nuevo artículo
        </small>
    </div>

    <!-- CARD -->
    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white">
            <i class="bi bi-plus-square"></i> Datos del Artículo
        </div>

        <div class="card-body">
            <form action="{{ route('articulo.store') }}" method="POST">
                @csrf

                <!-- FILA 1 -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Descripción</label>
                        <input type="text" name="descripcion" class="form-control"
                               placeholder="Nombre del artículo" required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label fw-semibold">Precio Venta</label>
                        <input type="number" name="precio_venta" class="form-control"
                               step="0.01" placeholder="0.00" required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label fw-semibold">Precio Costo</label>
                        <input type="number" name="precio_costo" class="form-control"
                               step="0.01" placeholder="0.00" required>
                    </div>
                </div>

                <!-- FILA 2 -->
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label class="form-label fw-semibold">Stock</label>
                        <input type="number" name="stock" class="form-control"
                               placeholder="Cantidad disponible" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Tipo de Artículo</label>
                        <select name="cod_tipo_articulo" class="form-select" required>
                            <option value="">Seleccione un tipo</option>
                            @foreach($tipos as $tipo)
                                <option value="{{ $tipo->id_tipoarticulo }}">
                                    {{ $tipo->descripcion_articulo }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-5 mb-3">
                        <label class="form-label fw-semibold">Proveedor</label>
                        <select name="cod_proveedor" class="form-select" required>
                            <option value="">Seleccione un proveedor</option>
                            @foreach($proveedores as $prov)
                                <option value="{{ $prov->No_documento }}">
                                    {{ $prov->Nombre }} {{ $prov->Apellido }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- FILA 3 -->
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Fecha de Ingreso</label>
                        <input type="date" name="fecha_ingreso" class="form-control">
                    </div>
                </div>

                <!-- BOTONES -->
                <div class="d-flex justify-content-end mt-4 gap-2">
                    <a href="{{ route('articulo.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Cancelar
                    </a>

                    <button type="submit" class="btn btn-success px-4">
                        <i class="bi bi-save"></i> Guardar Artículo
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
