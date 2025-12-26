@extends('layouts.app')

@section('content')
<div class="container py-4">

    <!-- ENCABEZADO -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-0">
                <i class="bi bi-box-seam-fill"></i> Artículos
            </h2>
            <small class="text-muted">
                Gestión y control de inventario
            </small>
        </div>

        <a href="{{ route('articulo.create') }}" class="btn btn-primary btn-lg shadow-sm">
            <i class="bi bi-plus-circle"></i> Nuevo Artículo
        </a>
    </div>

    <!-- CARD -->
    <div class="card shadow border-0">

        <div class="card-header bg-dark text-white">
            <i class="bi bi-list-ul"></i> Listado de Artículos
        </div>

        <div class="card-body">

            @if($articulos->isEmpty())
                <div class="alert alert-info text-center mb-0">
                    <i class="bi bi-info-circle"></i>
                    No hay artículos registrados.
                </div>
            @else

            <!-- TABLA -->
            <div class="table-responsive">
                <table class="table table-hover align-middle">

                    <thead class="table-light">
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Descripción</th>
                            <th>Venta</th>
                            <th>Costo</th>
                            <th>Stock</th>
                            <th>Tipo</th>
                            <th>Proveedor</th>
                            <th>Ingreso</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($articulos as $item)
                        <tr class="text-center">

                            <td class="fw-semibold">
                                {{ $item->id_articulo }}
                            </td>

                            <td class="text-start">
                                <i class="bi bi-box"></i>
                                {{ $item->descripcion }}
                            </td>

                            <td class="fw-bold text-success">
                                S/ {{ number_format($item->precio_venta, 2) }}
                            </td>

                            <td class="text-muted">
                                S/ {{ number_format($item->precio_costo, 2) }}
                            </td>

                            <td>
                                <span class="badge bg-{{ $item->stock > 0 ? 'success' : 'danger' }}">
                                    {{ $item->stock }}
                                </span>
                            </td>

                            <td>
                                {{ $item->cod_tipo_articulo }}
                            </td>

                            <td>
                                {{ $item->cod_proveedor }}
                            </td>

                            <td>
                                {{ \Carbon\Carbon::parse($item->fecha_ingreso)->format('d/m/Y') }}
                            </td>

                            <td>
                                <div class="btn-group" role="group">

                                    <!-- VER -->
                                    <a href="{{ route('articulo.show', $item->id_articulo) }}"
                                       class="btn btn-sm btn-outline-info"
                                       title="Ver">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    <!-- EDITAR -->
                                    <a href="{{ route('articulo.edit', $item->id_articulo) }}"
                                       class="btn btn-sm btn-outline-warning"
                                       title="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <!-- ELIMINAR -->
                                    <form action="{{ route('articulo.destroy', $item->id_articulo) }}"
                                          method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-sm btn-outline-danger"
                                                title="Eliminar"
                                                onclick="return confirm('¿Eliminar artículo?')">
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
