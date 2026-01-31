<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>Id</th>
            <th>Código</th>
            <th>Cantidad</th>
            <th>Facturas</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Base</th>
            <th>IVA</th>
            <th>Importe IVA</th>
            <th>Importe</th>
            <th></th>
        </tr>
    </thead>


    <tbody>
        @if (isset($facturalineas) && (count($facturalineas) > 0))
        @foreach ($facturalineas as $facturalinea)

        <tr>
            <td>{{$facturalinea->id}}</td>
            <td>{{$facturalinea->codigo}}</td>
            <td>{{$facturalinea->cantidad}}</td>

            @if (isset($facturalineasfactura))
            <td>{{$facturalinea->numero}}</td>
            @else
            <td>{{$facturalinea->factura->numero}}</td>
            @endif

            <td>{{$facturalinea->descripcion}}</td>
            <td>{{$facturalinea->precio}}</td>
            <td>{{$facturalinea->base}}</td>
            <td>{{$facturalinea->iva}}</td>
            <td>{{$facturalinea->importeiva}}</td>
            <td>{{$facturalinea->importe}}</td>


            <td>
                <a href="{{ url('facturalineas/' . $facturalinea->id . '/edit') }}" class="btn btn-success">Editar</a>

                <form action="{{ url('/facturalineas/' . $facturalinea->id)}}" method="POST" class="d-inline">
                    
                    @csrf

                    {{method_field('DELETE')}}

                    <input type="submit"
                            onclick="return confirm('¿Quieres borrar la factura seleccionado?')"
                            value="Borrar"
                            class="btn btn-danger">

                </form>

            </td>
        </tr>

        @endforeach
        @else

        <tr>
            <td colspan="8">Sin líneas facturas</td>
        </tr>

        @endif

    </tbody>


    <tfoot>
        <tr>
            <td>
                <a href="{{ url('facturalineas/create') }}" class="btn btn-primary">Nuevo</a>
            </td>
        </tr>
    </tfoot>

</table>