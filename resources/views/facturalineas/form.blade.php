<label for="codigo">Código</label>
       <input type="text" name="codigo" id="codigo" maxlength="10" class="form-control"
              value="{{ isset($facturalinea->codigo) ? $facturalinea->codigo : old('codigo') }}" @if (isset($readonly)) {{ $readonly }} @endif >

<br>

<label for="cantidad">Cantidad</label>
       <input type="text" name="cantidad" id="cantidad" maxlength="64" class="form-control"
              value="{{ isset($facturalinea->cantidad) ? $facturalinea->cantidad : old('cantidad') }}" @if (isset($readonly)) {{ $readonly }} @endif >

<br>

<label for="facturas">Facturas</label>
<select name="id_factura" id="id_factura" class="form-control">
    
    @foreach($facturas as $factura)
        
        <option value="{{ $factura->id }}"
                @if (isset($facturalinea->id_factura) && ($factura->id == $facturalinea->id_factura))
                selected="selected"
                @endif
        >
            {{ $factura->numero }}
        </option>
    @endforeach

</select>

<br>

<label for="descripcion">Descripción</label>
<input type="text" name="descripcion" id="descripcion" maxlength="100" class="form-control" value="{{ isset($facturalinea->descripcion) ? $facturalinea->descripcion : old('descripcion') }}" @if (isset($readonly)) {{ $readonly }} @endif>

<br>

<label for="precio">Precio</label>
<input type="number" name="precio" id="precio" maxlength="100" class="form-control" value="{{ isset($facturalinea->precio) ? $facturalinea->precio : old('precio') }}" @if (isset($readonly)) {{ $readonly }} @endif>

<br>

<label for="base">Base</label>
<input type="number" name="base" id="base" maxlength="100" class="form-control" value="{{ isset($facturalinea->base) ? $facturalinea->base : old('base') }}" @if (isset($readonly)) {{ $readonly }} @endif>

<br>

<label for="iva">IVA</label>
<input type="number" name="iva" id="iva" maxlength="100" class="form-control" value="{{ isset($facturalinea->iva) ? $facturalinea->iva : old('iva') }}" @if (isset($readonly)) {{ $readonly }} @endif>


<br>

<label for="importeiva">Importe IVA</label>
<input type="number" name="importeiva" id="importeiva" maxlength="11" class="form-control" value="{{ isset($facturalinea->importeiva) ? $facturalinea->importeiva : old('importeiva') }}" @if (isset($readonly)) {{ $readonly }} @endif>

<br>

<label for="importe">Importe</label>
<input type="number" name="importe" id="importe" maxlength="11" class="form-control" value="{{ isset($facturalinea->importe) ? $facturalinea->importe : old('importe') }}" @if (isset($readonly)) {{ $readonly }} @endif>

<br>

@if (isset($submit))
    <input type="submit" class="btn btn-primary" value="{{ $submit }}">
@else

<br>

@endif



<a href="{{ url('/facturalineas/') }}">
    <input type="button" class="btn btn-danger" value="{{ $cancel }}">
</a>