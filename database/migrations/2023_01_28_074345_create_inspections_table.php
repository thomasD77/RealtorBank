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
            $table->string('address')->nullable();
            $table->string('postBus')->nullable();
            $table->string('zip')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();

            $table->string('owner_present')->nullable();
            $table->string('tenant_present')->nullable();
            $table->string('new_building')->nullable();
            $table->string('inhabited')->nullable();
            $table->string('furnished')->nullable();
            $table->string('first_resident')->nullable();

            $table->text('extra')->nullable();

            $table->foreignId('user_id')
                ->index()
                ->constrained()
                ->onDelete('cascade');

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
