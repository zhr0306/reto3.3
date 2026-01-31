Formulario para crear una facturalinea
<br><br>

<form action="{{ url('/facturalineas') }}" method="POST">

    @csrf 
    @include('facturalineas.form', ['submit' => 'Crear línea', 'cancel' => 'Cancelar la creación'])

</form>