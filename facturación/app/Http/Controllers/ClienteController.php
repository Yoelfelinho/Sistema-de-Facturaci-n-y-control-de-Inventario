<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Ciudad;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::with('ciudad')->get();
        return view('cliente.index', compact('clientes'));
    }

    public function create()
    {
        $ciudades = Ciudad::all();
        return view('cliente.create', compact('ciudades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Documento' => 'required|unique:cliente,Documento',
            'Nombres' => 'required',
            'Apellidos' => 'required',
            'Direccion' => 'required',
            'cod_ciudad' => 'required',
            'Telefono' => 'required'
        ]);

        Cliente::create($request->all());

        return redirect()->route('cliente.index')->with('success', 'Cliente registrado correctamente.');
    }

    public function show($Documento)
    {
        $cliente = Cliente::findOrFail($Documento);
        return view('cliente.show', compact('cliente'));
    }

    public function edit($Documento)
    {
        $cliente = Cliente::findOrFail($Documento);
        $ciudades = Ciudad::all();
        return view('cliente.edit', compact('cliente', 'ciudades'));
    }

    public function update(Request $request, $Documento)
    {
        $cliente = Cliente::findOrFail($Documento);

        $cliente->update($request->all());

        return redirect()->route('cliente.index')->with('success', 'Cliente actualizado correctamente.');
    }

    public function destroy($Documento)
    {
        Cliente::destroy($Documento);

        return redirect()->route('cliente.index')->with('success', 'Cliente eliminado correctamente.');
    }
}

