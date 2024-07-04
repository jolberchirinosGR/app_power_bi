<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();

            $table->string('empresa', 50)->nullable();
            $table->integer('mid')->nullable();
            $table->string('rowid', 50)->nullable();
            $table->integer('idempresa')->nullable();
            $table->binary('foto')->nullable();
            $table->string('razonsocial', 75)->nullable();
            $table->string('cif', 10)->nullable();
            $table->string('direccion', 30)->nullable();
            $table->string('poblacion', 30)->nullable();
            $table->string('codpostal', 10)->nullable();
            $table->string('provincia', 30)->nullable();
            
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
