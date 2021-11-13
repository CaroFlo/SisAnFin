<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Analisis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analisis', function (Blueprint $table) {
            $table->id();
            $table->text('individual', 4096);
            $table->text('mayor', 4096);
            $table->text('entre', 4096);
            $table->text('menor', 4096);
            /* $table->integer('parametro_id');
            $table->foreign('parametro_id')->references('id')->on('parametro')->onUpdate('cascade')->onDelete('cascade'); */
            $table->foreignId('parametro_id')->constrained('parametro')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('analisis');
    }
}
