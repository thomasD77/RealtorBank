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
        Schema::create('situations', function (Blueprint $table) {
            $table->id();
            $table->boolean('intrede')->nullable();
            $table->date('date')->nullable();
            $table->text('extra')->nullable();

            $table->unsignedInteger('tenant_id')
                ->index();

            $table->unsignedInteger('inspection_id')
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
        Schema::dropIfExists('situations');
    }
};
