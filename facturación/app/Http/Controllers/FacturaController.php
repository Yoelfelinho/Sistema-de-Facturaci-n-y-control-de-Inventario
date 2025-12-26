<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Cliente;
use App\Models\FormaDePago;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    public function index()
    {
        $facturas = Factura::with(['cliente', 'formaPago'])->get();
        return view('factura.index', compact('facturas'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $formas = FormaDePago::all();
        return view('factura.create', compact('clientes', 'formas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nnm_factura' => 'required',
            'cod_cliente' => 'required',
            'Nombre_empleado' => 'required',
            'Fecha_facturacion' => 'required',
            'id_formapago' => 'required',
            'iva' => 'required',
            'total_factura' => 'required',
        ]);

        Factura::create($request->all());

        return redirect()->route('factura.index')->with('success', 'Factura creada correctamente');
    }

    public function edit($id)
    {
        $factura = Factura::findOrFail($id);
        $clientes = Cliente::all();
        $formas = FormaDePago::all();

        return view('factura.edit', compact('factura', 'clientes', 'formas'));
    }

    public function update(Request $request, $id)
    {
        $factura = Factura::findOrFail($id);
        $factura->update($request->all());

        return redirect()->route('factura.index')->with('success', 'Factura actualizada correctamente');
    }

    public function destroy($id)
    {
        Factura::destroy($id);
        return redirect()->route('factura.index')->with('success', 'Factura eliminada correctamente');
    }
}
