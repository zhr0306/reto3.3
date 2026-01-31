@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Nueva Línea para Factura {{ $factura->numero }}</h1>

        <form action="{{ route('facturas.lineas.store', $factura->id) }}" method="POST">
            @csrf

            <div class="form-group mb-3">
                <label for="codigo">Código</label>
                <input type="number" class="form-control" name="codigo" required>
            </div>

            <div class="form-group mb-3">
                <label for="descripcion">Descripción</label>
                <input type="text" class="form-control" name="descripcion" maxlength="50" required>
            </div>

            <div class="form-group mb-3">
                <label for="cantidad">Cantidad</label>
                <input type="number" step="1.00" class="form-control" name="cantidad" required>
            </div>

            <div class="form-group mb-3">
                <label for="precio">Precio</label>
                <input type="number" step="0.01" class="form-control" name="precio" required>
            </div>

            <div class="form-group mb-3">
                <label for="iva">IVA (%)</label>
                <input type="number" step="1.00" class="form-control" name="iva" required value="21">
            </div>

            <button type="submit" class="btn btn-success">Guardar Línea</button>
            <a href="{{ route('facturas.lineas', $factura->id) }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
