@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Línea</h1>

    <form action="{{ route('lineas.update', $linea->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group mb-3">
            <label for="codigo">Código</label>
            <input type="number" class="form-control" name="codigo" value="{{ $linea->codigo }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="descripcion">Descripción</label>
            <input type="text" class="form-control" name="descripcion" maxlength="50" value="{{ $linea->descripcion }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="cantidad">Cantidad</label>
            <input type="number" step="0.01" class="form-control" name="cantidad" value="{{ $linea->cantidad }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="precio">Precio</label>
            <input type="number" step="0.01" class="form-control" name="precio" value="{{ $linea->precio }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="iva">IVA (%)</label>
            <input type="number" step="0.01" class="form-control" name="iva" value="{{ $linea->iva }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Línea</button>
        <a href="{{ route('facturas.lineas', $linea->id_factura) }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection