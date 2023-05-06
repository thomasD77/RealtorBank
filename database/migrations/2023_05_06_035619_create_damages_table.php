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
        Schema::create('damages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->date('date')->nullable();
            $table->text('description')->nullable();

            $table->unsignedInteger('basic_id')
                ->index()->nullable();

            $table->unsignedInteger('specific_id')
                ->index()->nullable();

            $table->unsignedInteger('conform_id')
                ->index()->nullable();

            $table->unsignedInteger('general_id')
                ->index()->nullable();

            $table->unsignedInteger('technique_id')
                ->index()->nullable();

            $table->unsignedInteger('outdoor_id')
                ->index()->nullable();

            $table->softDeletes();
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
        Schema::dropIfExists('damages');
    }
};
