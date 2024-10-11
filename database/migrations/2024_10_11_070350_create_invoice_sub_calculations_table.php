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
        Schema::create('invoice_sub_calculations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invoice_calculation_id')->index();

            $table->unsignedBigInteger('invoice_category_pricing_id')->index();
            $table->unsignedBigInteger('invoice_sub_category_pricing_id')->index();

            $table->text('invoice_description')->nullable();
            $table->decimal('invoice_cost_square_meter', 10, 2)->nullable();
            $table->decimal('invoice_cost_hour', 10, 2)->nullable();
            $table->decimal('invoice_cost_piece', 10, 2)->nullable();

            $table->decimal('invoice_count', 10, 2)->nullable();
            $table->decimal('invoice_total', 10, 2)->nullable();
            $table->decimal('invoice_vetustate', 10, 2)->nullable();
            $table->decimal('invoice_tax', 10, 2)->nullable();

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
        Schema::dropIfExists('invoice_sub_calculations');
    }
};
