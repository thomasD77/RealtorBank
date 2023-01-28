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
        Schema::create('inspections', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable()->default('DRAFT');
            $table->string('situation')->nullable();
            $table->string('address')->nullable();
            $table->string('postBus')->nullable();
            $table->string('zip')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();

            $table->foreignId('user_id')
                ->index()
                ->constrained()
                ->onDelete('cascade');

            $table->unsignedInteger('tenant_id')
                ->nullable()
                ->index();

            $table->unsignedInteger('owner_id')
                ->nullable()
                ->index();

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
        Schema::dropIfExists('inspections');
    }
};
