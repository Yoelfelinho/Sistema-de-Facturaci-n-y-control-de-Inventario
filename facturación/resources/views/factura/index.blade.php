@extends('layouts.app')

@section('content')
<div class="container py-4">

    <!-- TÍTULO + BOTÓN -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-0">
                <i class="bi bi-receipt"></i> Listado de Facturas
            </h2>
            <small class="text-muted">
                Gestión y control de facturación
            </small>
        </div>

        <a href="{{ route('factura.create') }}" class="btn btn-primary btn-lg shadow-sm">
            <i class="bi bi-plus-circle"></i> Nueva Factura
        </a>
    </div>

    <!-- CARD -->
    <div class="card shadow border-0">

        <div class="card-header bg-dark text-white">
            <i class="bi bi-list-ul"></i> Facturas Registradas
        </div>

        <div class="card-body">

            @if($facturas->isEmpty())
                <div class="alert alert-info text-center mb-0">
                    <i class="bi bi-info-circle"></i>
                    No hay facturas registradas.
                </div>
            @else

            <!-- TABLA -->
            <div class="table-responsive">
                <table class="table table-hover align-middle">

                    <thead class="table-light">
                        <tr class="text-center">
                            <th>#</th>
                            <th>Cliente</th>
                            <th>Empleado</th>
                            <th>Fecha</th>
                            <th>Total</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($facturas as $factura)
                        <tr class="text-center">

                            <td class="fw-semibold">
                                {{ $factura->Nnm_factura }}
                            </td>

                            <td class="text-start">
                                <i class="bi bi-person-fill text-primary"></i>
                                {{ $factura->cliente->Nombres }}
                                {{ $factura->cliente->Apellidos }}
                            </td>

                            <td>
                                {{ $factura->Nombre_empleado }}
                            </td>

                            <td>
                                {{ \Carbon\Carbon::parse($factura->Fecha_facturacion)->format('d/m/Y') }}
                            </td>

                            <td class="fw-bold text-success">
                                S/ {{ number_format($factura->total_factura, 2) }}
                            </td>

                            <td>
                                <div class="btn-group" role="group">

                                    <!-- EDITAR -->
                                    <a href="{{ route('factura.edit', $factura->Nnm_factura) }}"
                                       class="btn btn-sm btn-outline-warning"
                                       title="Editar">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <!-- ELIMINAR -->
                                    <form action="{{ route('factura.destroy', $factura->Nnm_factura) }}"
                                          method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-sm btn-outline-danger"
                                                title="Eliminar"
                                                onclick="return confirm('¿Está seguro de eliminar esta factura?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

            @endif
        </div>
    </div>

</div>
@endsection
