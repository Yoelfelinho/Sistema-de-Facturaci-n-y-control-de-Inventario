<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\TipoArticulo;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    public function index()
    {
        $articulos = Articulo::with(['tipo', 'proveedor'])->get();
        return view('articulo.index', compact('articulos'));
    }

    public function create()
    {
        $tipos = TipoArticulo::all();
        $proveedores = Proveedor::all();
        return view('articulo.create', compact('tipos', 'proveedores'));
    }

    public function store(Request $request)
    {
        Articulo::create($request->all());
        return redirect()->route('articulo.index')->with('success', 'Artículo registrado correctamente');
    }

    public function show(Articulo $articulo)
    {
        return view('articulo.show', compact('articulo'));
    }

    public function edit(Articulo $articulo)
    {
        $tipos = TipoArticulo::all();
        $proveedores = Proveedor::all();
        return view('articulo.edit', compact('articulo', 'tipos', 'proveedores'));
    }

    public function update(Request $request, Articulo $articulo)
    {
        $articulo->update($request->all());
        return redirect()->route('articulo.index')->with('success', 'Artículo actualizado');
    }

    public function destroy(Articulo $articulo)
    {
        $articulo->delete();
        return back()->with('success', 'Artículo eliminado');
    }
}
