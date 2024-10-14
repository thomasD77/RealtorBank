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
        Schema::create('quote_calculations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inspection_id')->index();
            $table->unsignedBigInteger('quote_damage_id')->index();

            $table->decimal('quote_brutto_total', 10, 2)->nullable();
            $table->decimal('quote_vetustate', 10, 2)->nullable();
            $table->decimal('quote_vetustate_amount', 10, 2)->nullable();
            $table->decimal('quote_final_total', 10, 2)->nullable();

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
        Schema::dropIfExists('quote_calculations');
    }
};
