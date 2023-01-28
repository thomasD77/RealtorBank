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
        Schema::create('inspections', function (Blueprint $table) {
            $table->id();
            $table->string('general')->nullable();
            $table->string('analysis')->nullable();
            $table->text('extra')->nullable();

            $table->integer('user_id')->index();
            $table->integer('room_id')->index();
            $table->integer('basic_area_id')->index();
            $table->integer('spec_area_id')->index();
            $table->integer('conform_area_id')->index();
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
        Schema::dropIfExists('inspections');
    }
};
