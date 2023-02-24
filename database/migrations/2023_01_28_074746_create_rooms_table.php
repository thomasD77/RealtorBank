<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use \App\Models\Room;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('code');
            $table->string('general')->nullable();
            $table->string('analysis')->nullable();
            $table->text('extra')->nullable();

            $table->foreignId('inspection_id')
                ->index()
                ->nullable()
                ->constrained()
                ->onDelete('cascade');

            $table->unsignedInteger('floor_id')
                ->index()->nullable();

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
        Schema::dropIfExists('rooms');
    }
};
