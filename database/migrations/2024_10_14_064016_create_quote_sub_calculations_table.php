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
        Schema::create('quote_sub_calculations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('quote_calculation_id')->index();

            $table->unsignedBigInteger('category_pricing_id')->index();
            $table->unsignedBigInteger('sub_category_pricing_id')->index();

            $table->text('quote_description')->nullable();
            $table->decimal('quote_cost_square_meter', 10, 2)->nullable();
            $table->decimal('quote_cost_hour', 10, 2)->nullable();
            $table->decimal('quote_cost_piece', 10, 2)->nullable();
            $table->decimal('quote_count', 10, 2)->nullable();
            $table->decimal('quote_total', 10, 2)->nullable();
            $table->decimal('quote_tax', 10, 2)->nullable();

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
        Schema::dropIfExists('quote_sub_calculations');
    }
};
