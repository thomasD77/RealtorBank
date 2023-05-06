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
        Schema::create('generals', function (Blueprint $table) {
            $table->id();
            $table->string('code')->default('GENERAL');
            $table->unsignedInteger('inspection_id')
                ->index();
            $table->unsignedInteger('room_id')->nullable()
                ->index();
            $table->unsignedInteger('floor_id')->nullable()
                ->index();

            $table->string('order')->nullable();
            $table->string('cleanliness')->nullable();
            $table->string('painting')->nullable();
            $table->string('analysis')->nullable();
            $table->text('extra')->nullable();
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
        Schema::dropIfExists('generals');
    }
};
