<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class facturalineas extends Model
{
    //

    // protected $table = 'facturalineas';

    public function factura()
    {
        return $this->belongsTo(facturas::class, 'id_factura');
    }


    public function calcularImportes() {
        $this->base = $this->cantidad * $this->precio;
        $this->importeiva = $this->base * $this->iva / 100;
        $this->importe = $this->base + $this->importeiva;
    }
}
