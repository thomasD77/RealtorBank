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
        Schema::create('rental_claims', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('inspection_id')
                ->index();
            $table->unsignedInteger('situation_id')
                ->index();

            $table->boolean('lock')->default(0)->nullable();
            $table->string('signature_tenant')->nullable();
            $table->string('signature_owner')->nullable();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('rental_claims');
    }
};
