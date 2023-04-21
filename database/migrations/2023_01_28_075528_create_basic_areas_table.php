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
        Schema::create('basic_areas', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('inspection_id')
                ->index();

            $table->unsignedInteger('floor_id')
                ->index();

            $table->unsignedInteger('room_id')
                ->index();

            $table->unsignedInteger('area_id')
                ->index();

            $table->string('order')->nullable();
            $table->string('material')->nullable();
            $table->string('color')->nullable();
            $table->string('plinth')->nullable();
            $table->string('analysis')->nullable();
            $table->string('type')->nullable();
            $table->string('handle')->nullable();
            $table->string('lists')->nullable();
            $table->string('key')->nullable();
            $table->string('doorPump')->nullable();
            $table->string('doorStop')->nullable();
            $table->string('plaster')->nullable();
            $table->string('finish')->nullable();
            $table->string('ventilationGrille')->nullable();
            $table->string('glazing')->nullable();
            $table->string('windowsill')->nullable();
            $table->string('rollerShutter')->nullable();
            $table->string('windowDecoration')->nullable();
            $table->string('hor')->nullable();
            $table->string('fallProtection')->nullable();
            $table->string('energy')->nullable();

            $table->text('extra')->nullable();
            $table->string('isFavourite')->nullable();
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
        Schema::dropIfExists('basic_areas');
    }
};
