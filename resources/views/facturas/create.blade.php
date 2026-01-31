Formulario para crear una factura
<br><br>
<!-- IGUAL ESTÁ MAL -->
<form action="{{ url('/facturas') }}" method="POST">

    @csrf 
    @include('facturas.form', ['submit' => 'Crear factura', 'cancel' => 'Cancelar la creación'])

</form>