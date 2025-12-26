@extends('layouts.app')

@section('content')
<div class="container py-4">

    <!-- ENCABEZADO -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-0">
                <i class="bi bi-truck"></i> Proveedores
            </h2>
            <small class="text-muted">
                Gestión de proveedores registrados
            </small>
        </div>

        <a href="{{ route('proveedores.create') }}" class="btn btn-primary btn-lg shadow-sm">
            <i class="bi bi-person-plus"></i> Nuevo Proveedor
        </a>
    </div>

    <!-- CARD -->
    <div class="card shadow border-0">

        <div class="card-header bg-dark text-white">
            <i class="bi bi-list-ul"></i> Lista de Proveedores
        </div>

        <div class="card-body">

            @if($proveedores->isEmpty())
                <div class="alert alert-info text-center mb-0">
                    <i class="bi bi-info-circle"></i>
                    No hay proveedores registrados.
                </div>
            @else

            <!-- TABLA -->
            <div class="table-responsive">
                <table class="table table-hover align-middle">

                    <thead class="table-light">
                        <tr class="text-center">
                            <th>No Documento</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Comercial</th>
                            <th>Ciudad</th>
                            <th>Teléfono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($proveedores as $p)
                        <tr class="text-center">

                            <td class="fw-semibold">
                                {{ $p->No_documento }}
                            </td>

                            <td class="text-start">
                                <i class="bi bi-person-circle text-primary"></i>
                                {{ $p->Nombre }}
                            </td>

                            <td class="text-start">
                                {{ $p->Apellido }}
                            </td>

                            <td>
                                <span class="badge bg-info text-dark">
                                    {{ $p->nombre_comercial }}
                                </span>
                            </td>

                            <td>
                                {{ optional($p->ciudad)->nombre_ciudad ?? 'Sin ciudad' }}
                            </td>

                            <td>
                                <i class="bi bi-telephone-fill"></i>
                                {{ $p->Telefono }}
                            </td>

                            <td>
                                <div class="btn-group" role="group">

                                    <!-- VER -->
                                    <a href="{{ route('proveedores.show', $p->No_documento) }}"
                                       class="btn btn-sm btn-outline-info"
                                       title="Ver">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    <!-- EDITAR -->
                                    <a href="{{ route('proveedores.edit', $p->No_documento) }}"
                                       class="btn btn-sm btn-outline-warning"
                                       title="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </a>

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
