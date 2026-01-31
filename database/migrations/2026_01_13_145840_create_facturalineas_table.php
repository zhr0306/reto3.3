<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('facturalineas', function (Blueprint $table) {
            $table->id(); //int autoincrementar pk

            $table->unsignedInteger('id_factura'); // int FK (facturas)
            $table->integer('codigo'); // int
            $table->decimal('cantidad', 10, 2)->nullable();
            $table->string('descripcion', 100)->nullable();
            $table->decimal('precio', 10, 2)->nullable();
            $table->decimal('base', 19, 2)->nullable();
            $table->decimal('iva', 5, 2)->nullable();
            $table->decimal('importeiva', 19, 2)->nullable();
            $table->decimal('importe', 19, 2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturalineas');
    }
};
