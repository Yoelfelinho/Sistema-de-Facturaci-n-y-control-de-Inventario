<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Models\Ciudad;
use App\Models\TipoDocumento;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    // 🔹 LISTAR PROVEEDORES
    public function index()
    {
        $proveedores = Proveedor::with(['ciudad', 'tipodocumento'])->get();

        return view('proveedores.index', compact('proveedores'));
    }

    // 🔹 FORMULARIO CREAR
    public function create()
    {
        $ciudades = Ciudad::all();
        $tipos = TipoDocumento::all();

        return view('proveedores.create', compact('ciudades', 'tipos'));
    }

    // 🔹 GUARDAR PROVEEDOR
    public function store(Request $request)
    {
        // (validación básica opcional)
        $request->validate([
            'No_documento' => 'required|unique:proveedor,No_documento',
            'Nombre' => 'required',
            'Apellido' => 'required',
        ]);

        Proveedor::create($request->all());

        return redirect()
            ->route('proveedores.index')
            ->with('success', 'Proveedor agregado correctamente');
    }

    // 🔹 VER DETALLE (Route Model Binding)
    public function show(Proveedor $proveedor)
    {
        $proveedor->load(['ciudad', 'tipodocumento']);

        return view('proveedores.show', compact('proveedor'));
    }

    // 🔹 FORMULARIO EDITAR
    public function edit(Proveedor $proveedor)
    {
        $ciudades = Ciudad::all();
        $tipos = TipoDocumento::all();

        return view(
            'proveedores.edit',
            compact('proveedor', 'ciudades', 'tipos')
        );
    }

    // 🔹 ACTUALIZAR PROVEEDOR
    public function update(Request $request, Proveedor $proveedor)
    {
        $proveedor->update($request->all());

        return redirect()
            ->route('proveedores.index')
            ->with('success', 'Proveedor actualizado correctamente');
    }

    // 🔹 ELIMINAR PROVEEDOR
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();

        return redirect()
            ->route('proveedores.index')
            ->with('success', 'Proveedor eliminado correctamente');
    }
}
