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
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();

            $table->string('description');

            $table->unsignedBigInteger('id_company')->nullable();
            $table->foreign('id_company')->references('id')->on('companies');
            
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('permissions');
    }    
};
