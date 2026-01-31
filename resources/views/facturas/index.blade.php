<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>Id</th>
            <th>Número</th>
            <th>Fecha</th>
            <th>Cliente</th>
            <th>Base</th>
            <th>Importe IVA</th>
            <th>Importe</th>
            <th></th>
        </tr>
    </thead>


    <tbody>
        @if (isset($facturas) && (count($facturas) > 0))
        @foreach ($facturas as $factura)

        <tr>
            <td>{{$factura->id}}</td>
            <td>{{$factura->numero}}</td>
            <td>{{$factura->fecha}}</td>

            @if (isset($facturascliente))
            <td>{{$factura->nombre}}</td>
            @else
            <td>{{$factura->cliente->nombre}}</td>
            @endif

            <td>{{$factura->base}}</td>
            <td>{{$factura->importeiva}}</td>
            <td>{{$factura->importe}}</td>


            <td>
                <a href="{{ url('/facturalineas/facturas/' . $factura->id) }}">Líneas facturas</a>

                <a href="{{ url('facturas/' . $factura->id . '/edit') }}" class="btn btn-success">Editar</a>

                <form action="{{ url('/facturas/' . $factura->id)}}" method="POST" class="d-inline">
                    
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
            <td colspan="8">Sin facturas</td>
        </tr>

        @endif

    </tbody>


    <tfoot>
        <tr>
            <td>
                <a href="{{ url('facturas/create') }}" class="btn btn-primary">Nuevo</a>
            </td>
        </tr>
    </tfoot>

</table>