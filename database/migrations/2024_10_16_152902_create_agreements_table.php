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
        Schema::create('agreements', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('inspection_id')->index();
            $table->unsignedBigInteger('situation_id')->index();
            $table->unsignedBigInteger('quote_id')->index();

            $table->integer('pricing')->nullable()->index();

            $table->string('title')->nullable();
            $table->date('date')->nullable();

            $table->text('remarks')->nullable();
            $table->decimal('adjusted_total', 10, 2)->nullable();
            $table->decimal('total', 10, 2)->nullable();

            $table->string('signature_tenant')->nullable();
            $table->string('signature_owner')->nullable();

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
        Schema::dropIfExists('agreements');
    }
};
