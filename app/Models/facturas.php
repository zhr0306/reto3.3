<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class facturas extends Model
{
    //
    public function cliente() {
        return $this->belongsTo('App\Models\clientes');
    }

    public function lineas()
    {
        return $this->hasMany(facturalineas::class, 'id_factura');
    }
}
