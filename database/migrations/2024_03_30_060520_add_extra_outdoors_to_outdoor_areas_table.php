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
        Schema::table('outdoor_areas', function (Blueprint $table) {
            $table->string('plinth')->nullable();
            $table->string('plaster')->nullable();
            $table->string('ventilationGrille')->nullable();
            $table->string('glazing')->nullable();
            $table->string('rollerShutter')->nullable();
            $table->string('windowDecoration')->nullable();
            $table->string('hor')->nullable();
            $table->string('fallProtection')->nullable();
            $table->string('construction')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('outdoor_areas', function (Blueprint $table) {
            //
        });
    }
};
