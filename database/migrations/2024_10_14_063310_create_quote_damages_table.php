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
        Schema::create('quote_damages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('damage_id')->index();

            $table->unsignedBigInteger('inspection_id')->index();

            $table->unsignedBigInteger('basic_id')->nullable()->index();
            $table->unsignedBigInteger('specific_id')->nullable()->index();
            $table->unsignedBigInteger('conform_id')->nullable()->index();
            $table->unsignedBigInteger('general_id')->nullable()->index();
            $table->unsignedBigInteger('technique_id')->nullable()->index();
            $table->unsignedBigInteger('outdoor_id')->nullable()->index();

            $table->unsignedBigInteger('quote_id')->index();

            $table->string('damage_title')->nullable();
            $table->date('damage_date')->nullable();
            $table->text('damage_description')->nullable();
            $table->boolean('damage_print_pdf')->default(0);

            $table->integer('approved')->default(1)->nullable();

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
        Schema::dropIfExists('quote_damages');
    }
};
