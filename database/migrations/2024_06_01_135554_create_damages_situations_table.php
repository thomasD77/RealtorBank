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
        Schema::create('damage_situation', function (Blueprint $table) {
            $table->id();
            $table->foreignId('damage_id')->constrained()->onDelete('cascade');
            $table->foreignId('situation_id')->constrained()->onDelete('cascade');
            $table->boolean('print_pdf')->default(1);
            $table->boolean('archived')->default(0);
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
        Schema::dropIfExists('damages_situations');
    }
};
