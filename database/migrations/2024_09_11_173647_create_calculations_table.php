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

            $table->unsignedInteger('damage_id')
                ->index();

            $table->decimal('brutto_total', 10, 2)->nullable();
            $table->decimal('vetustate', 10, 2)->nullable();
            $table->decimal('vetustate_amount', 10, 2)->nullable();
            $table->decimal('final_total', 10, 2)->nullable();

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
