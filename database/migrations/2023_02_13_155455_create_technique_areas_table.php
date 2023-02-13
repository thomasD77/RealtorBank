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
        Schema::create('technique_areas', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('technique_id')
                ->index();

            $table->string('code')->default('TECHNIQUE');
            $table->string('type')->nullable();
            $table->string('analysis')->nullable();
            $table->string('fuel')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('count')->nullable();

            $table->text('extra')->nullable();
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
        Schema::dropIfExists('technique_areas');
    }
};
