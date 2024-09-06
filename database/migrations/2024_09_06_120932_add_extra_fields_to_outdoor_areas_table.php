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
            $table->string('canopyLight')->nullable();
            $table->string('canopySwitch')->nullable();

            $table->string('cupboard_model')->nullable();
            $table->string('cupboard_doors')->nullable();
            $table->string('cupboard_drawers')->nullable();
            $table->string('cupboard_handle')->nullable();
            $table->string('cupboard_rod')->nullable();
            $table->string('cupboard_shelves')->nullable();
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
