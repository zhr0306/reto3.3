<?php

namespace App\Http\Controllers;

use App\Models\Facturas;
use App\Models\Facturalineas;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class FacturalineasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos['facturalineas'] = Facturalineas::paginate(10);

        return view('facturalineas.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $facturas = Facturas::all();

        return view('facturalineas.create', compact('facturas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $datos = $request->except('_token');

        Facturalineas::insert($datos);

        return redirect('facturalineas')->with('mensaje', 'Línea de factura insertada.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Facturalineas $facturalineas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $facturalineas = Facturalineas::findOrFail($id);
        $facturas = Facturas::all();

        return view('facturalineas.edit', compact('facturalineas', 'facturas'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $datos = $request->except(['_token', '_method']);

        Facturalineas::where('id', '=', $id)->update($datos);

        return redirect('facturalineas')->with('mensaje', "Línea factura modificada");
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Facturalineas::destroy($id);

        return redirect('facturalineas')->with('mensaje', "Línea factura borrada");
    }


    public function facturalineasfactura($id_factura) {
        $facturalineas = DB::table('facturalineas')
                        ->join('facturas', 'facturalineas.id_factura', '=', 'facturas.id')
                        ->select('facturalineas.*', 'facturas.numero')
                        ->where('facturalineas.id_factura', '=', $id_factura)
                        ->orderBy('id')
                        ->cursorPaginate(10);
        
        $facturalineasfactura = true;

        return view('facturalineas.index', compact('facturalineas', 'facturalineasfactura'));
    }
    
}
