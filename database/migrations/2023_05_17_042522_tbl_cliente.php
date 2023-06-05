<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Tabla: tbl_Departamento
        Schema::create('tbl_Departamento', function (Blueprint $table) {
            $table->increments('idDepartamento');
            $table->string('nombreDepartamento');
            $table->timestamps();
        });

        // Tabla: tbl_Ciudad
        Schema::create('tbl_Ciudad', function (Blueprint $table) {
            $table->increments('idCiudad');
            $table->integer('idDepartamento')->unsigned();
            $table->string('nombreCiudad');
            $table->foreign('idDepartamento')->references('idDepartamento')->on('tbl_Departamento');
            $table->timestamps();
        });

        // Tabla: tbl_Cliente
        Schema::create('tbl_Cliente', function (Blueprint $table) {
            $table->integer('nic')->unsigned()->primary();
            $table->string('nombrecliente');
            $table->integer('idCiudad')->unsigned();
            $table->string('colUrbCanton');
            $table->string('direccion');
            $table->integer('casa');
            $table->foreign('idCiudad')->references('idCiudad')->on('tbl_Ciudad');
            $table->timestamps();
        });

        // Tabla: tbl_Region
        Schema::create('tbl_Region', function (Blueprint $table) {
            $table->increments('idRegion');
            $table->integer('idCiudad')->unsigned();
            $table->integer('nic')->unsigned();
            $table->foreign('idCiudad')->references('idCiudad')->on('tbl_Ciudad');
            $table->foreign('nic')->references('nic')->on('tbl_Cliente');
            $table->timestamps();
        });

        // Tabla: tbl_Factura
        Schema::create('tbl_Factura', function (Blueprint $table) {
            $table->increments('id_factura');
            $table->integer('idRegion')->unsigned();
            $table->integer('consumokwh');
            $table->float('distribucion');
            $table->float('tasaMunicipal');
            $table->float('cargoPorMora');
            $table->date('fechaCreacion');
            $table->date('fechaVencimiento');
            $table->foreign('idRegion')->references('idRegion')->on('tbl_Region');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_Factura');
        Schema::dropIfExists('tbl_Region');
        Schema::dropIfExists('tbl_Cliente');
        Schema::dropIfExists('tbl_Ciudad');
        Schema::dropIfExists('tbl_Departamento');
    }
};
