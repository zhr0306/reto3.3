@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Líneas de la Factura: {{ $factura->numero }}</h1>

        <div class="mb-3">
            {{-- Nav btns --}}
            <a href="{{ route('facturas.index') }}" class="btn btn-secondary">Volver a Facturas</a>
            <a href="{{ route('facturas.lineas.create', $factura->id) }}" class="btn btn-primary">Añadir Línea</a>
        </div>

        @if (Session::has('mensaje'))
            <div class="alert alert-success">
                {{ Session::get('mensaje') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Código</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>IVA %</th>
                    <th>Base</th>
                    <th>Imp. IVA</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                {{-- Вывод списка строк фактуры --}}
                @foreach ($lineas as $linea)
                    <tr>
                        <td>{{ $linea->codigo }}</td>
                        <td>{{ $linea->descripcion }}</td>
                        <td>{{ $linea->cantidad }}</td>
                        <td>{{ $linea->precio }}</td>
                        <td>{{ $linea->iva }}</td>
                        <td>{{ $linea->base }}</td>
                        <td>{{ $linea->importeiva }}</td>
                        <td>{{ $linea->importe }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                {{-- Редактирование строки --}}
                                <a href="{{ route('lineas.edit', $linea->id) }}" class="btn btn-warning btn-sm">Editar</a>

                                {{-- Удаление строки --}}
                                <form action="{{ route('lineas.destroy', $linea->id) }}" method="POST"
                                    style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Borrar línea?')">Borrar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
