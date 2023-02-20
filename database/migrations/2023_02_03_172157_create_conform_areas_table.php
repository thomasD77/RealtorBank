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
        Schema::create('conform_areas', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('inspection_id')
                ->index();

            $table->unsignedInteger('room_id')
                ->index();

            $table->unsignedInteger('conform_id')
                ->index();

            $table->string('code')->default('CONFORM');
            $table->string('material')->nullable();
            $table->string('color')->nullable();
            $table->string('present')->nullable();
            $table->string('single')->nullable();
            $table->string('multiple')->nullable();
            $table->string('brand')->nullable();
            $table->string('electronics')->nullable();
            $table->string('phone')->nullable();
            $table->string('internet')->nullable();
            $table->string('audio')->nullable();
            $table->string('type')->nullable();
            $table->string('count')->nullable();

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
        Schema::dropIfExists('conform_areas');
    }
};
