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
        Schema::create('invoice_damages', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('inspection_id')->index();
            $table->unsignedBigInteger('invoice_id')->index();
            $table->unsignedBigInteger('damage_id')->index();
            $table->string('damage_title')->nullable();
            $table->date('damage_date')->nullable();
            $table->text('damage_description')->nullable();
            $table->boolean('damage_print_pdf')->default(0);

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
        Schema::dropIfExists('invoice_damages');
    }
};
