@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="mb-4">Editar Artículo</h1>

    <form action="{{ route('articulo.update', $articulo->id_articulo) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>ID</label>
            <input type="text" value="{{ $articulo->id_articulo }}" class="form-control" readonly>
        </div>

        <div class="mb-3">
            <label>Descripción</label>
            <input type="text" name="descripcion" class="form-control" value="{{ $articulo->descripcion }}">
        </div>

        <div class="mb-3">
            <label>Precio Venta</label>
            <input type="number" name="precio_venta" class="form-control" value="{{ $articulo->precio_venta }}">
        </div>

        <div class="mb-3">
            <label>Precio Costo</label>
            <input type="number" name="precio_costo" class="form-control" value="{{ $articulo->precio_costo }}">
        </div>

        <div class="mb-3">
            <label>Stock</label>
            <input type="number" name="stock" class="form-control" value="{{ $articulo->stock }}">
        </div>

        <div class="mb-3">
            <label>Código Tipo Artículo</label>
            <input type="number" name="cod_tipo_articulo" class="form-control" value="{{ $articulo->cod_tipo_articulo }}">
        </div>

        <div class="mb-3">
            <label>Código Proveedor</label>
            <input type="text" name="cod_proveedor" class="form-control" value="{{ $articulo->cod_proveedor }}">
        </div>

        <div class="mb-3">
            <label>Fecha Ingreso</label>
            <input type="text" name="fecha_ingreso" class="form-control" value="{{ $articulo->fecha_ingreso }}">
        </div>

        <button class="btn btn-primary">Actualizar</button>
        <a href="{{ route('articulo.index') }}" class="btn btn-secondary">Cancelar</a>

    </form>

</div>
@endsection
