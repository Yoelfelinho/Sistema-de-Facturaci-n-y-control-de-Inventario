<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Articulo;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    // 📊 VENTAS POR FECHA
    public function ventasPorFecha(Request $request)
    {
        $ventas = [];

        if ($request->filled(['inicio', 'fin'])) {
            $ventas = Factura::whereBetween('Fecha_facturacion', [
                $request->inicio,
                $request->fin
            ])->get();
        }

        return view('consultas.ventas', compact('ventas'));
    }

    // 📦 STOCK BAJO
    public function stockBajo()
    {
        $articulos = Articulo::where('stock', '<=', 5)->get();

        return view('consultas.stock', compact('articulos'));
    }
}
