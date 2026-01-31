<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\Clientes;
use App\Models\facturas;
use Illuminate\Http\Request;

class FacturasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos['facturas'] = Facturas::paginate(10);

        return view('facturas.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $clientes = Clientes::all();

        return view('facturas.create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $datos = $request->except('_token');

        Facturas::insert($datos);

        return redirect('facturas')->with('mensaje', 'Factura insertada.');
    }

    /**
     * Display the specified resource.
     */
    public function show(facturas $facturas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $factura = Facturas::findOrFail($id);
        $clientes = Clientes::all();

        return view('facturas.edit', compact('factura', 'clientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $datos = $request->except(['_token', '_method']);

        Facturas::where('id', '=', $id)->update($datos);

        return redirect('facturas')->with('mensaje', "Factura modificada");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Facturas::destroy($id);

        return redirect('facturas')->with('mensaje', "Factura borrada");
    }



    public function facturascliente($cliente_id) {
        $facturas = DB::table('facturas')
                        ->join('clientes', 'facturas.cliente_id', '=', 'clientes.id')
                        ->select('facturas.*', 'clientes.nombre')
                        ->where('facturas.cliente_id', '=', $cliente_id)
                        ->orderBy('id')
                        ->cursorPaginate(10);
        
        $facturascliente = true;

        return view('facturas.index', compact('facturas', 'facturascliente'));
    }

}
