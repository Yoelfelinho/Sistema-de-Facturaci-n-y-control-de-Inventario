@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Ventas por Fecha</h1>

    <form method="GET" action="{{ route('consultas.ventas') }}" class="row g-3 mb-3">
        <div class="col-md-4">
            <label>Fecha Inicio</label>
            <input type="date" name="inicio" class="form-control" required>
        </div>

        <div class="col-md-4">
            <label>Fecha Fin</label>
            <input type="date" name="fin" class="form-control" required>
        </div>

        <div class="col-md-4 align-self-end">
            <button class="btn btn-primary">Consultar</button>
        </div>
    </form>

    @if(isset($ventas))
    <table class="table table-bordered">
        <tr>
            <th>N° Factura</th>
            <th>Cliente</th>
            <th>Fecha</th>
            <th>Total</th>
        </tr>
        @foreach($ventas as $v)
        <tr>
            <td>{{ $v->Nnm_factura }}</td>
            <td>{{ $v->cliente->Nombre ?? '' }}</td>
            <td>{{ $v->Fecha_facturacion }}</td>
            <td>{{ $v->total_factura }}</td>
        </tr>
        @endforeach
    </table>
    @endif

</div>
@endsection
