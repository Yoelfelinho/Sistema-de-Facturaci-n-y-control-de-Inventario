@extends('layouts.app')

@section('content')
<div class="container py-4">

    <!-- TÍTULO -->
    <div class="mb-4">
        <h2 class="fw-bold">
            <i class="bi bi-receipt"></i> Nueva Factura
        </h2>
        <small class="text-muted">
            Registro de una nueva factura de venta
        </small>
    </div>

    <!-- CARD -->
    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white">
            <i class="bi bi-file-earmark-plus"></i> Datos de la Factura
        </div>

        <div class="card-body">
            <form action="{{ route('factura.store') }}" method="POST">
                @csrf

                <!-- FILA 1 -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Código de Factura</label>
                        <input type="text" name="Nnm_factura" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Empleado</label>
                        <input type="text" name="Nombre_empleado" class="form-control" required>
                    </div>
                </div>

                <!-- FILA 2 -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Cliente</label>
                        <select name="cod_cliente" class="form-select" required>
                            <option value="">Seleccione un cliente</option>
                            @foreach($clientes as $cli)
                                <option value="{{ $cli->Documento }}">
                                    {{ $cli->Nombres }} {{ $cli->Apellidos }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Forma de Pago</label>
                        <select name="id_formapago" class="form-select" required>
                            <option value="">Seleccione forma de pago</option>
                            @foreach($formas as $f)
                                <option value="{{ $f->id_formapago }}">
                                    {{ $f->Descripcion_formapago }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- FILA 3 -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Fecha de Facturación</label>
                        <input type="date" name="Fecha_facturacion" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Precio Base</label>
                        <input type="number" id="precio_base" class="form-control"
                               step="0.01" placeholder="0.00" required>
                    </div>
                </div>

                <!-- FILA 4 -->
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">IVA (%)</label>
                        <input type="number" id="iva" class="form-control"
                               value="18" step="0.01" readonly>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Monto IVA</label>
                        <input type="number" id="monto_iva" name="monto_iva"
                               class="form-control" step="0.01" readonly>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Total Factura</label>
                        <input type="number" id="total_factura" name="total_factura"
                               class="form-control fw-bold text-success"
                               step="0.01" readonly>
                    </div>
                </div>

                <!-- BOTONES -->
                <div class="d-flex justify-content-end mt-4 gap-2">
                    <a href="{{ route('factura.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Cancelar
                    </a>

                    <button type="submit" class="btn btn-success px-4">
                        <i class="bi bi-save"></i> Guardar Factura
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- SCRIPT -->
<script>
    const precioBase = document.getElementById('precio_base');
    const iva = document.getElementById('iva');
    const montoIva = document.getElementById('monto_iva');
    const totalFactura = document.getElementById('total_factura');

    function calcularIVA() {
        const base = parseFloat(precioBase.value) || 0;
        const porcentajeIva = parseFloat(iva.value) || 0;
        const monto = base * (porcentajeIva / 100);

        montoIva.value = monto.toFixed(2);
        totalFactura.value = (base + monto).toFixed(2);
    }

    precioBase.addEventListener('input', calcularIVA);
</script>
@endsection
