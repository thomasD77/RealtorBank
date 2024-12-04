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
        Schema::create('pricings', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('category_pricing_id')->index();
            $table->unsignedBigInteger('sub_category_pricing_id')->index();

            $table->text('description')->nullable();
            $table->decimal('cost_square_meter', 10, 2)->nullable();
            $table->decimal('cost_hour', 10, 2)->nullable();
            $table->decimal('cost_piece', 10, 2)->nullable();

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
        Schema::dropIfExists('pricings');
    }
};
