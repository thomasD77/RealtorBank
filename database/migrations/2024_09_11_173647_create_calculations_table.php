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
        Schema::create('calculations', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('inspection_id')
                ->index();

            $table->unsignedInteger('floor_id')
                ->index();

            $table->unsignedInteger('room_id')
                ->index();

            $table->unsignedBigInteger('category_pricing_id')->index();
            $table->unsignedBigInteger('sub_category_pricing_id')->index();

            $table->decimal('count', 10, 2)->nullable();
            $table->decimal('total', 10, 2)->nullable();
            $table->decimal('vetustate', 10, 2)->nullable();

            $table->integer('approved')->nullable();

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
        Schema::dropIfExists('calculations');
    }
};
