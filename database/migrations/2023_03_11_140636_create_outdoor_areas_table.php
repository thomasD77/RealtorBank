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
        Schema::create('outdoor_areas', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('inspection_id')
                ->index();

            $table->unsignedInteger('room_id')
                ->index();

            $table->unsignedInteger('outdoor_id')
                ->index();

            $table->string('material')->nullable();
            $table->string('finish')->nullable();
            $table->string('color')->nullable();
            $table->string('windowsill')->nullable();
            $table->string('type')->nullable();
            $table->string('cover')->nullable();
            $table->string('chimney')->nullable();
            $table->string('solar')->nullable();
            $table->string('lock')->nullable();
            $table->string('handrail')->nullable();
            $table->string('balustrade')->nullable();
            $table->string('parts')->nullable();
            $table->string('count')->nullable();
            $table->string('movementDetector')->nullable();
            $table->string('gras')->nullable();
            $table->string('hedges')->nullable();
            $table->string('trees')->nullable();
            $table->string('single')->nullable();
            $table->string('double')->nullable();
            $table->string('brand')->nullable();

//            $table->string('crane')->nullable();
//            $table->string('glassInlay')->nullable();
//            $table->string('handle')->nullable();
//            $table->string('mailbox')->nullable();
//            $table->string('peephole')->nullable();
//            $table->string('window')->nullable();
//            $table->string('doorBel')->nullable();
//            $table->string('dorpel')->nullable();
//            $table->string('shelves')->nullable();
//            $table->string('manual')->nullable();
//            $table->string('stop')->nullable();
//            $table->string('siphon')->nullable();
//            $table->string('angleCrane')->nullable();

            $table->string('analysis')->nullable();
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
        Schema::dropIfExists('outdoor_areas');
    }
};
