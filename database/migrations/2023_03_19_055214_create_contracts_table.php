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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('inspection_id')
                ->index();
            $table->unsignedInteger('situation_id')
                ->index();

            $table->boolean('print_pdf')->nullable();

            $table->boolean('lock')->default(0)->nullable();
            $table->text('legal_in')->nullable();
            $table->text('legal_uit')->nullable();
            $table->text('legal_aanvang')->nullable();
            $table->text('slot_in')->nullable();
            $table->text('slot_uit')->nullable();
            $table->text('slot_aanvang')->nullable();
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
        Schema::dropIfExists('contracts');
    }
};
