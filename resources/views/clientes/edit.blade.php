Formulario para editar un cliente
<br><br>
<form action="{{ url('/clientes/' . $cliente->id) }}" method="post" enctype="multipart/form-data">

    @csrf
    {{ method_field('PATCH') }}
    @include('clientes.form', ['submit' => 'Modificar cliente', 'cancel' => 'Cancelar la modificación'])
    
</form>