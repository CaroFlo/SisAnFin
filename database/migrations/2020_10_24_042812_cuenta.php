<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cuenta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuenta', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('nombre');
            /* $table->integer('empresa_id');
            $table->foreign('empresa_id')->references('id')->on('empresa')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('tipo_id');
            $table->foreign('tipo_id')->references('id')->on('tipo_cuenta')->onUpdate('cascade')->onDelete('cascade'); */
            $table->foreignId('empresa_id')->constrained('empresa')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('tipo_id')->constrained('tipo_cuenta')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::table('cuenta', function($table) {
            /* $table->integer('padre_id')->nullable();
            $table->foreign('padre_id')->references('id')->on('cuenta')->onUpdate('cascade')->onDelete('cascade'); */
            $table->foreignId('padre_id')->nullable()->constrained('cuenta')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuenta');
    }
}
