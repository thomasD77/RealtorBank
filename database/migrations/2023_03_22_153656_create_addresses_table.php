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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('address')->nullable();
            $table->string('postBus')->nullable();
            $table->string('zip')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();

            $table->boolean('tenant_future_address')->default(0)->nullable();

            $table->unsignedInteger('user_id')
                ->index();
            $table->unsignedInteger('company_id')
                ->index();
            $table->unsignedInteger('owner_id')
                ->index();
            $table->unsignedInteger('tenant_id')
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
        Schema::dropIfExists('addresses');
    }
};
