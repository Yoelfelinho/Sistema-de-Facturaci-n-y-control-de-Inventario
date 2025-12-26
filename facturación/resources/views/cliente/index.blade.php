@extends('layouts.app')

@section('content')
<div class="container py-4">

    <!-- ENCABEZADO -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-0">
                <i class="bi bi-people-fill"></i> Clientes
            </h2>
            <small class="text-muted">
                Gestión de clientes registrados
            </small>
        </div>

        <a href="{{ route('cliente.create') }}" class="btn btn-primary btn-lg shadow-sm">
            <i class="bi bi-person-plus"></i> Nuevo Cliente
        </a>
    </div>

    <!-- CARD -->
    <div class="card shadow border-0">

        <div class="card-header bg-dark text-white">
            <i class="bi bi-list-ul"></i> Listado de Clientes
        </div>

        <div class="card-body">

            @if($clientes->isEmpty())
                <div class="alert alert-info text-center mb-0">
                    <i class="bi bi-info-circle"></i>
                    No hay clientes registrados.
                </div>
            @else

            <!-- TABLA -->
            <div class="table-responsive">
                <table class="table table-hover align-middle">

                    <thead class="table-light">
                        <tr class="text-center">
                            <th>Documento</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Ciudad</th>
                            <th>Teléfono</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($clientes as $cliente)
                        <tr class="text-center">

                            <td class="fw-semibold">
                                {{ $cliente->Documento }}
                            </td>

                            <td class="text-start">
                                <i class="bi bi-person-circle text-primary"></i>
                                {{ $cliente->Nombres }}
                            </td>

                            <td class="text-start">
                                {{ $cliente->Apellidos }}
                            </td>

                            <td>
                                <span class="badge bg-secondary">
                                    {{ $cliente->ciudad->nombre_ciudad ?? '---' }}
                                </span>
                            </td>

                            <td>
                                <i class="bi bi-telephone-fill"></i>
                                {{ $cliente->Telefono }}
                            </td>

                            <td>
                                <div class="btn-group" role="group">

                                    <!-- VER -->
                                    <a href="{{ route('cliente.show', $cliente->Documento) }}"
                                       class="btn btn-sm btn-outline-info"
                                       title="Ver">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    <!-- EDITAR -->
                                    <a href="{{ route('cliente.edit', $cliente->Documento) }}"
                                       class="btn btn-sm btn-outline-warning"
                                       title="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <!-- ELIMINAR -->
                                    <form action="{{ route('cliente.destroy', $cliente->Documento) }}"
                                          method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-sm btn-outline-danger"
                                                title="Eliminar"
                                                onclick="return confirm('¿Eliminar cliente?')">
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
